<!-- 
  This page is for admin to list all the users in the database.
  The admin can view the user details and delete the user.
  The users are displayed in a tabular format using a datatable.
 -->

<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/Customer.php';?>
<?php include_once '../helpers/Formate.php';?>

<?php
$cmr = new Customer();
$fm = new Format();
?>


<?php
if (isset($_GET['delcmr'])) {
  // Sanitize the input by removing any characters that are not alphanumeric or underscore
  $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delcmr']);
  $delcmr = $cmr->delCustomerById($id);
}
?>


<div id="user_info_content" class="admin-page-main-container2 column">
  <span class="admin-page-main-text">User List</span>


  <?php
  if (isset($delcmr)) {
    // Display the error or success message
    echo $delcmr;
  }
  ?>


  <table class="data display datatable" id="example" style="width: 1300px;">

    <thead>
      <tr>
        <th>User ID</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>City</th>
        <th>Country</th>
        <th>Zip</th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>

      <?php
      $getCmr = $cmr->getAllCustomer();
      if ($getCmr) {
        while ($result = $getCmr->fetch_assoc()) {
          // for each user, display the user details in a table row
      ?>
      <tr class="odd gradeX">
        <td><?php echo $result['id'];?></td>
        <td><?php echo $result['name'] ;?></td>
        <td><?php echo $result['email'] ;?></td>
        <td><?php echo $result['phone'] ;?></td>
        <td><?php echo $result['address'] ;?></td>
        <td><?php echo $result['city'] ;?></td>
        <td><?php echo $result['country'] ;?></td>
        <td><?php echo $result['zip'] ;?></td>
        <td>
          <a href="user-detail.php?cmrid=<?php echo $result['id'];?>">Details</a> ||
          <a onclick="return confirm('Are you sure to delete?')" href="?delcmr=<?php echo $result['id'];?>">Delete</a>
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