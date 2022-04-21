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
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#checkout">
 Checkout
</button>

<!-- Modal -->
<div class="modal fade" id="checkout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Shipping Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="row g-3" method="POST"> 
  <div class="col-md-4">
    <label for="validationServer01" class="form-label">First name</label>
    <input type="text" class="form-control is-valid" id="validationServer01" value="Mark" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationServer02" class="form-label">Last name</label>
    <input type="text" class="form-control is-valid" id="validationServer02" value="Otto" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-3">
    <label for="address" class="form-label">Address</label>
    <input type="text" class="form-control is-invalid" id="address" aria-describedby="validationServer03Feedback" required>
    <div id="validationServer03Feedback" class="invalid-feedback">
      Please provide a valid address.
    </div>
    <div class="col-md-3">
    <label for="city" class="form-label">City</label>
    <input type="text" class="form-control is-invalid" id="city" aria-describedby="validationServer03Feedback" required>
    <div id="validationServer03Feedback" class="invalid-feedback">
      Please provide a valid city.
    </div>
  </div>
  <div class="col-md-3">
    <label for="state" class="form-label">State</label>
    <select class="form-select is-invalid" id="state" aria-describedby="validationServer04Feedback" required>
      <option selected disabled value="">Choose...</option>
      <option>...</option>
    </select>
    <div id="validationServer04Feedback" class="invalid-feedback">
      Please select a valid state.
    </div>
  </div>
  <div class="col-md-3">
    <label for="country" class="form-label">Country</label>
    <select class="form-select is-invalid" id="country" aria-describedby="validationServer04Feedback" required>
      <option selected disabled value="">Choose...</option>
      <option>...</option>
    </select>
    <div id="validationServer04Feedback" class="invalid-feedback">
      Please select a valid country.
    </div>
  </div>
  <div class="col-md-3">
    <label for="zip" class="form-label">Zip</label>
    <input type="text" class="form-control is-invalid" id="zip" aria-describedby="validationServer05Feedback" required>
    <div id="validationServer05Feedback" class="invalid-feedback">
      Please provide a valid zip.
    </div>
  </div>
  <div class="col-12">
    
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>

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