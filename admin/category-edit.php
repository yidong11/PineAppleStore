<!-- 
 * This file is responsible for editing a category in the database.
 * It includes the necessary files, retrieves the category ID from the URL,
 * updates the category information if a POST request is made, and displays
 * the form to edit the category. 
-->

<?php
// start output buffering
ob_start();

// Include necessary files
include 'inc/header.php';
include 'inc/sidebar.php';
include '../classess/Category.php';

// Retrieve the category ID from the URL
if (!isset($_GET['catid']) || $_GET['catid'] == NULL) {
  echo "<script>window.location='category-list.php';</script>";
} else {
  // Sanitize the category ID
  $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['catid']);
}

$cat = new Category();

// Update the category information if a POST request is made
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $catName = $_POST['catName'];
  $updateCat = $cat->catUpdate($catName, $id);
}

?>

<div id="user_info_content" class="admin-page-main-container2 column">
  <span class="admin-page-main-text">Edit Category</span>

  <?php
  if (isset($updateCat)) {
    echo $updateCat;
  }
  ?>

  <?php
  // Retrieve the category information by ID
  $getCat = $cat->getCatById($id);
  if ($getCat) {
    while ($result = $getCat->fetch_assoc()) {
      // Display the form to edit that category
  ?>

      <form action="" method="post">

        <div class="add_product_container">

          <div class="add_product_entry_container">
            <span class="add_product_entry_text">Category Name</span>
            <input type="text" name="catName" value="<?php echo $result['catName']; ?>" class="add_product_textinput" />
          </div>

        </div>

        <div class="add_product_button_container">
          <button type="submit" name="submit" class="add_product_button button">
            Save
          </button>

          <a href="category-list.php" class="add_product_button button">
            Cancel
          </a>
        </div>

      </form>

  <?php }
  } ?>

</div>

<?php include 'inc/footer.php'; ?>

<?php
// get the content of the buffer and put it in your file
ob_end_flush();
?>