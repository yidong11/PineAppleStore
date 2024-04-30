<!-- 
 * This file is responsible for updating the status of an order in the order database.
 * The updated order status is displayed along with a form to select a new status and save the changes. 
 * There are four possible order statuses: Pending, Delivering, Delivered, and Rated.
-->

<?php
ob_start();

include 'inc/header.php';
include 'inc/sidebar.php';
include '../classess/Cart.php';

if (!isset($_GET['orderid']) || $_GET['orderid'] == NULL) {
    // Redirect to the order list page if the order ID is not set
    echo "<script>window.location='order-list.php';</script>";
} else {
    // Sanitize the order ID
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['orderid']);
}

$ct = new Cart();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update the order status if a POST request is made
    $status = $_POST['status'];
    $updateOrder = $ct->updateOrderStatus($id, $status);
}

?>

<div id="user_info_content" class="admin-page-main-container2 column">
    <span class="admin-page-main-text">Update Order</span>

    <?php
    if (isset($updateOrder)) {
        // Display the update order status message
        echo $updateOrder;
    }
    ?>

    <?php
    $getOrder = $ct->getOrderById($id);
    if ($getOrder) {
        while ($result = $getOrder->fetch_assoc()) {
    ?>

    <form action="" method="post">

        <div class="add_product_container">

            <div class="add_product_entry_container">
                <span class="add_product_entry_text">Order Status</span>
                <select name="status" id="select" class="add_product_select_box">
                    <option value="0" <?php if ($result['status'] == 0) { ?> selected="selected" <?php } ?>>Pending</option>
                    <option value="1" <?php if ($result['status'] == 1) { ?> selected="selected" <?php } ?>>Delivering</option>
                    <option value="2" <?php if ($result['status'] == 2) { ?> selected="selected" <?php } ?>>Delivered</option>
                    <option value="3" <?php if ($result['status'] == 3) { ?> selected="selected" <?php } ?>>Rated</option>
                </select>
            </div>
        </div>

        <div class="add_product_button_container">
            <button type="submit" name="submit" class="add_product_button button">Save</button>
            <a href="order-list.php" class="add_product_button button">Cancel</a>
        </div>
    </form>

    <?php } } ?>

</div>

<?php include 'inc/footer.php'; ?>

<?php
ob_end_flush();
?>