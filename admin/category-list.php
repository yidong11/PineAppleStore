<!-- 
  This file is used to display the list of categories.
  The admin can view all the categories and can also edit or delete them.
  The admin can also add a new category by clicking on the Add Category button.
 -->

<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/Category.php';?>

<?php
$cat = new Category();

if (isset($_GET['delcat'])) {
  // Sanitize the input by removing any characters that are not alphanumeric or underscore
  $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delcat']);
  // Call the delcatById method of the Category class to delete the category by ID
  $delcat = $cat->delcatById($id);
}
?>

<div id="user_info_content" class="admin-page-main-container2 column">
  <span class="admin-page-main-text">Category List</span>

  <?php 
  if (isset($delcat)) {
    // Display the error or success message for deleting the category
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
      // Get all categories using the getAllCat method of the Category class
      $getCat = $cat->getAllCat();
      if ($getCat) {
        while ($result = $getCat->fetch_assoc()) {
          // for each category, display the category details in a table row
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

<!-- Include necessary script for datatable -->
<script type="text/javascript">
  $(document).ready(function () {
    setupLeftMenu();
    $('.datatable').dataTable();
    setSidebarHeight();
  });
</script>

<?php include 'inc/footer.php'; ?>