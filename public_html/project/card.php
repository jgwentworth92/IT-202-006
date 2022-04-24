<?php
require_once(__DIR__ . "/../../lib/functions.php");
require(__DIR__ . "/../../partials/nav.php");
?>

<div class="card text-center   mb-3" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
            <?php if (se($item, "image", "", false)) : ?>
                <img src="<?php se($item, "image"); ?>" class="card-img-top mx-auto" style=" max-width:20%; max-height:30%;width:auto;height:100%;" alt="...">
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
                <form name="submit" method="POST" onsubmit="return validate(this);">
                    <div class="col-auto">
                        <label class="visually-hidden" for="amount">quantity</label>
                        <input class="form-control" type="number" step="1" name="amount" required />
                        <input class="form-control" type="hidden" name="item_id" value="<?php se($item, "id"); ?>" />
                        <input class="form-control" type="hidden" name="cost" value="<?php se($item, "unit_price"); ?>" />
                    </div>
                    <div class="col-auto">
                        <input class="btn btn-primary" type="submit" value="add to cart" name="submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



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

<?php foreach ($results as $item) : ?>
    <div class="col">
        <div class="card  d-flex flex-column justify-content-center   bg-light" style="height:35em">
            <?php if (se($item, "image", "", false)) : ?>
                <img src="<?php se($item, "image"); ?>" class="card-img-top mx-auto" style=" max-width:20%; max-height:30%;width:auto;height:100%;" alt="...">
            <?php endif; ?>
            <div class="card-header">
                <a href="<?php echo get_url('item_details.php'); ?>?id=<?php se($item, "id"); ?>">Item Details</a>
                <?php if (has_role("Admin")) : ?>
                    <a href="<?php echo get_url('admin/edit_item.php'); ?>?id=<?php se($item, "id"); ?>">Edit</a>
                <?php endif; ?>

            </div>
            <div class="card-body">
                <h5 class="card-title">Name: <?php se($item, "name"); ?></h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        Description:
                        <?php
                        // truncates description 
                        $STR = strval(se($item, "description", "", false));
                        if (strlen($STR) > 100) {
                            $shortdesc = truncateWords($STR, 2, "...");
                            se($shortdesc);
                        } else {
                            se($item, "description");
                        }
                        ?></li>
                    <li class="list-group-item">Category: <?php se($item, "category"); ?></li>
                    <li class="list-group-item">Stock: <?php se($item, "stock"); ?></li>
                    <li class="list-group-item"> Cost: <?php se($item, "unit_price"); ?></li>
                </ul>

                <div class="card-body">
                    <form name="submit" method="POST" onsubmit="return validate(this);">
                        <div class="col-auto">
                            <label class="visually-hidden" for="amount">quantity</label>
                            <input class="form-control" type="number" step="1" name="amount" required />
                            <input class="form-control" type="hidden" name="item_id" value="<?php se($item, "id"); ?>" />
                            <input class="form-control" type="hidden" name="cost" value="<?php se($item, "unit_price"); ?>" />
                        </div>
                        <div class="col-auto">
                            <input class="btn btn-primary" type="submit" value="add to cart" name="submit" />
                        </div>
                    </form>


                </div>

            </div>

        </div>
    </div>
<?php endforeach; ?>