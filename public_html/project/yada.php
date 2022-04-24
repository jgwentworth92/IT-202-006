<?php
$db->beginTransaction();
            $stmt = $db->prepare("SELECT max(id) as order_id FROM Orders");
            $next_order_id = 0;
            //get next order id
            try {
                $stmt->execute();
                $r = $stmt->fetch(PDO::FETCH_ASSOC);
                $next_order_id = (int)se($r, "order_id", 0, false);
                $next_order_id++;
            } catch (PDOException $e) {
                error_log("Error fetching order_id: " . var_export($e));
                $db->rollback();
            }
            //deduct product stock (used to determine if out of stock as it'll fail with a constraint violation)
            if ($next_order_id > 0) {
                $stmt = $db->prepare("UPDATE Products 
                set stock = stock - (select IFNULL(quantity, 0) FROM JG_Cart WHERE item_id = Products.id and user_id = :uid) 
                WHERE id in (SELECT item_id from JG_Cart where user_id = :uid)");
                try {
                    $stmt->execute([":uid" => $user_id]);
                } catch (PDOException $e) {
                    error_log("Update stock error: " . var_export($e, true));
                    $response["message"] = "At least one of your items is low on stock and is unable to be purchased";
                    $db->rollback();
                    $next_order_id = 0; //using as a controller
                }
            }
            //map cart to order history
            if ($next_order_id > 0) {
                $stmt = $db->prepare("INSERT INTO Orderitems (item_id, user_id, quantity, cost, order_id) 
                SELECT item_id, user_id, RM_Cart.quantity, cost, :order_id FROM JG_Cart JOIN Products on JG_Cart.item_id = Products.id
                 WHERE user_id = :uid");
                try {
                    $stmt->execute([":uid" => $user_id, ":order_id" => $next_order_id]);
                } catch (PDOException $e) {
                    error_log("Error mapping cart data to order history: " . var_export($e, true));
                    $db->rollback();
                    $next_order_id = 0; //using as a controller
                }
            }