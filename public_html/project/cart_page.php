


<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../partials/nav.php");

$TABLE_NAME = "Products";
$Cart_Table="JG_Cart";
$id = se($_GET, "id", -1, false);
error_log(var_export($id, true));
$userID= get_username();
error_log(var_export($userID, true));
if (isset($_POST["submit"])) {
    $amount= se($_POST, "stock", "", false);
    error_log(var_export($amount, true));
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO $Cart_Table (item_id, quantity, user_id) VALUES(:item, :quantity, :userID)");
        try {
            $stmt->execute([":item" => $id, ":quantity" => $amount, ":userID" => $userID]);
            flash("Successfully added to cart!", "success");
        } catch (Exception $e) {
            error_log(var_export($e, true));
            flash("Error looking up record", "danger");
        }
}


?>






<div class="container-fluid">
         <form method="POST">
            <label class="form-label" for="stock">Quantity</label>
            <input class="form-control"  type="number" step="1" name="confirm" required  />
            <input class="btn btn-primary" type="submit" value="Create" name="submit" />
         </form>
            
        
          
<div class="col-4" style="min-width:30em">



<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>