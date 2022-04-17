<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../partials/nav.php");
$db = getDB();

if (!is_logged_in()) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH/home.php"));
}
if(is_logged_in())
{

    flash("cart emptied", "success");
  

$user_id = get_user_id();
flash("We made it", "Success");
$stmt = $db->prepare("DELETE FROM JG_Cart where user_id =  :userid");
try {
    //added user_id to ensure the user can only delete their own items
    $stmt->execute([":userid" => $user_id]);
} catch (PDOException $e) {
    error_log("Error deleting line item: " . var_export($e, true));
    flash("error removing", "warning");
}

die(header("Location: $BASE_PATH/cart.php"));
}