<?php include 'inc/header.php'; ?>


<div class="homepage-main">
  <div data-thq="slider" data-navigation="true" data-pagination="true" class="homepage-slider swiper">
    <!-- slides below -->
    <div data-thq="slider-wrapper" class="swiper-wrapper">
      <?php
			$getFpd = $pd->getSliderProduct();
      $counter = 1;
			if ($getFpd) {
				while ($result = $getFpd->fetch_assoc()) {
      ?>

      <?php
      if($counter == 1){
      ?>
      <div data-thq="slider-slide" class="homepage-slider-slide swiper-slide">
        <div class="homepage-hero">
          <div class="homepage-container03">
            <h1 class="homepage-text05"><?php echo $result['productName']; ?></h1>
            <div class="homepage-container04">
              <span class="homepage-text06">FROM</span>
              <span class="homepage-text07">HKD<?php echo $result['price']; ?></span>
            </div>
            <div class="homepage-btn-group">
            <a href="product-detail.php?proid=<?php echo $result['productId']; ?>">
                <button class="button">Explore the collection</button>
            </a>
            </div>
          </div>
          <img alt="image23271449" src="admin/<?php echo $result['image']; ?>" class="homepage-image" />
        </div>
      </div>

      <?php
      }elseif($counter == 2){
      ?>
      <div data-thq="slider-slide" class="homepage-slider-slide1 swiper-slide">
        <div class="homepage-hero1">
          <div class="homepage-container05">
            <h1 class="homepage-text08"><?php echo $result['productName']; ?></h1>
            <div class="homepage-container06">
              <span class="homepage-text09">FROM</span>
              <span class="homepage-text10">HKD<?php echo $result['price']; ?></span>
            </div>
            <div class="homepage-btn-group1">
            <a href="product-detail.php?proid=<?php echo $result['productId']; ?>">
                <button class="button">Explore the collection</button>
            </a>
            </div>
          </div>
          <img alt="image23271449" src="admin/<?php echo $result['image']; ?>" class="homepage-image1" />
        </div>
      </div>

      <?php
      }elseif($counter == 3){
      ?>
      <div data-thq="slider-slide" class="homepage-slider-slide2 swiper-slide">
        <div class="homepage-hero2">
          <div class="homepage-container07">
            <h1 class="homepage-text11"><?php echo $result['productName']; ?></h1>
            <div class="homepage-container08">
              <span class="homepage-text12">FROM</span>
              <span class="homepage-text13">HKD<?php echo $result['price']; ?></span>
            </div>
            <div class="homepage-btn-group2">
            <a href="product-detail.php?proid=<?php echo $result['productId']; ?>">
                <button class="button">Explore the collection</button>
            </a>
            </div>
          </div>
          <img alt="image23271449" src="admin/<?php echo $result['image']; ?>" class="homepage-image2" />
        </div>
      </div>

      <?php
      }elseif($counter == 4){
      ?>
      <div data-thq="slider-slide" class="homepage-slider-slide3 swiper-slide">
        <div class="homepage-hero3">
          <div class="homepage-container09">
            <h1 class="homepage-text14"><?php echo $result['productName']; ?></h1>
            <div class="homepage-container10">
              <span class="homepage-text15">FROM</span>
              <span class="homepage-text16">HKD<?php echo $result['price']; ?></span>
            </div>
            <div class="homepage-btn-group3">
            <a href="product-detail.php?proid=<?php echo $result['productId']; ?>">
                <button class="button">Explore the collection</button>
            </a>
            </div>
          </div>
          <img alt="image23271449" src="admin/<?php echo $result['image']; ?>" class="homepage-image3" />
        </div>
      </div>

      <?php
      }elseif($counter == 5){
      ?>
      <div data-thq="slider-slide" class="homepage-slider-slide4 swiper-slide">
        <div class="homepage-hero4">
          <div class="homepage-container11">
            <h1 class="homepage-text17"><?php echo $result['productName']; ?></h1>
            <div class="homepage-container12">
              <span class="homepage-text18">FROM</span>
              <span class="homepage-text19">HKD<?php echo $result['price']; ?></span>
            </div>
            <div class="homepage-btn-group4">
            <a href="product-detail.php?proid=<?php echo $result['productId']; ?>">
                <button class="button">Explore the collection</button>
            </a>
            </div>
          </div>
          <img alt="image23271449" src="admin/<?php echo $result['image']; ?>" class="homepage-image4" />
        </div>
      </div>

      <?php 
      }
      $counter++;}
			} ?>

    </div>
    
    <!-- slider points -->
    <div data-thq="slider-pagination" class="homepage-slider-pagination swiper-pagination swiper-pagination-bullets swiper-pagination-horizontal">
      <div data-thq="slider-pagination-bullet" class="swiper-pagination-bullet"></div>
      <div data-thq="slider-pagination-bullet" class="swiper-pagination-bullet"></div>
      <div data-thq="slider-pagination-bullet" class="swiper-pagination-bullet"></div>
      <div data-thq="slider-pagination-bullet" class="swiper-pagination-bullet"></div>
      <div data-thq="slider-pagination-bullet" class="swiper-pagination-bullet"></div>
    </div>
    <div data-thq="slider-button-prev" class="swiper-button-prev"></div>
    <div data-thq="slider-button-next" class="swiper-button-next"></div>
  </div>

  <!-- Trending items -->
  <div class="homepage-trending-items section-container">
    <div class="max-width-container">
      <div class="section-heading-section-heading">
        <h1 class="section-heading-text Heading-2">
          <span>TRENDING ITEMS</span>
        </h1>
        <span class="section-heading-text1">
          <span>
            Explore our monthly most trending products, new items and
            the best PineApple offers you can buy
          </span>
        </span>
      </div>
      <div class="homepage-gallery">
        <?php
        $getTpd = $pd->getTrendingProduct();
        $counter1 = 1;
        if ($getTpd) {
          while ($result = $getTpd->fetch_assoc()) {

        ?>

        <?php
          if($counter1 == 1){
        ?>
        <div class="homepage-left">
          <div class="item-card-gallery-card item-card-root-class-name4">
            <img alt="image" src="admin/<?php echo $result['image']; ?>" class="item-card-image" />
            <div class="item-card-container">
              <h3 class="item-card-text">
                <span>
                <a href="product-detail.php?proid=<?php echo $result['productId']; ?>">
                  <?php echo $result['productName']; ?>
                </a>
                </span>
              </h3>
              <div class="item-card-container1">
                <svg viewBox="0 0 1024 1024" class="item-card-icon">
                  <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                </svg><svg viewBox="0 0 1024 1024" class="item-card-icon02">
                  <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                </svg><svg viewBox="0 0 1024 1024" class="item-card-icon04">
                  <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                </svg><svg viewBox="0 0 1024 1024" class="item-card-icon06">
                  <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                </svg><svg viewBox="0 0 1024 1024" class="item-card-icon08">
                  <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                </svg>
              </div>
              <div class="item-card-container2">
                <span class="item-card-currency"><span>HKD</span></span>
                <span class="item-card-value"><span><?php echo $result['price']; ?></span></span></span></span>
              </div>
            </div>
          </div>
        </div>

        <?php
        }elseif($counter1 == 2){
        ?>
        <div class="homepage-right">
          <div class="homepage-top">
            <div class="homepage-left1">
              <div class="item-card-gallery-card item-card-root-class-name2">
                <img alt="image" src="admin/<?php echo $result['image']; ?>" class="item-card-image" />
                <div class="item-card-container">
                  <h3 class="item-card-text">
                  <span>
                  <a href="product-detail.php?proid=<?php echo $result['productId']; ?>">
                    <?php echo $result['productName']; ?>
                  </a>
                  </span>
                  </h3>
                  <div class="item-card-container1">
                    <svg viewBox="0 0 1024 1024" class="item-card-icon">
                      <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                    </svg><svg viewBox="0 0 1024 1024" class="item-card-icon02">
                      <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                    </svg><svg viewBox="0 0 1024 1024" class="item-card-icon04">
                      <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                    </svg><svg viewBox="0 0 1024 1024" class="item-card-icon06">
                      <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                    </svg><svg viewBox="0 0 1024 1024" class="item-card-icon08">
                      <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                    </svg>
                  </div>
                  <div class="item-card-container2">
                    <span class="item-card-currency">
                      <span>HKD</span>
                    </span>
                    <span class="item-card-value">
                      <span><?php echo $result['price']; ?></span>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <?php
            }elseif($counter1 == 3){
            ?>
            <div class="homepage-right1">
              <div class="item-card-gallery-card item-card-root-class-name3">
                <img alt="image" src="admin/<?php echo $result['image']; ?>" class="item-card-image" />
                <div class="item-card-container">
                  <h3 class="item-card-text">
                  <span>
                  <a href="product-detail.php?proid=<?php echo $result['productId']; ?>">
                    <?php echo $result['productName']; ?>
                  </a>
                  </span>
                  </h3>
                  <div class="item-card-container1">
                    <svg viewBox="0 0 1024 1024" class="item-card-icon">
                      <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                    </svg><svg viewBox="0 0 1024 1024" class="item-card-icon02">
                      <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                    </svg><svg viewBox="0 0 1024 1024" class="item-card-icon04">
                      <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                    </svg><svg viewBox="0 0 1024 1024" class="item-card-icon06">
                      <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                    </svg><svg viewBox="0 0 1024 1024" class="item-card-icon08">
                      <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                    </svg>
                  </div>
                  <div class="item-card-container2">
                    <span class="item-card-currency">
                      <span>HKD</span>
                    </span>
                    <span class="item-card-value">
                      <span><?php echo $result['price']; ?></span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="homepage-bottom">
            <?php
            }elseif($counter1 == 4){
            ?>
            <div class="homepage-left2">
              <div class="item-card-gallery-card item-card-root-class-name1">
                <img alt="image" src="admin/<?php echo $result['image']; ?>" class="item-card-image" />
                <div class="item-card-container">
                  <h3 class="item-card-text">
                  <span>
                  <a href="product-detail.php?proid=<?php echo $result['productId']; ?>">
                    <?php echo $result['productName']; ?>
                  </a>
                  </span>
                  </h3>
                  <div class="item-card-container1">
                    <svg viewBox="0 0 1024 1024" class="item-card-icon">
                      <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                    </svg><svg viewBox="0 0 1024 1024" class="item-card-icon02">
                      <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                    </svg><svg viewBox="0 0 1024 1024" class="item-card-icon04">
                      <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                    </svg><svg viewBox="0 0 1024 1024" class="item-card-icon06">
                      <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                    </svg><svg viewBox="0 0 1024 1024" class="item-card-icon08">
                      <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                    </svg>
                  </div>
                  <div class="item-card-container2">
                    <span class="item-card-currency">
                      <span>HKD</span>
                    </span>
                    <span class="item-card-value">
                      <span><?php echo $result['price']; ?></span>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <?php
            }elseif($counter1 == 5){
            ?>
            <div class="homepage-right2">
              <div class="item-card-gallery-card item-card-root-class-name6">
                <img alt="image" src="admin/<?php echo $result['image']; ?>" class="item-card-image" />
                <div class="item-card-container">
                  <h3 class="item-card-text">
                  <span>
                  <a href="product-detail.php?proid=<?php echo $result['productId']; ?>">
                    <?php echo $result['productName']; ?>
                  </a>
                  </span>
                  </h3>
                  <div class="item-card-container1">
                    <svg viewBox="0 0 1024 1024" class="item-card-icon">
                      <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                    </svg><svg viewBox="0 0 1024 1024" class="item-card-icon02">
                      <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                    </svg><svg viewBox="0 0 1024 1024" class="item-card-icon04">
                      <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                    </svg><svg viewBox="0 0 1024 1024" class="item-card-icon06">
                      <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                    </svg><svg viewBox="0 0 1024 1024" class="item-card-icon08">
                      <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                    </svg>
                  </div>
                  <div class="item-card-container2">
                    <span class="item-card-currency">
                      <span>HKD</span>
                    </span>
                    <span class="item-card-value">
                      <span><?php echo $result['price']; ?></span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <?php
            }
            ?>
          </div>
        </div>

        <?php 
        $counter1++;}
        } ?>
      </div>
    </div>
  </div>
</div>


<?php include 'inc/footer.php'; ?>