<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");
$TABLE_NAME = "Products";


$results = [];
$category_list = [];




$db = getDB();
$col = se($_GET, "col", "cost", false);
//allowed list
if (!in_array($col, ["unit_price", "stock", "name", "created"])) {
    $col = "unit_price"; //default value, prevent sql injection
}
$order = se($_GET, "order", "asc", false);
//allowed list
if (!in_array($order, ["asc", "desc"])) {
    $order = "asc"; //default value, prevent sql injection
}

$stmt2 = $db->prepare("SELECT DISTINCT category from $TABLE_NAME  LIMIT 50");
try {
    $stmt2->execute();
    $category_list = $stmt2->fetchAll();
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching records category information", "danger");
}
$cat = se($_GET, "myb", "", false);
$name = se($_GET, "itemName", "", false);
$base_query = "SELECT id, name, description, stock, unit_price,category, image FROM $TABLE_NAME ";


$query = " WHERE 1=1"; //1=1 shortcut to conditionally build AND clauses

$params = [];
if (!empty($cat)) {
    $query .= " AND  category = :category";
    $params[":category"] = "$cat";
}
if (!empty($name)) {
    $query .= " AND  name like :name";
    $params[":name"] = "%$name%";
}

if (!empty($col) && !empty($order)) {
    $query .= " ORDER BY $col $order"; //be sure you trust these values, I validate via the in_array checks above
}


$query .= " LIMIT 50";
error_log(var_export($params, true));
error_log(var_export($name, true));
error_log(var_export($cat, true));
error_log(var_export($query, true));
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
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching records we in it bby", "danger");
}







?>
<div class="container-fluid">
    <h1>Product Search</h1>
    <form method="GET" class="row row-cols-lg-auto g-3 align-items-center">
        <div class="input-group  mr-2 mb-3">
            <input class="form-control" type="search" name="itemName" placeholder="Item Filter" />


            <select method="GET"  name="myb"class="form-select" aria-label="Default select example">
                <option value="0">--Select Category--</option>
                <?php foreach ($category_list as $dropdown) : ?>

                    <option value="<?php se($dropdown, "category");
                                    error_log(var_export($dropdown, true)); ?>" name="category">
                        <?php se($dropdown, "category");    ?>
                    </option>
                <?php endforeach;  ?>
            </select>
            
            <select class="form-select" name="col" value="<?php se($col); ?>"aria-label="Default select example">
                    <option value="item_price">Cost</option>
                    <option value="stock">Stock</option>
                    <option value="name">Name</option>
                    <option value="created">Created</option>
                </select>
                <script>
                    //quick fix to ensure proper value is selected since
                    //value setting only works after the options are defined and php has the value set prior
                    document.forms[0].col.value = "<?php se($col); ?>";
                </script>
                <select class="form-select" name="order" value="<?php se($order); ?>"aria-label="Default select example">
                    <option value="asc">Up</option>
                    <option value="desc">Down</option>
                </select>
                <script>
                    //quick fix to ensure proper value is selected since
                    //value setting only works after the options are defined and php has the value set prior
                    document.forms[0].order.value = "<?php se($order); ?>";
                </script>
            <input class="btn btn-primary" type="submit" value="Search" />

    </form>

    <?php if (count($results) == 0) : ?>
        <p>No results to show</p>
    <?php else : ?>
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

                    <?php if (has_role("Admin")) : ?>

                        <td>
                            <a href="edit_item.php?id=<?php se($record, "id"); ?>">Edit</a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
<?php
require_once(__DIR__ . "/../../../partials/flash.php");
?>