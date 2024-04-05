<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/Category.php';?>

<?php
$cat = new Category();

if (isset($_GET['delcat'])) {
	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delcat']);
	$delcat = $cat->delcatById($id);
}
?>






<div
  id="user_info_content"
  class="admin-page-main-container2 column"
>
  <span class="admin-page-main-text">Category List</span>


  <?php 
  if (isset($delcat)) {
    echo $delcat;
  }
  ?>


  <table class="data display datatable" id="example" style="width: 600px;">
    <thead>
      <tr>
        <th style="width: 20%;">Category ID</th>
        <th style="width: 62%;">Category Name</th>
        <th style="width: 18%;">Action</th>
      </tr>
    </thead>

    <tbody>
      <?php
      $getCat = $cat->getAllCat();
      if ($getCat) {
        $i = 0;
        while ($result = $getCat->fetch_assoc()) {
          $i++;
      ?>

      <tr class="odd gradeX">
        <td><?php echo $result['catId']; ?></td>
        <td><?php echo $result['catName']; ?></td>
        <td>
          <a href="category-edit.php?catid=<?php echo $result['catId']; ?>">Edit</a> ||
          <a onclick="return confirm('Are you sure to delete?')" href="?delcat=<?php echo $result['catId']; ?>">Delete</a>
        </td>
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