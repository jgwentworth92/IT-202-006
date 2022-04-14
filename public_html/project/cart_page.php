<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../partials/nav.php");

$id = se($_GET, "id", -1, false);
$amount = se($_GET, "amount", "", false);
error_log(var_export($id, true));
$userID = get_user_id();
error_log(var_export($userID, true));
$HasError=false;
$stmt2 = $db->prepare("SELECT stock from Products Where id = :product_id   LIMIT 50");
try {
    $stmt->execute([":product_id" => $id]);
    $stock = $stmt2->fetchAll();
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching records category information", "danger");
}

if (isset($_POST["submit"])) {
  
    error_log(var_export($amount, true));
    $db = getDB();
    $stmt = $db->prepare("INSERT INTO JG_Cart (item_id, quantity, user_id) VALUES(:item, :quantity, :userID)");
    try {
        $stmt->execute([":item" => $id, ":quantity" => $amount, ":userID" => $userID]);
        flash("Successfully added to cart!", "success");
    } catch (Exception $e) {
        error_log(var_export($e, true));
        flash("Error looking up record", "danger");
    }
}


?>



                <?php
                require_once(__DIR__ . "/../../partials/flash.php");
                ?>

              