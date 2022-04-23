<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../partials/nav.php");



    $total = se($_POST, "payment_amount", "", false);
    $payment_type = se($_POST, "payment_type", "", false);
    $Address = se($_POST, "address", "", false) . se($_POST, "address2", "", false) . " , " . se($_POST, "country", "", false) . " , " . se($_POST, "state", "", false) . " , " . se($_POST, "zip", "", false);
    error_log(var_export($Address, true));
    error_log(var_export(se($_POST, "address", "", false), true));
    error_log(var_export(se($_POST, "address2", "", false), true));
    error_log(var_export(se($_POST, "country", "", false), true));
    error_log(var_export(se($_POST, "state", "", false), true));
    error_log(var_export(se($_POST, "zip", "", false), true));
    error_log(var_export($total, true));
    error_log(var_export($payment_type, true));
    $user_id = get_user_id();
    $hasError = false;
    $db = getDB();



 
    $stmt = $db->prepare("SELECT name, c.id as line_id, item_id, quantity,stock, unit_cost, unit_price,(unit_cost*quantity) as subtotal FROM JG_Cart c JOIN Products i on c.item_id = i.id WHERE c.user_id = :uid");
    try {
        $stmt->execute([":uid" => $user_id]);
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $results = $r;
        }
        $total_cost = 0;
        foreach ($results as $row) {
            
            $total_cost += (int)se($row, "subtotal", 0, false);
            $stock=se($row, "stock", 0, false);
            $desired_amount=se($row, "quantity", 0, false);
            $cart_price=se($row, "unit_cost", 0, false);
            $og_price=se($row, "unit_price", 0, false);
            if($desired_amount>$stock)
            {
                $hasError=true;
                $dif=$desired_amount-$stock;
                $item_name=se($row,"name","",false);
                flash(" You have requested $dif more $item_name then we have in stock,please update quantity ","warning");
                die(header("Location: $BASE_PATH/cart.php"));
            }
            if($og_price!=$cart_price){

                $hasError=true;
                flash("  $item_name  unit price is $$og_price , it is no longer $$cart_price ","warning");
                die(header("Location: $BASE_PATH/cart.php"));

            }

        }
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error fetching records", "danger");
    }




    
    if ($total != $total_cost) {
        $hasError = true;
        flash("you entered $total , the correct price is  $total_cost", "warning");
        die(header("Location: $BASE_PATH/cart.php"));
    }








$db->beginTransaction();
$stmt = $db->prepare("INSERT INTO Orders (user_id, total, money_recieved,payment_method,address) VALUES(:UID, :total, :money,:payment_method,:place)");
$stmt->execute([":UID" => $user_id, ":total" => $total, ":money" => $total, ":payment_method" => $payment_type, ":place" => $Address]);
$user_id = get_user_id();

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


if ($next_order_id > 0) {
    $stmt = $db->prepare("UPDATE Products 
    set stock = stock - (select IFNULL(quantity, 0) FROM JG_Cart WHERE item_id = Products.id and user_id = :uid) 
    WHERE id in (SELECT item_id from RM_Cart where user_id = :uid)");
    try {
        $stmt->execute([":uid" => $user_id]);
    } catch (PDOException $e) {
        error_log("Update stock error: " . var_export($e, true));
   
        $db->rollback();
        $next_order_id = 0; //using as a controller
    }
}
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

if (!$hasError) {
    $stmt = $db->prepare("DELETE FROM JG_Cart where user_id =  :userid");
$stmt->execute([":userid" => $user_id]);
    $db->commit();
    flash("commit", "success");
} else {
    $db->rollBack();
    flash("roll back", "danger");
}
?>

            <?php
            require(__DIR__ . "/../../partials/flash.php"); ?>