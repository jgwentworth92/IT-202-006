


<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../partials/nav.php");

$TABLE_NAME = "Products";
$Cart_Table="JG_Cart";
$id = se($_GET, "id", -1, false);

if (isset($_POST["stock"]))  {
    $amount= se($_POST, "stock", "", false);
    
    }
$userID= get_username();
if (isset($_POST["submit"])) {
 
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
         </form>
            
         <input class="btn btn-primary" type="submit" value="Create" name="submit" />
          
<div class="col-4" style="min-width:30em">



<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>