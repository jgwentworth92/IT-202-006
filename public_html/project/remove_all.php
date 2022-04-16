<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../partials/nav.php");
$db = getDB();



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