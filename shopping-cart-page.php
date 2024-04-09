<?php include 'inc/header.php';?>

<script>
function submitForm(formid) {
  document.getElementById(formid).submit();
}
</script>

<?php 
if (isset($_GET['delpro'])) {
	$delId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delpro']);
	$delProduct = $ct->delProductByCart($delId);
}
?>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cartId = $_POST['cartId'];
    $quantity = $_POST['quantity'];
    $updateCart = $ct->updateCartQuantity($cartId,$quantity);

    if ($quantity <=0) {
    	$delProduct = $ct->delProductByCart($cartId);
    }
}
?>

<?php  
if (!isset($_GET['id'])) {
	echo "<meta http-equiv = 'refresh' content ='0;URL=?id=Mamba' />";
}
?>

  <div>
    <link href="./shopping-cart-page.css" rel="stylesheet" />
    <div class="shopping-cart-page-container">
      <div class="shopping-cart-page-container1">
        
        <div class="shopping-cart-page-shoppingtitle">
          <div class="shopping-cart-page-lefttext"><span class="shopping-cart-page-text4">Shopping Cart</span></div>
          <div class="shopping-cart-page-righttext"><span class="shopping-cart-page-text5">Price</span></div>
        </div>
        <div class="shopping-cart-page-scrollablelist scrollable-list">
          <ul class="shopping-cart-page-list list">



            <!-- cart php list here -->

            <?php 
			    	if (isset($updateCart)) {
			    		echo $updateCart;
			    	}

			    	if (isset($delProduct)) {
			    		echo $delProduct;
			    	}
			    	?>

            <?php 

            $getPro = $ct->getCartProduct();
            if ($getPro) {
              $i = 0;
              $sum = 0;
              $qty = 0;
              while ($result = $getPro->fetch_assoc()) {
              
              $i++;

            ?>            



            <li class="shopping-cart-page-list-item list-item">
              <div class="shopping-cart-item-container">
                <div class="shopping-cart-item-container1">
                  <div class="shopping-cart-item-container2"><img src="admin/<?php echo $result['image']; ?>" alt="image" style="max-width: 200px; max-height: 200px;"/></div>
                  <div class="shopping-cart-item-container3">
                    <div class="shopping-cart-item-container4"><span class="shopping-cart-item-text"><span><?php echo $result['productName']; ?></span></span></div>
                    <div class="shopping-cart-item-container5">
                    <?php
                    $n = round($result['rate']);
                    for ($j = 0; $j < $n; $j++) {
                    ?>
                    
                      <svg viewBox="0 0 950.8571428571428 1024" class="shopping-cart-item-icon">
                        <path
                          d="M950.857 369.714c0 10.286-7.429 20-14.857 27.429l-207.429 202.286 49.143 285.714c0.571 4 0.571 7.429 0.571 11.429 0 14.857-6.857 28.571-23.429 28.571-8 0-16-2.857-22.857-6.857l-256.571-134.857-256.571 134.857c-7.429 4-14.857 6.857-22.857 6.857-16.571 0-24-13.714-24-28.571 0-4 0.571-7.429 1.143-11.429l49.143-285.714-208-202.286c-6.857-7.429-14.286-17.143-14.286-27.429 0-17.143 17.714-24 32-26.286l286.857-41.714 128.571-260c5.143-10.857 14.857-23.429 28-23.429s22.857 12.571 28 23.429l128.571 260 286.857 41.714c13.714 2.286 32 9.143 32 26.286z">
                        </path>
                      </svg>
                    <?php 
                      } 
                    ?>
                    <?php
                    $n = round($result['rate']);
                    for ($j = 0; $j < (5 - $n); $j++) {
                    ?>
                      <svg viewBox="0 0 950.8571428571428 1024" class="shopping-cart-item-icon08">
                        <path
                          d="M649.714 573.714l174.857-169.714-241.143-35.429-108-218.286-108 218.286-241.143 35.429 174.857 169.714-41.714 240.571 216-113.714 215.429 113.714zM950.857 369.714c0 10.286-7.429 20-14.857 27.429l-207.429 202.286 49.143 285.714c0.571 4 0.571 7.429 0.571 11.429 0 15.429-6.857 28.571-23.429 28.571-8 0-16-2.857-22.857-6.857l-256.571-134.857-256.571 134.857c-7.429 4-14.857 6.857-22.857 6.857-16.571 0-24-13.714-24-28.571 0-4 0.571-7.429 1.143-11.429l49.143-285.714-208-202.286c-6.857-7.429-14.286-17.143-14.286-27.429 0-17.143 17.714-24 32-26.286l286.857-41.714 128.571-260c5.143-10.857 14.857-23.429 28-23.429s22.857 12.571 28 23.429l128.571 260 286.857 41.714c13.714 2.286 32 9.143 32 26.286z">
                        </path>
                      </svg>
                    <?php 
                      } 
                    ?>  
                  
                    </div>
                    <div class="shopping-cart-item-container6">
                      <div class="shopping-cart-item-container7"><span
                          class="shopping-cart-item-text1"><span>Quantity</span></span>
                        <form id="myForm<?php echo $i;?>" class="shopping-cart-item-form" action="" method="post">
                          <input type="hidden" name="cartId" value="<?php echo $result['cartId']; ?>"/>
                          
                          <select 
                            autocomplete="off"
                            class="shopping-cart-item-select"
                            name="quantity"
                            onchange="submitForm('myForm<?php echo $i;?>')"
                          >
                            <option value="1" <?php echo $result['quantity'] == 1 ? 'selected' : ''; ?>>1</option>
                            <option value="2" <?php echo $result['quantity'] == 2 ? 'selected' : ''; ?>>2</option>
                            <option value="3" <?php echo $result['quantity'] == 3 ? 'selected' : ''; ?>>3</option>
                            <option value="4" <?php echo $result['quantity'] == 4 ? 'selected' : ''; ?>>4</option>
                            <option value="5" <?php echo $result['quantity'] == 5 ? 'selected' : ''; ?>>5</option>
                            <option value="6" <?php echo $result['quantity'] == 6 ? 'selected' : ''; ?>>6</option>
                            <option value="7" <?php echo $result['quantity'] == 7 ? 'selected' : ''; ?>>7</option>
                            <option value="8" <?php echo $result['quantity'] == 8 ? 'selected' : ''; ?>>8</option>
                            <option value="9" <?php echo $result['quantity'] == 9 ? 'selected' : ''; ?>>9</option>
                            <option value="10" <?php echo $result['quantity'] == 10 ? 'selected' : ''; ?>>10</option>
                            
                          </select>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="shopping-cart-item-container8">
                  <span class="shopping-cart-item-text2">
                    <span>HKD <?php
                                $total = $result['price'] * $result['quantity'];
                                echo $total;
						                  ?>
                    </span>
                  </span>
                    <a onclick="return confirm('Are You Sure to Delete?')" href="?delpro=<?php echo $result['cartId']; ?>">
                      <button type="button" class="shopping-cart-item-button button">
                        <span class="shopping-cart-item-text3"><span>Delete</span><br /></span>
                      </button>
                    </a>
                </div>
              </div>
            </li>
            <?php 
							$qty = $qty + $result['quantity'];
							$sum = $sum + $total;
							Session::set("qty",$qty);
							Session::set("sum",$sum);
						?>
            <?php } } ?>
          </ul>
        </div>
        <?php
						$getData = $ct->checkCartTable();
            if ($getData) {
        ?>
        <div class="shopping-cart-page-container4">
          <div class="shopping-cart-page-container5"><span class="shopping-cart-page-text6">Subtotal (<?php echo $qty; ?> items): HKD
          <?php echo $sum; ?>&nbsp;</span><a href="payment.php" class="shopping-cart-page-navlink4 button">Proceed to
              Checkout</a></div>
        </div>

        <?php }else{ ?>
          <span style="font-size: 40px;">
            Cart is Empty. Feel free to shop now
          </span>
        <?php } ?>
      </div>
    </div>
  </div>
  <script defer="" src="https://unpkg.com/@teleporthq/teleport-custom-scripts"></script>

  <?php include 'inc/footer_clean.php';?>