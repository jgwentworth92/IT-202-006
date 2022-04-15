<?php
require_once(__DIR__ . "/../../lib/functions.php");
require(__DIR__ . "/../../partials/nav.php");

$user_id = get_user_id();

$results = [];
$db = getDB();


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

if (isset($_POST["delete"])) {
    $db = getDB();
    $line_id = (int)se($_POST, "lineID", null, false);

    $stmt = $db->prepare("DELETE FROM JG_Cart where id = :id and :uid");
    try {
        //added user_id to ensure the user can only delete their own items
        $stmt->execute([":id" => $line_id, ":uid" => $user_id]);

        http_response_code(200);
    } catch (PDOException $e) {
        error_log("Error deleting line item: " . var_export($e, true));
        flash("error removing", "warning");
    }
}



?>

<?php if (count($results) == 0) : ?>
    <p>Nothing in Cart</p>
<?php else : ?>
    <div class="container-fluid">
        <h1> Total: $ <?php se($total_cost, null, "N/A"); ?></h1>
        <div class="row">
            <div class="col">
                
                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <?php foreach ($results as $item) : ?>
                        <div class="col">
                            <div class="card bg-light" style="height:25em">
                                <div class="card-header">
                                    ID: <?php se($item, "line_id"); ?>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Name: <?php se($item, "name"); ?></h5>
                                    <p class="card-text">price: <?php se($item, "unit_price"); ?></p>
                                    <p class="card-text">Amount: <?php se($item, "quantity"); ?></p>
                                    <p class="card-text">Subtotal: <?php se($item, "subtotal"); ?></p>

                                </div>
                                <div class="card-footer">
                                    <?php if (is_logged_in()) : ?>
                                        <button type="button" id="pro_popup" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> work my guy </button>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="form-group">
                                                                <form action="add_to_cart.php" method="POST">
                                                                    <label class="form-label" for="amount">Quantity</label>
                                                                    <input class="form-control" type="number" step="1" name="amount" required />
                                                                    <input class="form-control" type="hidden" name="item_id" value="<?php se($item, "item_id"); ?>" />
                                                                    <input class="btn btn-primary" type="submit" value="Update" name="submit" />
                                                                </form>
                                                            </div>
                                                            <div class="form-group">
                                                                <form method="POST">
                                                                    <input class="form-control" type="hidden" name="lineID" value="<?php se($item, "line_id"); ?>" />
                                                                    <input class="btn btn-primary" type="submit" value="Delete" name="delete" />
                                                                </form>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Send message</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php if (has_role("Admin")) : ?>

                                <td>
                                    <a href="<?php echo get_url('admin/edit_item.php'); ?>?id=<?php se($item, "item_id"); ?>">Edit</a>
                                </td>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
            <div class="col-4" style="min-width:30em">
            <div class="modal fade" id="my-modal" role="dialog" aria-labelledby="my-modal-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<a class="btn" data-toggle="modal" href="#my-modal">Launch Modal</a>
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