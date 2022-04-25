<?php
require(__DIR__ . "/../../partials/nav.php");

$results = [];
$db = getDB();
$user_id=get_user_id();

$stmt = $db->prepare("SELECT total, order_id, item_id, quantity,payment_method, cost, (cost*quantity) as subtotal FROM OrderItems c JOIN Orders i on c.order_id = i.id WHERE c.user_id = :uid");
try {
    $stmt->execute([":uid" => $order_id]);
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    flash("we made it bby", "success");
    if ($r) {
        $results = $r;
    }
    $total_cost = 0;
    foreach ($results as $row) {
        $total_cost = se($row, "total", 0, false);
        $payment_method = se($row, "payment_method", 0, false);
        
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching records", "danger");
}
?>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>



<div class="container-fluid">
    <h1>
        order history
    </h1>

    <div class="container-fluid">
        <div class="col">
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-4 g-4">
                <?php foreach ($results as $item) : ?>
                    <div class="col">
                        <div class="card text-white bg-dark text-center justify-content-center   bg-light" style="height:30em; max-width: 18rem;">
                            <div class="card-header">
                                <div class="card-body">
                                    <h5 class="card-title">Order ID: <?php se($item, "order_id"); ?></h5>
                                    <p class="card-text">Price: <?php se($item, "cost"); ?></p>
                                    <p class="card-text">Amount: <?php se($item, "quantity"); ?></p>
                                    <p class="card-text">Subtotal: <?php se($item, "subtotal"); ?></p>

                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>