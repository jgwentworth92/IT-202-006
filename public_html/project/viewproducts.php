<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../partials/nav.php");
$TABLE_NAME = "Products";


$results = [];
$category_list = [];




$db = getDB();
$stmt2 = $db->prepare("SELECT DISTINCT category from $TABLE_NAME  LIMIT 50");
try {
    $stmt2->execute();
    $category_list = $stmt2->fetchAll();
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching records category information", "danger");
}
$cat = se($_GET, "category", "", false);
$name = se($_GET, "itemName", "", false);
$base_query = "SELECT id, name, description, stock, unit_price, image FROM $TABLE_NAME ORDER BY unit_price DESC ";
if (isset($_GET["highest"])) {
    $col = " unit_price ";
    $order = " ASC ";
}

if (isset($_GET["lowest"])) {
    $col = " unit_price ";
    $order = " DESC ";
}
if (!empty($col) && !empty($order)) {
    $query .= " ORDER BY  unit_price DESC"; //be sure you trust these values, I validate via the in_array checks above
}

$query = " WHERE 1=1"; //1=1 shortcut to conditionally build AND clauses
$query .= " AND is_visible =1";
$params = [];
if (!empty($cat)) {
    $query .= " AND  category = :category";
    $params[":category"] = "$cat";
}
if (!empty($name)) {
    $query .= " AND  name like :name";
    $params[":name"] = "%$name%";
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


            <select method="GET" class="form-select" aria-label="Default select example">
                <option value="0">--Select Category--</option>
                <?php foreach ($category_list as $dropdown) : ?>

                    <option value="<?php se($dropdown, "category");
                                    error_log(var_export($dropdown, true)); ?>" name="category">
                        <?php se($dropdown, "category");    ?>
                    </option>
                <?php endforeach;  ?>
            </select>
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="defaultUnchecked" name="lowest">
                <label class="custom-control-label" for="defaultUnchecked">low to high</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="defaultUnchecked" name="highest">
                <label class="custom-control-label" for="defaultUnchecked">high to low</label>
            </div>
            \
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
require_once(__DIR__ . "/../../partials/flash.php");
?>