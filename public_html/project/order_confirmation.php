<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../partials/nav.php");


if (isset($_POST["submit"])) {

    $total = se($_POST, "payment_amount", "", false);
    $payment_type= se($_POST, "payment_type", "", false);
    $Address= se($_POST, "address", "", false).se($_POST, "address2", "", false).se($_POST, "country", "", false) .se($_POST, "state", "", false).se($_POST, "state", "", false);
    error_log(var_export($Address, true));
    error_log(var_export($total, true));
    error_log(var_export($payment_type, true));
    $user_id = get_user_id();
    
    $db = getDB();
/*
        $stmt = $db->prepare("INSERT INTO Orders (total, money_recieved, user_id,payment_method,address) VALUES(:total, :recieved, :userID,:pay_type,:destination");
        $stmt->bindValue(":total", $total, PDO::PARAM_STR);
        $stmt->bindValue(":recieved", $total,PDO::PARAM_STR);
        $stmt->bindValue(":userID", get_user_id(), PDO::PARAM_INT);
        $stmt->bindValue(":pay_type", $payment_type,PDO::PARAM_STR);
        $stmt->bindValue(":destination", $Address,PDO::PARAM_STR);

        try {
            $stmt->execute();
            flash("Successfully ordered item!", "success");
        } catch (Exception $e) {
            error_log(var_export($e, true));
                error_log(var_export($Address, true));
    error_log(var_export($total, true));
    error_log(var_export($payment_type, true));
            flash("Error looking up record", "danger");
        }
    
}*/ }
?>
 <?php require_once(__DIR__ . "/../../partials/flash.php");?>


