<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/Product.php';?>
<?php include '../classess/Category.php';?>
<?php include '../classess/Brand.php';?>


<?php
if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
  echo "<script>window.location='productlist.php';</script>";
} else {
  $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['proid']);
}

$pd = new Product();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
  $updateProduct = $pd->productUpdate($_POST,$_FILES,$id);
}
?>




<div
  id="user_info_content"
  class="admin-page-main-container2 column"
>
  <span class="admin-page-main-text">Edit Product</span>

  <?php
    if (isset($updateProduct)) {
        echo $updateProduct;
    }
  ?>  

  <?php
    $getPro = $pd->getProById($id);
    if ($getPro) {
        while ($value = $getPro->fetch_assoc()) {
  ?>

  <form action="" method="post" enctype="multipart/form-data">
    
    <div class="add_product_container">

      <div class="add_product_entry_container">
          <span class="add_product_entry_text">Name</span>
          <input type="text" name="productName" value="<?php echo $value['productName'];?>" class="add_product_textinput" />
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
          <option 
            <?php if ($value['catId'] == $result['catId']) { ?>
              selected="selected"
            <?php } ?>
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
        <span class="add_product_entry_text">Brand</span>
        <select name="brandId" id="select" class="add_product_select_box">
          <option>Select Brand</option>
          <?php
            $brand = new Brand();
            $getBrand = $brand->getAllBrand();
            if ($getBrand) {
                while ($result = $getBrand->fetch_assoc()) {
          ?>
          <option 
            <?php if ($value['brandId'] == $result['brandId']) { ?>
              selected="selected"
            <?php } ?>
            value="<?php echo $result['brandId']; ?>">
            <?php echo $result['brandName']; ?>
          </option>
          <?php
                }
            }
          ?>
        </select>
      </div>


      <div class="add_product_entry_container">
        <span class="add_product_entry_text">Description</span>
        <textarea type="text" name="body" class="add_product_description"><?php echo $value['body'];?></textarea>
      </div>


      <div class="add_product_entry_container">
        <span class="add_product_entry_text">Price</span>
        <input type="text" value="<?php echo $value['price'];?>" name="price" class="add_product_textinput" />
      </div>


      <div class="add_product_entry_container">
        <span class="add_product_entry_text">Upload Image</span>
        <img src="<?php echo $value['image'] ;?>" width="200px" > 
        <br/>
        <input type="file" name="image" />
      </div>


      <div class="add_product_entry_container">
        <span class="add_product_entry_text">Product Type</span>
        <select name="type" id="select" class="add_product_select_box">
          <option>Select Type</option>
          <?php
            if ($value['type'] == 0) {
          ?>
          <option selected="selected" value="0">Featured</option>
          <option value="1">General</option>
          <?php } else { ?>
          <option value="0">Featured</option>
          <option selected="selected" value="1">General</option>
          <?php } ?>  
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
        href="product-list.php" 
        class="button add_product_button"
      >
        Cancel
      </a>
    </div>

  </form>

<?php } 
} 
?>


</div>





          
<?php include 'inc/footer.php'; ?>