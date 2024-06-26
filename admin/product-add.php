<!-- 
  This file is used to add a new product to the database.
  The admin can add a new product by entering the product details and uploading an image.
  The product details include the product name, category, description, price, and stock.
  The product is then added to the database and displayed in the product list.
 -->

<?php
// start output buffering
ob_start();
?>

<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/Product.php';?>
<?php include '../classess/Category.php';?>


<?php
$pd = new Product();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
  // Call the productInsert method of the Product class to insert the product into the database
    $insertProduct = $pd->productInsert($_POST, $_FILES);
}
?>


<div
  id="user_info_content"
  class="admin-page-main-container2 column"
>
  <span class="admin-page-main-text">Add Product</span>

  <?php
    if (isset($insertProduct)) {
      // Display the product insertion error message
        echo $insertProduct;
    }
  ?>  

  <form action="" method="post" enctype="multipart/form-data">
    
    <div class="add_product_container">

      <div class="add_product_entry_container">
        <span class="add_product_entry_text">Name</span>
        <input type="text" name="productName" placeholder="Enter Product Name..." class="add_product_textinput" />
      </div>


      <div class="add_product_entry_container">
        <span class="add_product_entry_text">Category</span>
        <select name="catId" id="select" class="add_product_select_box">
          <option>Select Category</option>
          <?php
            // Retrieve all categories from the database as options in the select box
            $cat = new Category();
            $getCat = $cat->getAllCat();
            if ($getCat) {
                while ($result = $getCat->fetch_assoc()) {
          ?>
          <option 
            value="<?php echo $result['catId']; ?>">
            <?php echo $result['catName']; ?>
          </option>
          <?php
                }
            }
          ?>
        </select>
      </div>


      <div class="add_product_entry_container">
        <span class="add_product_entry_text">Description</span>
        <textarea type="text" name="body" placeholder="Enter the text description" class="add_product_description"></textarea>
      </div>

      
      <div class="add_product_entry_container">
        <span class="add_product_entry_text">Price</span>
        <input type="text" placeholder="Enter price" name="price" class="add_product_textinput" style="width: 200px;" />
      </div>


      <div class="add_product_entry_container">
        <span class="add_product_entry_text">Stock</span>
        <input type="text" placeholder="Enter stock" name="stock" class="add_product_textinput" style="width: 200px;" />
      </div>


      <div class="add_product_entry_container">
        <span class="add_product_entry_text">Upload Image</span>
        <input type="file" name="image" />
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
        class="button add_product_button"
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