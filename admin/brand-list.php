<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/Brand.php';?>

<?php
$brand = new Brand();

if (isset($_GET['delbrand'])) {
  $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delbrand']);
  $delbrand = $brand->delbrandById($id);
}
?>




<div
  id="user_info_content"
  class="admin-page-main-container2 column"
>
  <span class="admin-page-main-text">Brand List</span>


  <?php
  if (isset($delbrand)) {
    echo $delbrand;
  }
  ?>


  <table class="data display datatable" id="example", style="width: 600px;">
    <thead>
      <tr>
        <th style="width: 20%;">Brand ID</th>
        <th style="width: 62%;">Brand Name</th>
        <th style="width: 18%;">Action</th>
      </tr>
    </thead>
    
    <tbody>
      <?php
      $getBrand = $brand->getAllBrand();
      if ($getBrand) {
        $i = 0;
        while ($result = $getBrand->fetch_assoc()) {
          $i++;
      ?>

      <tr class="odd gradeX">
        <td><?php echo $result['brandId']; ?></td>
        <td><?php echo $result['brandName']; ?></td>
        <td>
          <a href="brand-edit.php?brandid=<?php echo $result['brandId']; ?>">Edit</a> ||
          <a onclick="return confirm('Are you sure to delete?')" href="?delbrand=<?php echo $result['brandId']; ?>">Delete</a>
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
