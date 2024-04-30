<!-- 
  File name: index.php
  File description: Home page of the website
 -->
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
          if ($counter == 1) {
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
          } elseif ($counter == 2) {
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
          } elseif ($counter == 3) {
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
          } elseif ($counter == 4) {
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
          } elseif ($counter == 5) {
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
          $counter++;
        }
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
  <div class="section-heading-section-heading">
    <h1 class="section-heading-text homepage-dytext01">
      <span>TRENDING ITEMS</span>
    </h1>
    <span class="section-heading-text1">
      <span>
        Explore our monthly most trending products, new items and
        the best PineApple offers you can buy
      </span>
    </span>
  </div>
  <div class="homepage-trending-items section-container">
    <div class="max-width-container">
      <div class="homepage-gallery">
        <?php
        $getTpd = $pd->getTrendingProduct();
      
          $result = $getTpd->fetch_assoc()
    
            ?>
              <div class="homepage-left">
                <div class="item-card-gallery-card item-card-root-class-name4">
                  <img alt="image" src="admin/<?php echo $result['image']; ?>" class="item-card-image-left-new" />
                  <div class="item-card-container">
                    <h3 class="item-card-text">
                      <span>
                        <a href="product-detail.php?proid=<?php echo $result['productId']; ?>">
                          <?php echo $result['productName']; ?>
                        </a>
                      </span>
                    </h3>
                    <div class="search-page-item-container5">
                      <?php
                      $n = round($result['rate']);
                      for ($i = 0; $i < $n; $i++) {
                      ?>
                        <svg
                          viewBox="0 0 950.8571428571428 1024"
                          class="item-card-icon"
                        >
                          <path
                            d="M950.857 369.714c0 10.286-7.429 20-14.857 27.429l-207.429 202.286 49.143 285.714c0.571 4 0.571 7.429 0.571 11.429 0 14.857-6.857 28.571-23.429 28.571-8 0-16-2.857-22.857-6.857l-256.571-134.857-256.571 134.857c-7.429 4-14.857 6.857-22.857 6.857-16.571 0-24-13.714-24-28.571 0-4 0.571-7.429 1.143-11.429l49.143-285.714-208-202.286c-6.857-7.429-14.286-17.143-14.286-27.429 0-17.143 17.714-24 32-26.286l286.857-41.714 128.571-260c5.143-10.857 14.857-23.429 28-23.429s22.857 12.571 28 23.429l128.571 260 286.857 41.714c13.714 2.286 32 9.143 32 26.286z"
                          ></path>
                        </svg>
                        
                      <?php 
                        } 
                      ?>
                      <?php
                      $n = round($result['rate']);
                      for ($i = 0; $i < (5 - $n); $i++) {
                      ?>  
                        <svg
                          viewBox="0 0 950.8571428571428 1024"
                          class="item-card-icon"
                        >
                          <path
                            d="M649.714 573.714l174.857-169.714-241.143-35.429-108-218.286-108 218.286-241.143 35.429 174.857 169.714-41.714 240.571 216-113.714 215.429 113.714zM950.857 369.714c0 10.286-7.429 20-14.857 27.429l-207.429 202.286 49.143 285.714c0.571 4 0.571 7.429 0.571 11.429 0 15.429-6.857 28.571-23.429 28.571-8 0-16-2.857-22.857-6.857l-256.571-134.857-256.571 134.857c-7.429 4-14.857 6.857-22.857 6.857-16.571 0-24-13.714-24-28.571 0-4 0.571-7.429 1.143-11.429l49.143-285.714-208-202.286c-6.857-7.429-14.286-17.143-14.286-27.429 0-17.143 17.714-24 32-26.286l286.857-41.714 128.571-260c5.143-10.857 14.857-23.429 28-23.429s22.857 12.571 28 23.429l128.571 260 286.857 41.714c13.714 2.286 32 9.143 32 26.286z"
                          ></path>
                        </svg>

                      <?php 
                        } 
                      ?>
                      <span class="search-page-item-ratetext">
                        <span>(<?php echo round($result['rate'], 1); ?>)</span>
                      </span>
                    </div>
                    <div class="item-card-container2">
                      <span class="item-card-currency"><span>HKD</span></span>
                      <span class="item-card-value"><span><?php echo $result['price']; ?></span></span>
                    </div>
                  </div>
                </div>
              </div>

            <?php
            $result = $getTpd->fetch_assoc()
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
                        <div class="search-page-item-container5">
                          <?php
                          $n = round($result['rate']);
                          for ($i = 0; $i < $n; $i++) {
                          ?>
                            <svg
                              viewBox="0 0 950.8571428571428 1024"
                              class="item-card-icon"
                            >
                              <path
                                d="M950.857 369.714c0 10.286-7.429 20-14.857 27.429l-207.429 202.286 49.143 285.714c0.571 4 0.571 7.429 0.571 11.429 0 14.857-6.857 28.571-23.429 28.571-8 0-16-2.857-22.857-6.857l-256.571-134.857-256.571 134.857c-7.429 4-14.857 6.857-22.857 6.857-16.571 0-24-13.714-24-28.571 0-4 0.571-7.429 1.143-11.429l49.143-285.714-208-202.286c-6.857-7.429-14.286-17.143-14.286-27.429 0-17.143 17.714-24 32-26.286l286.857-41.714 128.571-260c5.143-10.857 14.857-23.429 28-23.429s22.857 12.571 28 23.429l128.571 260 286.857 41.714c13.714 2.286 32 9.143 32 26.286z"
                              ></path>
                            </svg>
                            
                          <?php 
                            } 
                          ?>
                          <?php
                          $n = round($result['rate']);
                          for ($i = 0; $i < (5 - $n); $i++) {
                          ?>  
                            <svg
                              viewBox="0 0 950.8571428571428 1024"
                              class="item-card-icon"
                            >
                              <path
                                d="M649.714 573.714l174.857-169.714-241.143-35.429-108-218.286-108 218.286-241.143 35.429 174.857 169.714-41.714 240.571 216-113.714 215.429 113.714zM950.857 369.714c0 10.286-7.429 20-14.857 27.429l-207.429 202.286 49.143 285.714c0.571 4 0.571 7.429 0.571 11.429 0 15.429-6.857 28.571-23.429 28.571-8 0-16-2.857-22.857-6.857l-256.571-134.857-256.571 134.857c-7.429 4-14.857 6.857-22.857 6.857-16.571 0-24-13.714-24-28.571 0-4 0.571-7.429 1.143-11.429l49.143-285.714-208-202.286c-6.857-7.429-14.286-17.143-14.286-27.429 0-17.143 17.714-24 32-26.286l286.857-41.714 128.571-260c5.143-10.857 14.857-23.429 28-23.429s22.857 12.571 28 23.429l128.571 260 286.857 41.714c13.714 2.286 32 9.143 32 26.286z"
                              ></path>
                            </svg>

                          <?php 
                            } 
                          ?>
                          <span class="search-page-item-ratetext">
                            <span>(<?php echo round($result['rate'], 1); ?>)</span>
                          </span>
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
                $result = $getTpd->fetch_assoc()
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
                        <div class="search-page-item-container5">
                          <?php
                          $n = round($result['rate']);
                          for ($i = 0; $i < $n; $i++) {
                          ?>
                            <svg
                              viewBox="0 0 950.8571428571428 1024"
                              class="item-card-icon"
                            >
                              <path
                                d="M950.857 369.714c0 10.286-7.429 20-14.857 27.429l-207.429 202.286 49.143 285.714c0.571 4 0.571 7.429 0.571 11.429 0 14.857-6.857 28.571-23.429 28.571-8 0-16-2.857-22.857-6.857l-256.571-134.857-256.571 134.857c-7.429 4-14.857 6.857-22.857 6.857-16.571 0-24-13.714-24-28.571 0-4 0.571-7.429 1.143-11.429l49.143-285.714-208-202.286c-6.857-7.429-14.286-17.143-14.286-27.429 0-17.143 17.714-24 32-26.286l286.857-41.714 128.571-260c5.143-10.857 14.857-23.429 28-23.429s22.857 12.571 28 23.429l128.571 260 286.857 41.714c13.714 2.286 32 9.143 32 26.286z"
                              ></path>
                            </svg>
                            
                          <?php 
                            } 
                          ?>
                          <?php
                          $n = round($result['rate']);
                          for ($i = 0; $i < (5 - $n); $i++) {
                          ?>  
                            <svg
                              viewBox="0 0 950.8571428571428 1024"
                              class="item-card-icon"
                            >
                              <path
                                d="M649.714 573.714l174.857-169.714-241.143-35.429-108-218.286-108 218.286-241.143 35.429 174.857 169.714-41.714 240.571 216-113.714 215.429 113.714zM950.857 369.714c0 10.286-7.429 20-14.857 27.429l-207.429 202.286 49.143 285.714c0.571 4 0.571 7.429 0.571 11.429 0 15.429-6.857 28.571-23.429 28.571-8 0-16-2.857-22.857-6.857l-256.571-134.857-256.571 134.857c-7.429 4-14.857 6.857-22.857 6.857-16.571 0-24-13.714-24-28.571 0-4 0.571-7.429 1.143-11.429l49.143-285.714-208-202.286c-6.857-7.429-14.286-17.143-14.286-27.429 0-17.143 17.714-24 32-26.286l286.857-41.714 128.571-260c5.143-10.857 14.857-23.429 28-23.429s22.857 12.571 28 23.429l128.571 260 286.857 41.714c13.714 2.286 32 9.143 32 26.286z"
                              ></path>
                            </svg>

                          <?php 
                            } 
                          ?>
                          <span class="search-page-item-ratetext">
                            <span>(<?php echo round($result['rate'], 1); ?>)</span>
                          </span>
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
                $result = $getTpd->fetch_assoc()
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
                        <div class="search-page-item-container5">
                          <?php
                          $n = round($result['rate']);
                          for ($i = 0; $i < $n; $i++) {
                          ?>
                            <svg
                              viewBox="0 0 950.8571428571428 1024"
                              class="item-card-icon"
                            >
                              <path
                                d="M950.857 369.714c0 10.286-7.429 20-14.857 27.429l-207.429 202.286 49.143 285.714c0.571 4 0.571 7.429 0.571 11.429 0 14.857-6.857 28.571-23.429 28.571-8 0-16-2.857-22.857-6.857l-256.571-134.857-256.571 134.857c-7.429 4-14.857 6.857-22.857 6.857-16.571 0-24-13.714-24-28.571 0-4 0.571-7.429 1.143-11.429l49.143-285.714-208-202.286c-6.857-7.429-14.286-17.143-14.286-27.429 0-17.143 17.714-24 32-26.286l286.857-41.714 128.571-260c5.143-10.857 14.857-23.429 28-23.429s22.857 12.571 28 23.429l128.571 260 286.857 41.714c13.714 2.286 32 9.143 32 26.286z"
                              ></path>
                            </svg>
                            
                          <?php 
                            } 
                          ?>
                          <?php
                          $n = round($result['rate']);
                          for ($i = 0; $i < (5 - $n); $i++) {
                          ?>  
                            <svg
                              viewBox="0 0 950.8571428571428 1024"
                              class="item-card-icon"
                            >
                              <path
                                d="M649.714 573.714l174.857-169.714-241.143-35.429-108-218.286-108 218.286-241.143 35.429 174.857 169.714-41.714 240.571 216-113.714 215.429 113.714zM950.857 369.714c0 10.286-7.429 20-14.857 27.429l-207.429 202.286 49.143 285.714c0.571 4 0.571 7.429 0.571 11.429 0 15.429-6.857 28.571-23.429 28.571-8 0-16-2.857-22.857-6.857l-256.571-134.857-256.571 134.857c-7.429 4-14.857 6.857-22.857 6.857-16.571 0-24-13.714-24-28.571 0-4 0.571-7.429 1.143-11.429l49.143-285.714-208-202.286c-6.857-7.429-14.286-17.143-14.286-27.429 0-17.143 17.714-24 32-26.286l286.857-41.714 128.571-260c5.143-10.857 14.857-23.429 28-23.429s22.857 12.571 28 23.429l128.571 260 286.857 41.714c13.714 2.286 32 9.143 32 26.286z"
                              ></path>
                            </svg>

                          <?php 
                            } 
                          ?>
                          <span class="search-page-item-ratetext">
                            <span>(<?php echo round($result['rate'], 1); ?>)</span>
                          </span>
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
                $result = $getTpd->fetch_assoc()
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
                        <div class="search-page-item-container5">
                          <?php
                          $n = round($result['rate']);
                          for ($i = 0; $i < $n; $i++) {
                          ?>
                            <svg
                              viewBox="0 0 950.8571428571428 1024"
                              class="item-card-icon"
                            >
                              <path
                                d="M950.857 369.714c0 10.286-7.429 20-14.857 27.429l-207.429 202.286 49.143 285.714c0.571 4 0.571 7.429 0.571 11.429 0 14.857-6.857 28.571-23.429 28.571-8 0-16-2.857-22.857-6.857l-256.571-134.857-256.571 134.857c-7.429 4-14.857 6.857-22.857 6.857-16.571 0-24-13.714-24-28.571 0-4 0.571-7.429 1.143-11.429l49.143-285.714-208-202.286c-6.857-7.429-14.286-17.143-14.286-27.429 0-17.143 17.714-24 32-26.286l286.857-41.714 128.571-260c5.143-10.857 14.857-23.429 28-23.429s22.857 12.571 28 23.429l128.571 260 286.857 41.714c13.714 2.286 32 9.143 32 26.286z"
                              ></path>
                            </svg>
                            
                          <?php 
                            } 
                          ?>
                          <?php
                          $n = round($result['rate']);
                          for ($i = 0; $i < (5 - $n); $i++) {
                          ?>  
                            <svg
                              viewBox="0 0 950.8571428571428 1024"
                              class="item-card-icon"
                            >
                              <path
                                d="M649.714 573.714l174.857-169.714-241.143-35.429-108-218.286-108 218.286-241.143 35.429 174.857 169.714-41.714 240.571 216-113.714 215.429 113.714zM950.857 369.714c0 10.286-7.429 20-14.857 27.429l-207.429 202.286 49.143 285.714c0.571 4 0.571 7.429 0.571 11.429 0 15.429-6.857 28.571-23.429 28.571-8 0-16-2.857-22.857-6.857l-256.571-134.857-256.571 134.857c-7.429 4-14.857 6.857-22.857 6.857-16.571 0-24-13.714-24-28.571 0-4 0.571-7.429 1.143-11.429l49.143-285.714-208-202.286c-6.857-7.429-14.286-17.143-14.286-27.429 0-17.143 17.714-24 32-26.286l286.857-41.714 128.571-260c5.143-10.857 14.857-23.429 28-23.429s22.857 12.571 28 23.429l128.571 260 286.857 41.714c13.714 2.286 32 9.143 32 26.286z"
                              ></path>
                            </svg>

                          <?php 
                            } 
                          ?>
                          <span class="search-page-item-ratetext">
                            <span>(<?php echo round($result['rate'], 1); ?>)</span>
                          </span>
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
              </div>
      </div>
    </div>
  </div>
</div>


<?php include 'inc/footer.php'; ?>