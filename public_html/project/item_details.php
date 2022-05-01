<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../partials/nav.php");
$db = getDB();





$results = [];
$boughtCHK = false;
$results2 = [];
$results3 = [];
$review_LST = [];
$item_id = se($_GET, "id", -1, false);
// makes sures entered quantity is not negative 


$stmt = $db->prepare("SELECT id, name, description,stock, unit_price,category, image , avg_rating from Products WHERE id = :item LIMIT 50");
try {
    $stmt->execute([":item" => $item_id]);
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $results = $r;
    }
} catch (Exception $e) {
    error_log(var_export($e, true));
    flash("Error looking up record", "danger");
}

if (is_logged_in()) {
    $user = get_user_id();
    $params[":uid"] = "$user";
    $params[":item"] = "$item_id";

    $stmt = $db->prepare("SELECT id from OrderItems WHERE item_id = :item and user_id=:uid");
    foreach ($params as $key => $value) {
        error_log(var_export($value, true));
        $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
        $stmt->bindValue($key, $value, $type);
    }
    $params = null;
    try {
        $stmt->execute($params);
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $results2 = $r;
        }

        if (count($results2) > 0) {
            $boughtCHK = true;
        }
        $rating = (int)se($_POST, "rating", "", false);
        error_log(var_export($rating . " rating value", true));
        $review = se($_POST, "comment", "", false);
        error_log(var_export($review . " review value", true));
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error fetching records we in it bby", "danger");
    }
}




if (isset($_POST["add"])) {
    $item_id = (int)se($_POST, "item_id", null, false);
    $amount = (int)se($_POST, "amount", "", false);
    $cost = se($_POST, "cost", null, false);
    $hasError = false;
    // makes sures entered quantity is not negative 
    if ($amount <= 0) {
        $hasError = true;
        flash("please enter a  number greater then 0", "warning");
    }

    if (!$hasError) {

        $stmt = $db->prepare("INSERT INTO JG_Cart (item_id, quantity, user_id,unit_cost) VALUES(:item, :quantity, :userID,:unit_cost) ON DUPLICATE KEY UPDATE quantity = :quantity");
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



if (isset($_POST["review"])) {

    $rating = (int)se($_POST, "rating", "", false);
    error_log(var_export($rating . " rating value", true));
    $review = se($_POST, "comment", "", false);
    error_log(var_export($review . " review value", true));
    $stmt = $db->prepare("INSERT INTO  Ratings (product_id, user_id,rating,comment) VALUES(:item, :uid, :rating,:comment) ");
    $stmt->bindValue(":item", $item_id, PDO::PARAM_INT);
    $stmt->bindValue(":uid", get_user_id(), PDO::PARAM_INT);
    $stmt->bindValue(":rating", $rating, PDO::PARAM_INT);
    $stmt->bindValue(":comment", $review, PDO::PARAM_STR);
    try {
        $stmt->execute();
        flash("Successfully made a review!", "success");
    } catch (Exception $e) {
        error_log(var_export($e, true));
        flash("Error looking up record", "danger");
    }

    $stmt = $db->prepare("SELECT rating FROM Ratings WHERE product_id = :itmID");
    try {
        $stmt->execute([":itmID" => $item_id]);
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $results3 = $r;
        }
        $avg_rating = 0;
        foreach ($results3 as $row) {
            $avg_rating += (int)se($row, "rating", 0, false);
        }
        $avg_rating /= count($results3);
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error fetching records", "danger");
    }


    $stmt = $db->prepare("UPDATE Products SET avg_rating=:avg_rating WHERE id=:item");
    $stmt->bindValue(":item", $item_id, PDO::PARAM_INT);
    $stmt->bindValue(":avg_rating", $avg_rating, PDO::PARAM_INT);

    try {
        $stmt->execute();
        flash("Successfully updated average rating", "success");
    } catch (Exception $e) {
        error_log(var_export($e, true));
        flash("Error looking up record", "danger");
    }
}



$total_query = "SELECT count(1) as total FROM Ratings";
$base_query = "SELECT rating, username,comment FROM Ratings r JOIN Users u on r.user_id = u.id ";
$params = [];
$query = " WHERE 1=1 ";
$query .= " AND  product_id = :item_id";
$params[":item_id"] = "$item_id";
$per_page = 10;
paginate($total_query . $query, $params, $per_page);

$query .= " LIMIT :offset, :count";
$params[":offset"] = $offset;
$params[":count"] = $per_page;
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
        $review_LST = $r;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching records we in it bby", "danger");
}



?>




<?php require_once(__DIR__ . "/../../partials/flash.php"); ?>


<div class="container-fluid">
    <?php foreach ($results as $item) : ?>
        <div class="col">
            <div class="card bg-light ">
                <div class="card-header">
                  Average  USer Rating: <?php se($item, "avg_rating"); ?> /5 ☆ 
                </div>
                <?php if (se($item, "image", "", false)) : ?>
                    <img src="<?php se($item, "image"); ?>" class="card-img-top" style="max-width:20%;" alt="...">
                <?php endif; ?>
                <div class="card-body">
                    <h5 class="card-title">Name: <?php se($item, "name"); ?></h5>
                    <p class="card-text">Description: <?php se($item, "description"); ?></p>
                    <p class="card-text">Category: <?php se($item, "category"); ?></p>
                    <p class="card-text">Stock: <?php se($item, "stock"); ?></p>
                </div>
                <div class="card-footer">
                    Cost: <?php se($item, "unit_price"); ?>

                    <?php if (is_logged_in()) : ?>
                        <form name="submit" method="POST" onsubmit="return validate(this);">
                            <label class="form-label" for="amount">Quantity</label>
                            <input class="form-control" type="number" step="1" name="amount" required />
                            <input class="form-control" type="hidden" name="item_id" value="<?php se($item, "id"); ?>" />
                            <input class="form-control" type="hidden" name="cost" value="<?php se($item, "unit_price"); ?>" />
                            <input class="form-control" type="hidden" name="avail_amount" value="<?php se($item, "stock"); ?>" />
                            <input class="btn btn-primary" type="submit" value="add to cart" name="add" />
                        </form>
                        <?php if ($boughtCHK) : ?>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#form"> Leave a review </button>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <?php if (has_role("Admin")) : ?>

                <td>
                    <a href="<?php echo get_url('admin/edit_item.php'); ?>?id=<?php se($item, "id"); ?>">Edit</a>
                </td>
            <?php endif; ?>
        </div>
</div>

<?php endforeach; ?>
<?php if (count($review_LST) == 0) : ?>
    <p>No reviews for this item</p>
<?php else : ?>
    <div class="col row">
    <h1>Item Reviews </h1>
        <?php foreach ($review_LST as $each) : ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> Rating ☆<?php se($each, "rating"); ?> /5</h5>
                    <p class="card-text"> username: <?php se($each, "username"); ?></p>
                    <p class="card-text"> Review:<?php se($each, "comment"); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>


<?php include(__DIR__ . "/../../partials/pagination.php"); ?>
<div class="col-4" style="min-width:30em">



    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form class="text-center d-block" method="POST">
                    <div class="text-right cross"> <i class="fa fa-times mr-2"></i> </div>
                    <div class="card-body text-center"> <img src=" https://i.imgur.com/d2dKtI7.png" height="100" width="100">
                        <div class="comment-box text-center">
                           
                            <div class="rating">
                                <input type="radio" name="rating" value="1" id="1">
                                <label for="1">1 ☆</label>
                                <input type="radio" name="rating" value="2" id="2">
                                <label for="2">2 ☆</label>
                                <input type="radio" name="rating" value="3" id="3">
                                <label for="3">3 ☆</label>
                                <input type="radio" name="rating" value="4" id="4">
                                <label for="4">4 ☆</label>
                                <input type="radio" name="rating" value="5" id="5">
                                <label for="5">5 ☆</label>
                            </div>
                            <div class="comment-area"> <textarea name="comment" class="form-control" placeholder="what is your view?" rows="4"></textarea> </div>
                            <div class="text-center mt-4"> <button type="submit" value="add a review" name="review" class="btn btn-success send px-5">Submit review <i class="fa fa-long-arrow-right ml-1"></i></button> </div>
                        </div>
                    </div>
            </div>
            <form>
        </div>
    </div>