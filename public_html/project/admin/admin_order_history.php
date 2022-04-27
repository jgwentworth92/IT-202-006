<?php
require(__DIR__ . "/../../../partials/nav.php");
if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH" . "home.php"));
}
$results = [];
$db = getDB();
$user_id=get_user_id();

$stmt = $db->prepare("SELECT money_recieved as 'Money Recieved', id as 'order id',total, user_id as 'user id', payment_method  from Orders LIMIT 10");
try {
    $stmt->execute();
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    flash("we made it bby", "success");
    if ($r) {
        $results = $r;
    }
   
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching records", "danger");
}
?>
<?php
require_once(__DIR__ . "/../../../partials/flash.php");
?>



<div class="container-fluid">
    <h1>
        order history
    </h1>

    <div class="container-fluid">
        <div class="col">
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-4 g-4">
            <table class="table">
            <?php foreach ($results as $index => $record) : ?>
                <?php if ($index == 0) : ?>
                    <thead>
                        <?php foreach ($record as $column => $value) : ?>
                            <th><?php se($column); ?></th>
                        <?php endforeach; ?>
                        <th>Actions</th>
                    </thead>
                <?php endif; ?>
                <tr>
                    <?php foreach ($record as $column => $value) : ?>
                        <td><?php se($value, null, "N/A"); ?></td>
                    <?php endforeach; ?>


                    <td>
                        <a href="<?php echo get_url('orderdetails.php'); ?>?orderid=<?php se($record, "order id"); ?>">Order Details</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        </div>

        