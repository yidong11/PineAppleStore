<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/Product.php';?>
<?php include_once '../helpers/Formate.php';?>

<?php
$pd = new Product();
$fm = new Format();
?>


<?php
if (isset($_GET['delpro'])) {
	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delpro']);
	$delpro = $pd->delProById($id);
}
?>



<div
  id="user_info_content"
  class="admin-page-main-container2 column"
>
  <span class="admin-page-main-text">Product List</span>

  <?php 
  if (isset($delpro)) {
    echo $delpro;
  }
  ?> 


  <table class="data display datatable" id="example" style="width: 1200px;">
    <thead>
      <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Category</th>
        <th>Brand</th>
        <th>Description</th>
        <th>Price</th>
        <th>Image</th>
        <th>Type</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $getPd = $pd->getAllProduct();
      if ($getPd) {
        $i = 0;
        while ($result = $getPd->fetch_assoc()) {
          $i++;

      ?>
      <tr class="odd gradeX">
        <td><?php echo $result['productId'];?></td>
        <td><?php echo $result['productName'] ;?></td>
        <td><?php echo $result['catName'] ;?></td>
        <td><?php echo $result['brandName'] ;?></td>
        <td><?php echo $fm->textShorten($result['body'],50) ;?></td>
        <td>TK.<?php echo $result['price'] ;?></td>
        <td><img src="<?php echo $result['image'] ;?>" height="50px"></td>
        <td>
          <?php 
          if ($result['type'] == 0) {
            echo "Featured";
          }else
          echo "General";

          ?>
            

          </td>
        <td><a href="productedit.php?proid=<?php echo $result['productId'];?>">Edit</a> || <a onclick="return confirm('Are you sure to delete!')" href="?delpro=<?php echo $result['productId'];?>">Delete</a></td>
      </tr>

      <?php } } ?>
      
    </tbody>
	</table>


</div>



<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>



          
<?php include 'inc/footer.php'; ?>