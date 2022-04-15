<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../partials/nav.php");
$db = getDB();
$item_id = (int)se($_POST, "item_id", null, false);


$userID = get_user_id();
error_log(var_export($userID, true));
$hasError = false;
$amount = (int)se($_POST, "amount", "", false);



if (isset($_POST["submit"])) {

    error_log(var_export($amount, true));
    $db = getDB();
    $amount = (int)se($_POST, "amount", "", false);
    // makes sures entered quantity is not negative 
    if ($amount < 0) {
        $hasError = true;
        flash("please enter a positive number", "warning");
    }

    if (!$hasError) {

        $stmt = $db->prepare("INSERT INTO JG_Cart (item_id, quantity, user_id) VALUES(:item, :quantity, :userID) ON DUPLICATE KEY UPDATE quantity = quantity + :quantity");
        $stmt->bindValue(":item", $item_id, PDO::PARAM_INT);
        $stmt->bindValue(":quantity", $amount, PDO::PARAM_INT);
        $stmt->bindValue(":userID", get_user_id(), PDO::PARAM_INT);
        try {
            $stmt->execute();
            flash("Successfully added to cart!", "success");
        } catch (Exception $e) {
            error_log(var_export($e, true));
            flash("Error looking up record", "danger");
        }
    }
}
?>
 <?php require_once(__DIR__ . "/../../partials/flash.php");?>

              