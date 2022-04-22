<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../partials/nav.php");


if (isset($_POST["submit"])) {

    $total = se($_POST, "payment_amount", "", false);
    $payment_type= se($_POST, "payment_type", "", false);
    $Address= se($_POST, "address", "", false).se($_POST, "address2", "", false)." , ".se($_POST, "country", "", false)." , " .se($_POST, "state", "", false)." , ".se($_POST, "zip", "", false);
    error_log(var_export($Address, true));
    error_log(var_export(se($_POST, "address", "", false), true));
    error_log(var_export(se($_POST, "address2", "", false), true));
    error_log(var_export(se($_POST, "country", "", false), true));
    error_log(var_export(se($_POST, "state", "", false), true));
    error_log(var_export(se($_POST, "zip", "", false), true));
    error_log(var_export($total, true));
    error_log(var_export($payment_type, true));
    $user_id = get_user_id();
    
    $db = getDB();

    $stmt = $db->prepare("INSERT INTO Orders (user_id, total, money_recieved,payment_method,address) VALUES(:UID, :total, :money,:payment_method,:place)");
  
        try {
            $stmt->execute([":UID" => $user_id, ":total" => $total, ":money" => $total,":payment_method" => $payment_type,":place" => $Address]);
            flash("Successfully ordered item!", "success");
        } catch (Exception $e) {
            error_log(var_export($e, true));
                error_log(var_export($Address, true));
    error_log(var_export($total, true));
    error_log(var_export($payment_type, true));
            flash("Error looking up record", "danger");
        }
    
 }
?>
 <?php require_once(__DIR__ . "/../../partials/flash.php");?>


