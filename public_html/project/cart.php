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
    $cost = se($_POST, "price", null, false);
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

        $stmt = $db->prepare("INSERT INTO JG_Cart (item_id, quantity, user_id,unit_cost) VALUES(:item, :quantity, :userID,:unit_cost) ON DUPLICATE KEY UPDATE quantity = :quantity");
        $stmt->bindValue(":item", $item_id, PDO::PARAM_INT);
        $stmt->bindValue(":quantity", $amount, PDO::PARAM_INT);
        $stmt->bindValue(":userID", get_user_id(), PDO::PARAM_INT);
        $stmt->bindValue(":unit_cost", $cost, PDO::PARAM_STR);
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

$stmt = $db->prepare("SELECT name, c.id as line_id, item_id, quantity, unit_cost, (unit_cost*quantity) as subtotal FROM JG_Cart c JOIN Products i on c.item_id = i.id WHERE c.user_id = :uid");
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
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="checkout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center d-block">
                <h5 class="modal-title d-inline-block" id="exampleModalLabel">Shipping Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form class="text-center d-block" action="order_process.php" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment or suite">
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">Country</label>
                            <select class="custom-select d-block w-100" id="country" name="country" required>
                                <option value="">Choose...</option>
                                <option>United States</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="state">State</label>
                            <select class="custom-select d-block w-100" name="state" id="state" required>
                                <option value="">Choose...</option>
                                <option>California</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" id="zip" name="zip" placeholder="" required>
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="same-address">
                        <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="save-info">
                        <label class="custom-control-label" for="save-info">Save this information for next time</label>
                    </div>
                    <hr class="mb-4">

                    <h4 class="mb-3">Payment</h4>

                    <div class="d-block my-3">
                        <select method="POST" name="payment_type" class="form-select" aria-label="Default select example">
                            <option value="Amex" name="Amex">
                                Amex
                            </option>
                            <option value="visa" name="Visa">
                                Visa
                            </option>
                            <option value="Master Card" name="MasterCard">
                                Master Card

                            </option>
                            <option value="cash" name="cash">
                                cash via carrier pigeon.
                            </option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="payment_amount">Enter payment value</label>
                            <input type="number" step="0.01" class="form-control" name="payment_amount" id="payment_amount" placeholder="" required>
                            <small class="text-muted">enter value here</small>
                            <div class="invalid-feedback">
                                bad input
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" name="submit" type="submit">Purchase</button>
                </form>
            </div>
            <div class="modal-footer">


            </div>
        </div>
    </div>
</div>

<?php if (count($results) == 0) : ?>
    <p>Nothing in Cart</p>
<?php else : ?>



    <div class="container-fluid">
        <h1>
            welcome to your cart.
        </h1>
        <div class="row">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Proceed to checkout</h5>
                            <p class="card-text">Total: $ <?php se($total_cost, null, "N/A"); ?></p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#checkout">
                                Checkout
                            </button>
                            <a href="<?php echo get_url('remove_all.php') ?> " class="btn btn-primary">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
        <div class="container-fluid">
            <div class="col">
                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-4 g-4">
                    <?php foreach ($results as $item) : ?>
                        <div class="col">
                            <div class=<div class="card  d-flex flex-column text-center justify-content-center   bg-light" style="height:35em; width:18em">
                                <div class="card-header">
                                    <a href="<?php echo get_url('item_details.php'); ?>?id=<?php se($item, "item_id"); ?>">Item Details</a>
                                    <?php if (has_role("Admin")) : ?>
                                        <a href="<?php echo get_url('admin/edit_item.php'); ?>?id=<?php se($item, "item_id"); ?>">Edit</a>
                                        <?php endif; ?>>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Name: <?php se($item, "name"); ?></h5>
                                    <p class="card-text">Price: <?php se($item, "unit_cost"); ?></p>
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
                                        <input class="form-control" type="hidden" name="price" value="<?php se($item, "unit_cost"); ?>" />

                                        <input class="btn btn-primary" type="submit" value="Update" name="submit" />
                                    </form>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
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