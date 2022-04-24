<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../partials/nav.php");

$TABLE_NAME = "Products";


$results = [];
$category_list = [];




$db = getDB();



$userID = get_user_id();

$hasError = false;




if (isset($_POST["submit"])) {
    $item_id = (int)se($_POST, "item_id", null, false);
    $amount = (int)se($_POST, "amount", "", false);
    $cost = se($_POST, "cost", "", false);
    // makes sures entered quantity is not negative 
    if ($amount <= 0) {
        $hasError = true;
        flash("please enter a  number greater then 0", "warning");
    }
    if (!is_logged_in()) {
        $hasError = true;
        flash("You need to be logged in to add to a cart", "warning");
    }
    if (!$hasError) {

        $stmt = $db->prepare("INSERT INTO JG_Cart (item_id, quantity, user_id,unit_cost) VALUES(:item, :quantity, :userID,:unit_cost) ON DUPLICATE KEY UPDATE quantity = quantity + :quantity");
        $stmt->bindValue(":item", $item_id, PDO::PARAM_INT);
        $stmt->bindValue(":quantity", $amount, PDO::PARAM_INT);
        $stmt->bindValue(":userID", get_user_id(), PDO::PARAM_INT);
        $stmt->bindValue(":unit_cost", $cost, PDO::PARAM_STR);

        try {
            $stmt->execute();
            flash("Successfully added to cart!", "success");
        } catch (Exception $e) {
            error_log(var_export($e, true));
            flash("Error looking up record", "danger");
        }
    }
}



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
$test = se($_GET, "itemName", "", false);
$base_query = "SELECT id, name, description,category, stock, unit_price, image FROM $TABLE_NAME ";


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

if (!empty($col) && !empty($order)) {
    $query .= " ORDER BY $col $order"; //be sure you trust these values, I validate via the in_array checks above
}

$query .= " LIMIT 10";
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
    <div class="bg-image" style="
    background-image: url('/project1_guitar_pics/glass.jpg');
  min-height : 100%;
  min-width : 100%;
  background-size:100% 100%;
  background-repeat:no-repeat;
  overflow-y: hidden;
  overflow-x: hidden;
">
        <h1>Product Search</h1>
        <form method="GET" class="row row-cols-lg-auto g-3 align-items-center">
            <div class="input-group  mr-2 mb-3">
                <input class="form-control" type="search" name="itemName" placeholder="Item Filter" />
                <select method="GET" name="myb" class="form-select" aria-label="Default select example">
                    <option value="0">--Select Category--</option>
                    <?php foreach ($category_list as $dropdown) : ?>

                        <option value="<?php se($dropdown, "category");
                                        error_log(var_export($dropdown, true)); ?>" name="category">
                            <?php se($dropdown, "category");    ?>
                        </option>
                    <?php endforeach;  ?>
                </select>

                <select class="form-select" name="col" value="<?php se($col); ?>" aria-label="Default select example">
                    <option value="0">--Order By--</option>
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
                <select class="form-select" name="order" value="<?php se($order); ?>" aria-label="Default select example">
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


    </div>


    <div class="container-fluid">
        <h1>Shop</h1>

        <div class="row">
            <div class="col">
                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <?php foreach ($results as $item) : ?>
                        <div class="col">
                            <div class="card text-center  justify-content-center  mb-3" style="height:30em; max-width: 18rem;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <?php if (se($item, "image", "", false)) : ?>
                                            <img src="<?php se($item, "image"); ?>" class="card-img-top mx-auto" style=" max-width:50%; max-height:30%;width:auto;height:100%;" alt="...">
                                        <?php endif; ?>
                                        <div class="card-header">
                                            <a href="<?php echo get_url('item_details.php'); ?>?id=<?php se($item, "id"); ?>">Item Details</a>
                                            <?php if (has_role("Admin")) : ?>
                                                <a href="<?php echo get_url('admin/edit_item.php'); ?>?id=<?php se($item, "id"); ?>">Edit</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Name: <?php se($item, "name"); ?></h5>
                                            <p class="card-text">Description: <?php
                                                                                // truncates description 
                                                                                $STR = strval(se($item, "description", "", false));
                                                                                if (strlen($STR) > 100) {
                                                                                    $shortdesc = truncateWords($STR, 2, "...");
                                                                                    se($shortdesc);
                                                                                } else {
                                                                                    se($item, "description");
                                                                                }
                                                                                ?> </p>
                                            <p class="card-text">Category: <?php se($item, "category"); ?></p>
                                            <p class="card-text">Stock: <?php se($item, "stock"); ?></p>
                                            <p class="card-text"> Cost: <?php se($item, "unit_price"); ?></p>
                                            <form class="form-inline" method="POST">
                                                <div class="form-group mb-2">
                                                    <label class="form-label" for="amount">Quantity</label>
                                                    <input class="form-control" type="number" step="1" name="amount" required />
                                                </div>
                                                <input class="form-control" type="number" step="1" name="amount" required />
                                                <input class="form-control" type="hidden" name="item_id" value="<?php se($item, "id"); ?>" />
                                                <input class="form-control" type="hidden" name="cost" value="<?php se($item, "unit_price"); ?>" />
                                                <input class="btn btn-primary" type="submit" value="add to cart" name="submit" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                </div>
            </div>
            <div class="col-4" style="min-width:10em">
            </div>
        </div>
        <?php
        require_once(__DIR__ . "/../../partials/flash.php");
        ?>



        <script>
            function validate(form) {
                let amount = parseInt(form.amount.value);
                let available = parseInt(form.avail_amount.value);
                isValid = true;
                if (!is_num(amount)) {
                    flash("Please enter a number", "warning");
                    isValid = false;
                }
                if (amount > avail_amount) {
                    flash("Entered amount is greater then current stock", "warning");
                    isValid = false;
                }
                return isValid;
            }
        </script>