<?php
// start output buffering
ob_start();
?>

<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/Category.php';?>

<?php
if (!isset($_GET['catid']) || $_GET['catid'] == NULL) {
  echo "<script>window.location='category-list.php';</script>";
} else {
  $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['catid']);
}

$cat = new Category();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $catName = $_POST['catName'];
  $updateCat = $cat->catUpdate($catName, $id);
}
?>





<div
  id="user_info_content"
  class="admin-page-main-container2 column"
>
  <span class="admin-page-main-text">Edit Category</span>


  <?php
    if (isset($updateCat)) {
        echo $updateCat;
    }
  ?>

  <?php
    $getCat = $cat->getCatById($id);
    if ($getCat) {
        while ($result = $getCat->fetch_assoc()) {
  ?>

  <form action="" method="post">

    <div class="add_product_container">

      <div class="add_product_entry_container">
        <span class="add_product_entry_text">Category Name</span>
        <input type="text" name="catName" value="<?php echo $result['catName'];?>" class="add_product_textinput" />
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
        href="category-list.php"
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