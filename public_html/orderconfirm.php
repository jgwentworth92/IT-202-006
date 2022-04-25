
<?php

$results=[];

$stmt = $db->prepare("SELECT max(id) as order_id FROM Orders");
$order_id = 0;
    //get next order id
    try {
        $stmt->execute();
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        $order_id = (int)se($r, "order_id", 0, false);
    } catch (PDOException $e) {
        error_log("Error fetching order_id: " . var_export($e));
        $db->rollback();
        $hasError=true;
    }
$stmt = $db->prepare("SELECT total,  item_id, quantity,payment_method, cost, (cost*quantity) as subtotal FROM OrderItems c JOIN Orders i on c.order_id = i.id WHERE c.order_id = :orderID");
try {
    $stmt->execute([":orderID" => $order_id]);
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    flash("we made it bby", "success");
    if ($r) {
        $results = $r;
    }
    $total_cost = 0;
    foreach ($results as $row) {
        $total_cost += (int)se($row, "subtotal", 0, false);
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching records", "danger");
}