<?php
require_once(__DIR__ . "/../../lib/functions.php");
require(__DIR__ . "/../../partials/nav.php");

    $user_id = get_user_id();

    $results = [];
    $db = getDB();
   
   
    $stmt = $db->prepare("SELECT name, c.id as line_id, item_id, quantity, unit_price, (unit_price*quantity) as subtotal FROM JG_Cart c JOIN Products i on c.item_id = i.id WHERE c.user_id = :uid");
    try {   $stmt->execute([":uid" => $user_id]);
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $results = $r;
        }
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error fetching records", "danger");
    }

?>

<?php if (count($results) == 0) : ?>
        <p>Nothing in Cart</p>
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
                    <a href="<?php echo get_url('admin/edit_item.php'); ?>?id=<?php se($value, "item_id"); ?>">Edit</a>
                </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>


<?php
    require(__DIR__ . "/../../partials/flash.php"); ?>
