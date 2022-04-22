<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../partials/nav.php");


if (isset($_POST["submit"])) {

    $total = se($_POST, "payment_amount", "", false);
    $payment_type = se($_POST, "payment_type", "", false);
    $Address = se($_POST, "address", "", false) . se($_POST, "address2", "", false) . " , " . se($_POST, "country", "", false) . " , " . se($_POST, "state", "", false) . " , " . se($_POST, "zip", "", false);
    error_log(var_export($Address, true));
    error_log(var_export(se($_POST, "address", "", false), true));
    error_log(var_export(se($_POST, "address2", "", false), true));
    error_log(var_export(se($_POST, "country", "", false), true));
    error_log(var_export(se($_POST, "state", "", false), true));
    error_log(var_export(se($_POST, "zip", "", false), true));
    error_log(var_export($total, true));
    error_log(var_export($payment_type, true));
    $user_id = get_user_id();
    $hasError = false;
    $db = getDB();



 
    $stmt = $db->prepare("SELECT name, c.id as line_id, item_id, quantity,stock, unit_price, (unit_price*quantity) as subtotal FROM JG_Cart c JOIN Products i on c.item_id = i.id WHERE c.user_id = :uid");
    try {
        $stmt->execute([":uid" => $user_id]);
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $results = $r;
        }
        $total_cost = 0;
        foreach ($results as $row) {
            
            $total_cost += (int)se($row, "subtotal", 0, false);
            $stock=se($row, "stock", 0, false);
            $desired_amount=se($row, "quantity", 0, false);
            if($desired_amount>$stock)
            {
                $hasError=true;
                $item_name=se($row,"name","",false);
                flash("$item_name do not have enough in stock ","warning");

            }
        }
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error fetching records", "danger");
    }




    
    if ($total != $total_cost) {
        $hasError = true;
        flash("total price entered is incorrect", "warning");
    }



}


$db->beginTransaction();
$stmt = $db->prepare("INSERT INTO Orders (user_id, total, money_recieved,payment_method,address) VALUES(:UID, :total, :money,:payment_method,:place)");
$stmt->execute([":UID" => $user_id, ":total" => $total, ":money" => $total, ":payment_method" => $payment_type, ":place" => $Address]);




if (!$hasError) {
    $db->commit();
    flash("commit", "success");
} else {
    $db->rollBack();
    flash("roll back", "danger");
}
?>
<?php if (count($results) == 0) : ?>
    <p>Nothing in Cart</p>
<?php else : ?>



    <div class="container-fluid">
        <h1> Total: $ <?php se($total_cost, null, "N/A"); ?>
        </h1>
        <div class="row">
            <div class="col">
                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-4 g-4">
                    <?php foreach ($results as $item) : ?>
                        <div class="col">
                            <div class=<div class="card  d-flex flex-column justify-content-center   bg-light" style="height:35em">
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