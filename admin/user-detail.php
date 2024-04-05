<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/Customer.php';?>
<?php include '../classess/Cart.php';?>
<?php include_once '../helpers/Formate.php';?>



<?php
if (!isset($_GET['cmrid']) || $_GET['cmrid'] == NULL) {
  echo "<script>window.location='user-list.php';</script>";
} else {
  $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['cmrid']);
}


$cmr = new Customer();
$ct = new Cart();
$fm = new Format();
?>






<div
  id="user_info_content"
  class="admin-page-main-container2 column"
>
  <span class="admin-page-main-text">User Information Details</span>


  <?php
    $getCmr = $cmr->getCustomerData($_GET['cmrid']);
    if ($getCmr) {
        while ($value = $getCmr->fetch_assoc()) {
  ?>

  <div class="add_product_container">

      <div class="add_product_entry_container">
          <span class="add_product_entry_text">User ID:</span>
          <span class="add_product_entry_text_content"><?php echo $value['id'];?></span>
      </div>
    
      <div class="add_product_entry_container">
          <span class="add_product_entry_text">Name:</span>
          <span class="add_product_entry_text_content"><?php echo $value['name'];?></span>
      </div>

      <div class="add_product_entry_container">
          <span class="add_product_entry_text">Email:</span>
          <span class="add_product_entry_text_content"><?php echo $value['email'];?></span>
      </div>

      <div class="add_product_entry_container">
          <span class="add_product_entry_text">Phone:</span>
          <span class="add_product_entry_text_content"><?php echo !empty($value['phone']) ? $value['phone'] : 'N/A';?></span>
      </div>

      <div class="add_product_entry_container">
          <span class="add_product_entry_text">Address:</span>
          <span class="add_product_entry_text_content"><?php echo !empty($value['address']) ? $value['address'] : 'N/A';?></span>
      </div>

      <div class="add_product_entry_container">
          <span class="add_product_entry_text">City:</span>
          <span class="add_product_entry_text_content"><?php echo !empty($value['city']) ? $value['city'] : 'N/A';?></span>
      </div>

      <div class="add_product_entry_container">
          <span class="add_product_entry_text">Country:</span>
          <span class="add_product_entry_text_content"><?php echo !empty($value['country']) ? $value['country'] : 'N/A';?></span>
      </div>

      <div class="add_product_entry_container">
          <span class="add_product_entry_text">Zip:</span>
          <span class="add_product_entry_text_content"><?php echo !empty($value['zip']) ? $value['zip'] : 'N/A';?></span>
      </div>

  </div>

  <?php } } ?>


  <span class="admin-page-main-text" style="padding-top: 70px;">User Orders</span>


  <table class="data display datatable" id="example" style="width: 1200px;">

    <thead>
      <tr>
        <th>Order ID</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Image</th>
        <th>Price</th>
        <th>Date</th>
        <th>Status</th>
      </tr>
    </thead>

    <tbody>

      <?php
      $getOrder = $ct->getOrderedProduct($_GET['cmrid']);
      if ($getOrder) {
        $i = 0;
        while ($result = $getOrder->fetch_assoc()) {
          $i++;
      ?>
      <tr class="odd gradeX">
        <td><?php echo $result['id'];?></td>
        <td><?php echo $result['productName'] ;?></td>
        <td><?php echo $result['quantity'] ;?></td>
        <td><img src="<?php echo $result['image'];?>" style="width: 50px;"></td>
        <td>HKD <?php echo $result['price'] ;?></td>
        <td><?php echo $fm->formatDate($result['date']); ?></td>
        <td>
          <?php
          if ($result['status'] == 0) {
            echo "Pending";
          } elseif ($result['status'] == 1) {
            echo "Shifted";
          } elseif ($result['status'] == 2) {
            echo "Delivered";
          } elseif ($result['status'] == 3) {
            echo "Canceled";
          }
          ?>
        </td>
      </tr>

      <?php } } else {
        echo "No existing orders";
      }
      ?>

    </tbody>
  </table>




  <div class="add_product_button_container" style="padding-left: 150px;">
      <a
        href="user-list.php"
        class="add_product_button button"
      >
        Back
      </a>
  </div>







</div>


<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>


          
<?php include 'inc/footer.php'; ?>