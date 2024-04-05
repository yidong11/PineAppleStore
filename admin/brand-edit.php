<?php
// start output buffering
ob_start();
?>

<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/Brand.php';?>

<?php
if (!isset($_GET['brandid']) || $_GET['brandid'] == NULL) {
  echo "<script>window.location='brand-list.php';</script>";
} else {
  $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['brandid']);
}

$brand = new Brand();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $brandName = $_POST['brandName'];
  $updateBrand = $brand->brandUpdate($brandName, $id);
}
?>



<div
  id="user_info_content"
  class="admin-page-main-container2 column"
>
  <span class="admin-page-main-text">Edit Brand</span>


  <?php
    if (isset($updateBrand)) {
        echo $updateBrand;
    }
  ?>

  <?php
    $getBrand = $brand->getBrandById($id);
    if ($getBrand) {
        while ($result = $getBrand->fetch_assoc()) {
  ?>

  <form action="" method="post">

    <div class="add_product_container">

      <div class="add_product_entry_container">
        <span class="add_product_entry_text">Brand Name</span>
        <input type="text" name="brandName" value="<?php echo $result['brandName'];?>" class="add_product_textinput" />
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
        href="brand-list.php"
        class="add_product_button button"
      >
        Cancel
      </a>
    </div>

  </form>

  <?php } } ?>


</div>


<?php include 'inc/footer.php'; ?>

<?php
// get the content of the buffer and put it in your file
ob_end_flush();
?>