<?php
require(__DIR__ . "/../../partials/nav.php");
if (!is_logged_in()) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH/home.php"));
}
$results = [];
$category_list=[];
$params = [];
$db = getDB();
$total_cost=0;
$user_id=get_user_id();
$base_query ="SELECT id as order_id, address, payment_method, total, created as 'order date'   FROM Orders";
$total_query = "SELECT count(1) as total FROM Orders ";
$stmt2 = $db->prepare("SELECT DISTINCT category from Products  LIMIT 50");
try {
    $stmt2->execute();
    $category_list = $stmt2->fetchAll();
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching records category information", "danger");
}
$cat = se($_GET, "myb", "", false);
$query = " WHERE 1=1"; //1=1 shortcut to conditionally build AND clauses
$query.=" AND user_id = :uid";
$params[":uid"]="$user_id";

if (!empty($cat)) {
    $query .= " AND  id in (SELECT order_id FROM OrderItems oi JOIN Products p on p.id = oi.item_id WHERE p.category = :category)";
    $params[":category"] = "$cat";
}


$stmt = $db->prepare($base_query . $query);
foreach ($params as $key => $value) {
    $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
    $stmt->bindValue($key, $value, $type);
}
$params = null;
try {
    $stmt->execute($params);
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $results = $r;
    }

    foreach ($results as $row) {
        $total_cost += (double)se($row, "total", 0, false);
     
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching records we in it bby", "danger");
}



?>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>



<div class="container-fluid">
    <h1>
        order history: Total spent $<?php se($total_cost, null, "N/A"); ?>
    </h1>
    <form method="GET" class="row row-cols-lg-auto g-3 align-items-center">
            <div class="input-group  mr-2 mb-3">
                <input class="form-control" type="search" name="itemName" placeholder="Item Filter" />
                <select method="GET" name="myb" class="form-select" aria-label="Default select example">
                    <option value="0">--Select Category--</option>
                    <?php foreach ($category_list as $dropdown) : ?>

                        <option value="<?php se($dropdown, "category");
                                         ?>" name="category">
                            <?php se($dropdown, "category");    ?>
                        </option>
                    <?php endforeach;  ?>
                </select>
                <input class="btn btn-primary" type="submit" value="Search" />
        </form>
        <div class="container px-1 px-sm-5 mx-auto">
    <form autocomplete="off">
        <div class="flex-row d-flex justify-content-center">
            <div class="col-lg-6 col-11 px-1">
                <div class="input-group input-daterange"> <input type="text" id="start" class="form-control text-left mr-2"> <label class="ml-3 form-control-placeholder" id="start-p" for="start">Start Date</label> <span class="fa fa-calendar" id="fa-1"></span> <input type="text" id="end" class="form-control text-left ml-2"> <label class="ml-3 form-control-placeholder" id="end-p" for="end">End Date</label> <span class="fa fa-calendar" id="fa-2"></span> </div>
            </div>
        </div>
    </form>
</div>
        <?php if (count($results) == 0) : ?>
            <p>No results to show</p>
        <?php else : ?>
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
                        <a href="orderdetails.php?orderid=<?php se($record, "order_id"); ?>">Order Details</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
        </div>