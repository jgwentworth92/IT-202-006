<?php
require(__DIR__ . "/../../partials/nav.php");
if (!is_logged_in()) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH/home.php"));
}
$results = [];
$category_list = [];
$params = [];
$db = getDB();
$total_cost = 0;
$user_id = get_user_id();
$base_query = "SELECT id as order_id, address, payment_method, total, created as 'order date'   FROM Orders";
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
$start = se($_GET, "startdate", "", false);
$end = se($_GET, "enddate", "", false);
error_log(var_export($start, true));
error_log(var_export($end, true));
$query = " WHERE 1=1"; //1=1 shortcut to conditionally build AND clauses
$query .= " AND user_id = :uid";
$params[":uid"] = "$user_id";

if (!empty($cat)) {
    $query .= " AND  id in (SELECT order_id FROM OrderItems oi JOIN Products p on p.id = oi.item_id WHERE p.category = :category)";
    $params[":category"] = "$cat";
}
if (!empty($start) && !empty($end)) {
    $start .= "00:00:00";
    $end .= "23:59:59";
    error_log(var_export($start."in it", true));
error_log(var_export($end, true));

    $query .= "AND created BETWEEN :start_d AND :end_D ";
    $params[":start_d"] = "$start";
    $params[":end_d"] = "$end";
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
        $total_cost += (float)se($row, "total", 0, false);
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
            <select method="GET" name="myb" class="form-select" aria-label="Default select example">
                <option value="0">--Select Category--</option>
                <?php foreach ($category_list as $dropdown) : ?>

                    <option value="<?php se($dropdown, "category");
                                    ?>" name="category">
                        <?php se($dropdown, "category");    ?>
                    </option>
                <?php endforeach;  ?>
            </select>
            <label for="startDate">Start</label>
            <input id="startDate" name="startdate" class="form-control" type="date" />
            <label for="endDate">End</label>
            <input id="endDate" name="enddate" class="form-control" type="date" />
            <input class="btn btn-primary" type="submit" value="Search" />
    </form>

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