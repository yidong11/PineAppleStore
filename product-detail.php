<?php include 'inc/header.php'; ?>

<?php
if (isset($_GET['proid'])) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['proid']);
}



if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $quantity = $_POST['quantity'];
    if ($quantity > 0) {
    $addCart = $ct->addToCart($quantity,$id);
    }
}
?>



<body>
  <div><link href="./product-detail.css" rel="stylesheet" />


      <?php 
      $getPd = $pd->getSingleProduct($id);
      if ($getPd) {
        while ($result = $getPd->fetch_assoc()) {
			?>	






      <div
        class="product-detail-container"
        >
        <div class="product-detail-container01">


          <div class="product-detail-container02">
            <div
              data-thq="slider"
              data-navigation="true"
              data-pagination="true"
              class="product-detail-slider swiper"
            >
              <div data-thq="slider-wrapper" class="swiper-wrapper">
                
                <img alt="image23271449" src="admin/<?php echo $result['image']; ?>" class="product-detail-slider-slide swiper-slide" />

                <img alt="image23271449" src="admin/<?php echo $result['image']; ?>" class="product-detail-slider-slide1 swiper-slide" />
              
                <img alt="image23271449" src="admin/<?php echo $result['image']; ?>" class="product-detail-slider-slide2 swiper-slide" />
              </div>
              <div
                data-thq="slider-pagination"
                class="product-detail-slider-pagination swiper-pagination swiper-pagination-bullets swiper-pagination-horizontal"
              >
                <div
                  data-thq="slider-pagination-bullet"
                  class="swiper-pagination-bullet swiper-pagination-bullet-active"
                ></div>
                <div
                  data-thq="slider-pagination-bullet"
                  class="swiper-pagination-bullet"
                ></div>
                <div
                  data-thq="slider-pagination-bullet"
                  class="swiper-pagination-bullet"
                ></div>
              </div>
              <div
                data-thq="slider-button-prev"
                class="swiper-button-prev"
              ></div>
              <div
                data-thq="slider-button-next"
                class="swiper-button-next"
              ></div>
            </div>
          </div>



          <div class="product-detail-container03">


            <span class="product-detail-text">
            <?php echo $result['productName'];?>
            </span>


            <div class="product-detail-container04">
              <span class="product-detail-text01">Ratings:</span>

              <div class="product-detail-container05">
                <?php
                $n = round($result['rate']);
                for ($i = 0; $i < $n; $i++) { ?>
                  <svg
                    viewBox="0 0 950.8571428571428 1024"
                    class="product-detail-icon"
                  >
                  <path
                  d="M950.857 369.714c0 10.286-7.429 20-14.857 27.429l-207.429 202.286 49.143 285.714c0.571 4 0.571 7.429 0.571 11.429 0 14.857-6.857 28.571-23.429 28.571-8 0-16-2.857-22.857-6.857l-256.571-134.857-256.571 134.857c-7.429 4-14.857 6.857-22.857 6.857-16.571 0-24-13.714-24-28.571 0-4 0.571-7.429 1.143-11.429l49.143-285.714-208-202.286c-6.857-7.429-14.286-17.143-14.286-27.429 0-17.143 17.714-24 32-26.286l286.857-41.714 128.571-260c5.143-10.857 14.857-23.429 28-23.429s22.857 12.571 28 23.429l128.571 260 286.857 41.714c13.714 2.286 32 9.143 32 26.286z"
                  ></path>
                  </svg>
                <?php } ?>

                <?php
                $n = round($result['rate']);
                for ($i = 0; $i < (5 - $n); $i++) { ?>  
                  <svg
                    viewBox="0 0 950.8571428571428 1024"
                    class="product-detail-icon02"
                  >
                    <path
                      d="M649.714 573.714l174.857-169.714-241.143-35.429-108-218.286-108 218.286-241.143 35.429 174.857 169.714-41.714 240.571 216-113.714 215.429 113.714zM950.857 369.714c0 10.286-7.429 20-14.857 27.429l-207.429 202.286 49.143 285.714c0.571 4 0.571 7.429 0.571 11.429 0 15.429-6.857 28.571-23.429 28.571-8 0-16-2.857-22.857-6.857l-256.571-134.857-256.571 134.857c-7.429 4-14.857 6.857-22.857 6.857-16.571 0-24-13.714-24-28.571 0-4 0.571-7.429 1.143-11.429l49.143-285.714-208-202.286c-6.857-7.429-14.286-17.143-14.286-27.429 0-17.143 17.714-24 32-26.286l286.857-41.714 128.571-260c5.143-10.857 14.857-23.429 28-23.429s22.857 12.571 28 23.429l128.571 260 286.857 41.714c13.714 2.286 32 9.143 32 26.286z"
                    ></path>
                  </svg>
                <?php } ?>
                      
                <span>(<?php echo round($result['rate'], 1); ?>)</span>

              </div>


            </div> 





            <?php 
            $getPro = $ct->getCartProduct();
            if ($getPro) {
              $i = 0;
              $sum = 0;
              $qty = 0;
              while ($result1 = $getPro->fetch_assoc()) {
              
              $i++;

            ?>     
            <div class="product-detail-container07">
              <span class="product-detail-text04">Quantity:</span>
              <form id="myForm" class="product-detail-text04" action="" method="post">
                          <input type="hidden" name="cartId" value="<?php echo $result['cartId']; ?>"/>
              <select 
                            autocomplete="off"
                            class="product-detail-select1"
                            name="quantity"
                            onchange="submitForm()"
                          >
                            <option value="1" <?php echo $result1['quantity'] == 1 ? 'selected' : ''; ?>>1</option>
                            <option value="2" <?php echo $result1['quantity'] == 2 ? 'selected' : ''; ?>>2</option>
                            <option value="3" <?php echo $result1['quantity'] == 3 ? 'selected' : ''; ?>>3</option>
                            <option value="4" <?php echo $result1['quantity'] == 4 ? 'selected' : ''; ?>>4</option>
                            <option value="5" <?php echo $result1['quantity'] == 5 ? 'selected' : ''; ?>>5</option>
                            <option value="6" <?php echo $result1['quantity'] == 6 ? 'selected' : ''; ?>>6</option>
                            <option value="7" <?php echo $result1['quantity'] == 7 ? 'selected' : ''; ?>>7</option>
                            <option value="8" <?php echo $result1['quantity'] == 8 ? 'selected' : ''; ?>>8</option>
                            <option value="9" <?php echo $result1['quantity'] == 9 ? 'selected' : ''; ?>>9</option>
                            <option value="10" <?php echo $result1['quantity'] == 10 ? 'selected' : ''; ?>>10</option>
                            
                          </select>
     
              <form>
            </div>
            <h1><p>Price: <span>HKD <?php
                                $total = $result1['price'] * $result1['quantity'];
                                echo $total;
						                  ?></span></p></h1>
            <?php 

            if (isset($addCart)) {
              echo $addCart;
            }
            ?>

            <?php 

            if (isset($insertCom)) {
              echo $insertCom;
            }


            if (isset($saveWlist)) {
              echo $saveWlist;
            }
            ?>
            <div class="product-detail-container08">
            <form action="" method="post">
              <a href="shopping-cart-page.php" class="product-detail-navlink button">
                <span>
                  <span>BUY NOW!</span>
                  <br />
                </span>
              </a>
              <form>
              <form action="" method="post">
              <a
                href="shopping-cart-page.php"
                class="product-detail-navlink1 button"
              >
                <span>
                  <span>ADD TO CHART</span>
                  <br />
                </span>
              </a>
              <form>
            </div>
            <?php 
							$qty = $qty + $result1['quantity'];
							$sum = $sum + $total;
							Session::set("qty",$qty);
							Session::set("sum",$sum);
						?>
            <?php } } ?>
          </div>

        </div>



        <div class="product-detail-container09">
        
          <span class="product-detail-text12">Related Products</span>

          <div class="product-detail-container10">
          <?php
        $getTpd = $pd->getTrendingProduct();
        if ($getTpd) {
          while ($result = $getTpd->fetch_assoc()) {
        ?>
            <a href="product-detail.php" class="product-detail-navlink2">
              <div class="product-detail-container11">
              <img alt="image" src="admin/<?php echo $result['image']; ?>" class="product-detail-image" />
                <span><?php echo $result['productName']; ?></span>
              </div>
            </a>
            <?php 
        }
        } ?>
          </div>
          <img
            alt="image"
            src="public/Pineapple Icons/pro1._cb585551876_-1500w.jpg"
            class="product-detail-image4"
          />
        </div>
      </div>
    </div>



    <script
      defer=""
      src="https://unpkg.com/@teleporthq/teleport-custom-scripts"
    >
    </script>

  </body>
</html>

<?php include 'inc/footer.php'; ?>   