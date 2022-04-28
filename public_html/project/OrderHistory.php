<?php
require(__DIR__ . "/../../partials/nav.php");
if (!is_logged_in()) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH/home.php"));
}
$results = [];
$db = getDB();
$user_id=get_user_id();
$category_list=[];

$stmt2 = $db->prepare("SELECT DISTINCT category from $TABLE_NAME  LIMIT 50");
try {
    $stmt2->execute();
    $category_list = $stmt2->fetchAll();
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching records category information", "danger");
}

 $query="SELECT total,  item_id, quantity,payment_method, cost, (cost*quantity) as subtotal FROM OrderItems c JOIN Orders i on c.order_id = i.id WHERE c.order_id =45 and c.item_id IN(select name,category from products where id = c.item_id);";
 $query2="SELECT * 
 FROM  Orders
 WHERE ID IN (SELECT ID 
       FROM CUSTOMERS 
       WHERE SALARY > 4500) ;";



$stmt = $db->prepare("SELECT money_recieved, id as 'order id', payment_method  from Orders where user_id = :uid LIMIT 10");
try {
    $stmt->execute([":uid" => $user_id]);
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
require_once(__DIR__ . "/../../partials/flash.php");
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
                        <a href="orderdetails.php?orderid=<?php se($record, "order id"); ?>">Order Details</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        </div>