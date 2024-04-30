<!-- 
 * This file is responsible for adding a new category to the database.
 * It includes the necessary HTML and PHP code to handle the category addition process. 
 * The form collects the category name and calls the catInsert method of the Category class to insert the category into the database.
 * If the category is successfully added, a success message is displayed on the page.
 * If there is an error during the category addition process, an error message is displayed on the page.
-->

<?php
// start output buffering
ob_start();

include 'inc/header.php'; 
include 'inc/sidebar.php'; 
include '../classess/Category.php';

/**
 * Create a new instance of the Category class.
 */
$cat = new Category();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  /**
   * Get the category name from the POST data.
   */
  $catName = $_POST['catName'];

  /**
   * Insert the category into the database using the catInsert method of the Category class.
   */
  $insertCat = $cat->catInsert($catName);
}
?>

<div id="user_info_content" class="admin-page-main-container2 column">
  <span class="admin-page-main-text">Add Category</span>

  <?php
    if (isset($insertCat)) {
        echo $insertCat;
    }
  ?>

  <form action="" method="post">

    <div class="add_product_container">

      <div class="add_product_entry_container">
        <span class="add_product_entry_text">Category Name</span>
        <input type="text" name="catName" placeholder="Enter Category Name..." class="add_product_textinput" />
      </div>

    </div>

    <div class="add_product_button_container">
      <button type="submit" name="submit" class="add_product_button button">Save</button>
      <a href="dashboard.php" class="add_product_button button">Cancel</a>
    </div>

  </form>

</div>

<?php 
include 'inc/footer.php'; 
// get the content of the buffer and put it in your file
ob_end_flush();
?>