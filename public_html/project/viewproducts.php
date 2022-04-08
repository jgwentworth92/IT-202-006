<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../partials/nav.php");
$TABLE_NAME = "Products";

$results = [];
if (isset($_POST["itemName"])&&isset($_POST["product_name"]) &&&&isset($_POST["category_filter"])) {
    $db = getDB();

    $stmt = $db->prepare("SELECT id, name, description,stock, unit_price, image from $TABLE_NAME WHERE name like :name or category like :name and is_visible=1 LIMIT 50");
    try {
        $stmt->execute([":name" => "%" . $_POST["itemName"] . "%"]);
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $results = $r;
        }
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error fetching records", "danger");
    }
}
?>
<div class="container-fluid">
    <h1>List Items</h1>
    <form method="POST" class="row row-cols-lg-auto g-3 align-items-center">
        <div class="input-group mb-3">
            <input class="form-control" type="search" name="itemName" placeholder="Item Filter" />
            <input class="btn btn-primary" type="submit" value="Search" />
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="product_name" value="option2">
            <label class="form-check-label" for="inlineCheckbox2"> Name </label>
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1"  name="category_filter"value="option1">
            <label class="form-check-label" for="inlineCheckbox1">category</label>

        </div>
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


                    <td>
                        <a href="edit_item.php?id=<?php se($record, "id"); ?>">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>