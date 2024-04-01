<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/Product.php';?>
<?php include '../classess/Category.php';?>
<?php include '../classess/Brand.php';?>


<?php
$pd = new Product();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $insertProduct = $pd->productInsert($_POST,$_FILES);
}
?>


<div
  id="user_info_content"
  class="admin-page-main-container2 column"
>
  <span class="admin-page-main-text">Add Product</span>

  <?php
    if (isset($insertProduct)) {
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
            $cat = new Category();
            $getCat = $cat->getAllCat();
            if ($getCat) {
                while ($result = $getCat->fetch_assoc()) {
          ?>
          <option value="<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></option>
          <?php
                }
            }
          ?>
        </select>
      </div>

      <div class="add_product_entry_container">
        <span class="add_product_entry_text">Brand</span>
        <select name="brandId" id="select" class="add_product_select_box">
          <option>Select Brand</option>
          <?php
            $brand = new Brand();
            $getBrand = $brand->getAllBrand();
            if ($getBrand) {
                while ($result = $getBrand->fetch_assoc()) {
          ?>
          <option value="<?php echo $result['brandId']; ?>"><?php echo $result['brandName']; ?></option>
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
        <input type="text" placeholder="Enter price" name="price" class="add_product_textinput" />
      </div>

      <div class="add_product_entry_container">
        <span class="add_product_entry_text">Upload Image</span>
        <input type="file" name="image" />
      </div>

      <div class="add_product_entry_container">
        <span class="add_product_entry_text">Product Type</span>
        <select name="type" id="select" class="add_product_select_box">
          <option>Select Type</option>
          <option value="0">Featured</option>
          <option value="1">General</option>
        </select>
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