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


$too_much=false;
 
    $stmt = $db->prepare("SELECT name, c.id as line_id, item_id, quantity,stock, unit_cost, (unit_cost*quantity) as subtotal FROM JG_Cart c JOIN Products i on c.item_id = i.id WHERE c.user_id = :uid");
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
            if($desired_amount>$stock)
            {$too_much=true;
                $hasError=true;
                $dif=$desired_amount-$stock;
                $item_name=se($row,"name","",false);
                flash(" You have requested $dif more $item_name then we have in stock,please update quantity ","warning");
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




if (!$hasError) {
    $db->commit();
    flash("commit", "success");
} else {
    $db->rollBack();
    flash("roll back", "danger");
}
?>

            <?php
            require(__DIR__ . "/../../partials/flash.php"); ?>