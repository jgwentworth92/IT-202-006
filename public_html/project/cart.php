<?php
require_once(__DIR__ . "/../../lib/functions.php");
require(__DIR__ . "/../../partials/nav.php");

if (!is_logged_in()) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH/home.php"));
}
$user_id = get_user_id();

$results = [];
$db = getDB();

//deletes single cart item
$Del = false;

if (isset($_POST["submit"])) {


    $db = getDB();
    $hasError = false;
    $item_id = (int)se($_POST, "item_id", null, false);
    $amount = (int)se($_POST, "amount", null, false);
    if ($amount < 0) {
        $hasError = true;
        flash("please enter a positive number", "warning");
    }
    if ($amount === 0) {
        $hasError = true;
        $line_id = (int)se($_POST, "lineID", null, false);

        $stmt = $db->prepare("DELETE FROM JG_Cart where id = :id and :uid");
        try {
            //added user_id to ensure the user can only delete their own items
            flash("Item deleted from cart", "Success");
            $stmt->execute([":id" => $line_id, ":uid" => $user_id]);
        } catch (PDOException $e) {
            error_log("Error deleting line item: " . var_export($e, true));
            flash("error removing", "warning");
        }
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
if (isset($_POST["delete"])) {
    $db = getDB();
    $line_id = (int)se($_POST, "lineID", null, false);

    $stmt = $db->prepare("DELETE FROM JG_Cart where id = :id and :uid");
    try {
        //added user_id to ensure the user can only delete their own items
        $stmt->execute([":id" => $line_id, ":uid" => $user_id]);
        flash("Item deleted from cart", "Success");
    } catch (PDOException $e) {
        error_log("Error deleting line item: " . var_export($e, true));
        flash("error removing", "warning");
    }
}


// remove entire cart
if (isset($_POST["Remove_all"])) {
    $db = getDB();

    flash("We made it", "Success");
    $stmt = $db->prepare("DELETE FROM JG_Cart where user_id =  :userid");
    try {
        //added user_id to ensure the user can only delete their own items
        $stmt->execute([":userid" => $user_id]);
    } catch (PDOException $e) {
        error_log("Error deleting line item: " . var_export($e, true));
        flash("error removing", "warning");
    }
}
$test = isset($_POST["Remove_all"]);
error_log("button check: " . var_export($test, true));

$stmt = $db->prepare("SELECT name, c.id as line_id, item_id, quantity, unit_price, (unit_price*quantity) as subtotal FROM JG_Cart c JOIN Products i on c.item_id = i.id WHERE c.user_id = :uid");
try {
    $stmt->execute([":uid" => $user_id]);
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $results = $r;
    }
    $total_cost = 0;
    foreach ($results as $row) {
        $total_cost += (int)se($row, "subtotal", 0, false);
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching records", "danger");
}

?>

<?php if (count($results) == 0) : ?>
    <p>Nothing in Cart</p>
<?php else : ?>

  

    <div class="container-fluid">
        <h1> Total: $ <?php se($total_cost, null, "N/A"); ?>
        <a href="<?php echo get_url('remove_all.php') ?>">Delete All</a>
        </h1>
        <div class="row">
            <div class="col">
                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-4 g-4">
                    <?php foreach ($results as $item) : ?>
                        <div class="col">
                            <div class=  <div class="card  d-flex flex-column justify-content-center   bg-light" style="height:35em"> 
                                <div class="card-header">
                                    <a href="<?php echo get_url('item_details.php'); ?>?id=<?php se($item, "id"); ?>">Item Details</a>
                                    <?php if (has_role("Admin")) : ?>
                                        <a href="<?php echo get_url('admin/edit_item.php'); ?>?id=<?php se($item, "id"); ?>">Edit</a>
                                        <?php endif; ?>>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Name: <?php se($item, "name"); ?></h5>
                                    <p class="card-text">Price: <?php se($item, "unit_price"); ?></p>
                                    <p class="card-text">Amount: <?php se($item, "quantity"); ?></p>
                                    <p class="card-text">Subtotal: <?php se($item, "subtotal"); ?></p>
                                    <form method="POST">
                                        <input class="form-control" type="hidden" name="lineID" value="<?php se($item, "line_id"); ?>" />
                                        <input class="btn btn-primary" type="submit" value="Delete" name="delete" />
                                    </form>
                                    <form class="form-inline" method="POST">
                                        <div class="form-group mb-2">
                                            <label class="form-label" for="amount">Quantity</label>
                                            <input class="form-control" type="number" step="1" name="amount" required />
                                        </div>
                                        <input class="form-control" type="hidden" name="item_id" value="<?php se($item, "item_id"); ?>" />
                                        <input class="form-control" type="hidden" name="lineID" value="<?php se($item, "line_id"); ?>" />
                                        <input class="btn btn-primary" type="submit" value="Update" name="submit" />
                                    </form>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
            <div class="col-4" style="min-width:10em">
            <?php endif; ?>
            <?php
            require(__DIR__ . "/../../partials/flash.php"); ?>

            <script>
                function validate(form) {
                    let amount = parseInt(form.amount.value);
                    let available = parseInt(form.avail_amount.value);
                    isValid = true;
                    if (!is_num(amount)) {
                        flash("Please enter a number", "warning");
                        isValid = false;
                    }
                    if (amount > avail_amount) {
                        flash("Entered amount is greater then current stock", "warning");
                        isValid = false;
                    }
                    return isValid;
                }
            </script>