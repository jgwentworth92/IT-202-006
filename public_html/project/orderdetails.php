<?php
require(__DIR__ . "/../../partials/nav.php");

$results = [];
$db = getDB();
$user_id = get_user_id();

$order_id = se($_GET, "orderid", "", false);

$stmt = $db->prepare("SELECT total,  item_id, quantity,payment_method, cost, (cost*quantity) as subtotal FROM OrderItems c JOIN Orders i on c.order_id = i.id WHERE c.order_id = :orderID");
try {
    $stmt->execute([":orderID" => $order_id]);
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
    <h1 class="display-6">
        Order ID <?php se($order_id, null, "N/A"); ?> ,
    
    </h1>
    <h1 class="display-6">
      
        Payment type <?php se($payment_method, null, "N/A"); ?> ,

        Total $<?php se($total_cost, null, "N/A"); ?> 
    </h1>





    <table class="table">


        <thead>
            <th scope="col">Item SKU</th>
            <th scope="col"> per unit cost</th>
            <th scope="col">Quantity</th>
            <th scope="col">subtotal</th>

            <th>Actions</th>
        </thead>
        <?php foreach ($results as $item) : ?>

            <tr>
                <td> <?php se($item, "item_id"); ?></td>
                <td><?php se($item, "cost"); ?></td>
                <td><?php se($item, "quantity"); ?></td>
                <td> <?php se($item, "subtotal"); ?></td>




                <td>
                    <a href="edit_item.php?id=<?php se($item, "item_id"); ?>">Edit</a>
                </td>
            </tr>
        <?php endforeach; ?>
</div>