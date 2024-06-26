<!-- 
    This page is for the admin to view all the orders made by the users.
    The admin can view the order details and can delete the order if needed.
    The admin can also update the status of the order.
    The admin can view the order ID, product ID, product name, user ID, quantity, price, date, status, and action.
    The admin can view the order status as pending, delivering, delivered, and rated.
 -->

<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/Cart.php';?>
<?php include_once '../helpers/Formate.php';?>

<?php
$ct = new Cart();
$fm = new Format();
?>

<?php
if (isset($_GET['delorder'])) {
    // Sanitize the input by removing any characters that are not alphanumeric or underscore
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delorder']);
    $delorder = $ct->delOrderById($id);
}
?>

<div id="user_info_content" class="admin-page-main-container2 column">
    <span class="admin-page-main-text">Order List</span>

    <?php
    if (isset($delorder)) {
        // Display the error or success message for deleting the order
        echo $delorder;
    }
    ?>

    <table class="data display datatable" id="example" style="width: 1200px;">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>User ID</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $getOrder = $ct->getAllOrderProduct();
            if ($getOrder) {
                while ($result = $getOrder->fetch_assoc()) {
                // for each order, display the order details in a table row
            ?>
            <tr class="odd gradeX">
                <td><?php echo $result['id'];?></td>
                <td><?php echo $result['productId'];?></td>
                <td><?php echo $result['productName'];?></td>
                <td><?php echo $result['cmrId'];?></td>
                <td><?php echo $result['quantity'];?></td>
                <td><?php echo $result['price'];?></td>
                <td><?php echo $fm->formatDate($result['date']); ?></td>
                <td>
                    <?php
                    if ($result['status'] == 0) {
                        echo "Pending";
                    } elseif ($result['status'] == 1) {
                        echo "Delivering";
                    } elseif ($result['status'] == 2) {
                        echo "Delivered";
                    } elseif ($result['status'] == 3) {
                        echo "Rated";
                    }
                    ?>
                </td>
                <td>
                    <a href="order-update.php?orderid=<?php echo $result['id']; ?>">Update</a> ||
                    <a onclick="return confirm('Are you sure to delete?')" href="?delorder=<?php echo $result['id']; ?>">Delete</a>
                </td>
            </tr>
            <?php } } ?>
        </tbody>
    </table>
</div>

<!-- Include necessary scripts for the datatable -->
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>

<?php include 'inc/footer.php'; ?>