<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../partials/nav.php");
$db = getDB();





$results = [];

$item_id = se($_GET, "id", -1, false);
// makes sures entered quantity is not negative 


$stmt = $db->prepare("SELECT id, name, description,stock, unit_price,category, image from Products WHERE id = :item LIMIT 50");
try {
    flash("we in it", "success");
    $stmt->execute([":item" => $item_id]);
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $results = $r;
    }
} catch (Exception $e) {
    error_log(var_export($e, true));
    flash("Error looking up record", "danger");
}



if (isset($_POST["add"])) {
    $item_id = (int)se($_POST, "item_id", null, false);
    $amount = (int)se($_POST, "amount", "", false);
    $hasError = false;
    // makes sures entered quantity is not negative 
    if ($amount <= 0) {
        $hasError = true;
        flash("please enter a  number greater then 0", "warning");
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




<?php require_once(__DIR__ . "/../../partials/flash.php"); ?>



<?php foreach ($results as $item) : ?>
    <div class="col">
        <div class="card bg-light">
            <div class="card-header">
                Item Details
            </div>
            <?php if (se($item, "image", "", false)) : ?>
                <img src="<?php se($item, "image"); ?>" class="card-img-top" alt="...">
            <?php endif; ?>
            <div class="card-body">
                <h5 class="card-title">Name: <?php se($item, "name"); ?></h5>
                <p class="card-text">Description: <?php se($item, "description"); ?></p>
                <p class="card-text">Category: <?php se($item, "category"); ?></p>
                <p class="card-text">Stock: <?php se($item, "stock"); ?></p>
            </div>
            <div class="card-footer">
                Cost: <?php se($item, "unit_price"); ?>

                <?php if (is_logged_in()) : ?>
                    <form name="submit" method="POST" onsubmit="return validate(this);">
                        <label class="form-label" for="amount">Quantity</label>
                        <input class="form-control" type="number" step="1" name="amount" required />
                        <input class="form-control" type="hidden" name="item_id" value="<?php se($item, "id"); ?>" />
                        <input class="form-control" type="hidden" name="avail_amount" value="<?php se($item, "stock"); ?>" />
                        <input class="btn btn-primary" type="submit" value="add to cart" name="add" />
                    </form>

                <?php endif; ?>
            </div>
        </div>
        <?php if (has_role("Admin")) : ?>

            <td>
                <a href="<?php echo get_url('admin/edit_item.php'); ?>?id=<?php se($item, "id"); ?>">Edit</a>
            </td>
        <?php endif; ?>
    </div>
<?php endforeach; ?>