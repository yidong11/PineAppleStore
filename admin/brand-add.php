<?php
// start output buffering
ob_start();
?>

<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/Brand.php';?>

<?php
$brand = new Brand();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $brandName = $_POST['brandName'];
  $insertBrand = $brand->brandInsert($brandName);
}
?>



<div
  id="user_info_content"
  class="admin-page-main-container2 column"
>
  <span class="admin-page-main-text">Add Brand</span>


  <?php
    if (isset($insertBrand)) {
        echo $insertBrand;
    }
  ?>

  <form action="" method="post">

    <div class="add_product_container">

      <div class="add_product_entry_container">
        <span class="add_product_entry_text">Brand Name</span>
        <input type="text" name="brandName" placeholder="Enter Brand Name..." class="add_product_textinput" />
      </div>

    </div>

    <div class="add_product_button_container">
      <button
        type="submit"
        name="submit"
        class="add_product_button button"
      >
        Save
      </button>

      <a
        href="dashboard.php"
        class="add_product_button button"
      >
        Cancel
      </a>
    </div>

  </form>



</div>



<?php include 'inc/footer.php'; ?>

<?php
// get the content of the buffer and put it in your file
ob_end_flush();
?>