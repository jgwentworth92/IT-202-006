


<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../partials/nav.php");

$TABLE_NAME = "Products";
$Cart_Table="JG_Cart";
if (isset($_POST["stock"]))  {
    $amount= se($_POST, "stock", "", false);
    
    }
$userID= get_username();
if (isset($_POST["submit"])) {
 
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


$result = [];
$columns = get_columns($TABLE_NAME);
//echo "<pre>" . var_export($columns, true) . "</pre>";
$ignore = ["id", "modified", "created"];
$db = getDB();
//get the item
$id = se($_GET, "id", -1, false);
$stmt = $db->prepare("SELECT * FROM $TABLE_NAME where id =:id");
try {
    $stmt->execute([":id" => $id]);
    $r = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($r) {
        $result = $r;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error looking up record", "danger");
}

$columns = get_columns($TABLE_NAME);
//echo "<pre>" . var_export($columns, true) . "</pre>";
$ignore = ["id", "modified", "created"];
?>






<div class="container-fluid">
    <h1>Shop</h1>
    <div class="row">
        <div class="col">
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-4">
                <?php foreach ($results as $item) : ?>
                    <div class="col">
                        <div class="card bg-light" style="height:25em">
                            <div class="card-header">
                                JG shop.
                            </div>
                            <div class="card-body">
                            <h5 class="card-title">Name: <?php se($item, "name"); ?></h5>
                                <p class="card-text">Description: <?php se($item, "description"); ?></p>
                                <p class="card-text">Category: <?php se($item, "category"); ?></p>
                                <p class="card-text">Stock: <?php se($item, "stock"); ?></p>
                            </div>
                            <div class="card-footer">
                                Cost: <?php se($item, "unit_price"); ?>
                              
                            </div>
                        </div>
                        
                    </div>
                <?php endforeach; ?>
                <div class="mb-3">
                <form method="POST">
            <label class="form-label" for="stock">Quantity</label>
            <input class="form-control"  type="number" step="1"" name="confirm" required  />
            </form>
             </div>
                <input class="btn btn-primary" type="submit" value="Create" name="submit" />
            </div>
        </div>
        <div class="col-4" style="min-width:30em">