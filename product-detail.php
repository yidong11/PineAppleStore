<?php include 'inc/header.php'; ?>
<body
    ><div
      ><link href="./product-detail.css" rel="stylesheet" />
      <?php 
    		    $id = Session::get("cmrId");
    		    $getdata = $cmr->getCustomerData($id);
    		    if ($getdata) {
    			    while ($result = $getdata->fetch_assoc()) {
    		

    		 ?>
          <form action="" method="post">
      <div
        class="product-detail-container"
        >
        <?php 
					      if (isset($updateCmr)) {
					        echo "<tr><td colspan='2'>".$updateCmr."</td></tr>";
					      }
					    ?>
        <div class="product-detail-container01">
          <div class="product-detail-container02">
            <div
              data-thq="slider"
              data-navigation="true"
              data-pagination="true"
              class="product-detail-slider swiper"
            >
              <div data-thq="slider-wrapper" class="swiper-wrapper">
                <div
                  data-thq="slider-slide"
                  class="product-detail-slider-slide swiper-slide"
                ></div>
                <div
                  data-thq="slider-slide"
                  class="product-detail-slider-slide1 swiper-slide"
                ></div>
                <div
                  data-thq="slider-slide"
                  class="product-detail-slider-slide2 swiper-slide"
                ></div>
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
              Apple iPhone 15 Pro (128 GB) - Blue Titanium | [Locked] | Boost
              Infinite plan required starting at $60/mo. | Unlimited Wireless |
              No trade-in needed to start | Get the latest iPhone every year
            </span>
            <div class="product-detail-container04">
              <span class="product-detail-text01">Ratings:</span>
              <div class="product-detail-container05">
                <svg
                  viewBox="0 0 950.8571428571428 1024"
                  class="product-detail-icon"
                >
                  <path
                    d="M950.857 369.714c0 10.286-7.429 20-14.857 27.429l-207.429 202.286 49.143 285.714c0.571 4 0.571 7.429 0.571 11.429 0 14.857-6.857 28.571-23.429 28.571-8 0-16-2.857-22.857-6.857l-256.571-134.857-256.571 134.857c-7.429 4-14.857 6.857-22.857 6.857-16.571 0-24-13.714-24-28.571 0-4 0.571-7.429 1.143-11.429l49.143-285.714-208-202.286c-6.857-7.429-14.286-17.143-14.286-27.429 0-17.143 17.714-24 32-26.286l286.857-41.714 128.571-260c5.143-10.857 14.857-23.429 28-23.429s22.857 12.571 28 23.429l128.571 260 286.857 41.714c13.714 2.286 32 9.143 32 26.286z"
                  ></path></svg
                ><svg
                  viewBox="0 0 950.8571428571428 1024"
                  class="product-detail-icon02"
                >
                  <path
                    d="M950.857 369.714c0 10.286-7.429 20-14.857 27.429l-207.429 202.286 49.143 285.714c0.571 4 0.571 7.429 0.571 11.429 0 14.857-6.857 28.571-23.429 28.571-8 0-16-2.857-22.857-6.857l-256.571-134.857-256.571 134.857c-7.429 4-14.857 6.857-22.857 6.857-16.571 0-24-13.714-24-28.571 0-4 0.571-7.429 1.143-11.429l49.143-285.714-208-202.286c-6.857-7.429-14.286-17.143-14.286-27.429 0-17.143 17.714-24 32-26.286l286.857-41.714 128.571-260c5.143-10.857 14.857-23.429 28-23.429s22.857 12.571 28 23.429l128.571 260 286.857 41.714c13.714 2.286 32 9.143 32 26.286z"
                  ></path></svg
                ><svg
                  viewBox="0 0 950.8571428571428 1024"
                  class="product-detail-icon04"
                >
                  <path
                    d="M950.857 369.714c0 10.286-7.429 20-14.857 27.429l-207.429 202.286 49.143 285.714c0.571 4 0.571 7.429 0.571 11.429 0 14.857-6.857 28.571-23.429 28.571-8 0-16-2.857-22.857-6.857l-256.571-134.857-256.571 134.857c-7.429 4-14.857 6.857-22.857 6.857-16.571 0-24-13.714-24-28.571 0-4 0.571-7.429 1.143-11.429l49.143-285.714-208-202.286c-6.857-7.429-14.286-17.143-14.286-27.429 0-17.143 17.714-24 32-26.286l286.857-41.714 128.571-260c5.143-10.857 14.857-23.429 28-23.429s22.857 12.571 28 23.429l128.571 260 286.857 41.714c13.714 2.286 32 9.143 32 26.286z"
                  ></path></svg
                ><svg
                  viewBox="0 0 950.8571428571428 1024"
                  class="product-detail-icon06"
                >
                  <path
                    d="M950.857 369.714c0 10.286-7.429 20-14.857 27.429l-207.429 202.286 49.143 285.714c0.571 4 0.571 7.429 0.571 11.429 0 14.857-6.857 28.571-23.429 28.571-8 0-16-2.857-22.857-6.857l-256.571-134.857-256.571 134.857c-7.429 4-14.857 6.857-22.857 6.857-16.571 0-24-13.714-24-28.571 0-4 0.571-7.429 1.143-11.429l49.143-285.714-208-202.286c-6.857-7.429-14.286-17.143-14.286-27.429 0-17.143 17.714-24 32-26.286l286.857-41.714 128.571-260c5.143-10.857 14.857-23.429 28-23.429s22.857 12.571 28 23.429l128.571 260 286.857 41.714c13.714 2.286 32 9.143 32 26.286z"
                  ></path></svg
                ><svg
                  viewBox="0 0 950.8571428571428 1024"
                  class="product-detail-icon08"
                >
                  <path
                    d="M950.857 369.714c0 10.286-7.429 20-14.857 27.429l-207.429 202.286 49.143 285.714c0.571 4 0.571 7.429 0.571 11.429 0 14.857-6.857 28.571-23.429 28.571-8 0-16-2.857-22.857-6.857l-256.571-134.857-256.571 134.857c-7.429 4-14.857 6.857-22.857 6.857-16.571 0-24-13.714-24-28.571 0-4 0.571-7.429 1.143-11.429l49.143-285.714-208-202.286c-6.857-7.429-14.286-17.143-14.286-27.429 0-17.143 17.714-24 32-26.286l286.857-41.714 128.571-260c5.143-10.857 14.857-23.429 28-23.429s22.857 12.571 28 23.429l128.571 260 286.857 41.714c13.714 2.286 32 9.143 32 26.286z"
                  ></path>
                </svg>
                <span class="product-detail-text02">5.0</span>
              </div>
            </div>
            <div class="product-detail-container06">
              <span class="product-detail-text03">Selected Type:&nbsp;</span>
              <select class="product-detail-select">
                <option value="Option 1">128G - Natural Titanium</option>
                <option value="Option 1">128G - White</option>
                <option value="Option 1">256G - Black</option>
                <option value="Option 2">256G - White</option>
                <option value="Option 3">512G - Black</option>
                <option value="Option 3">512G - White</option>
              </select>
            </div>
            <div class="product-detail-container07">
              <span class="product-detail-text04">Quantity:</span>
              <select autocomplete="off" class="product-detail-select1">
                <option value="1">1</option>
                <option value="1">2</option>
                <option value="1">3</option>
                <option value="1">4</option>
                <option value="1">5</option>
                <option value="1">6</option>
                <option value="1">7</option>
                <option value="4">8</option>
                <option value="5">9</option>
                <option value="5">10</option>
              </select>
            </div>
            <h1>HKD 8599</h1>
            <div class="product-detail-container08">
              <a href="payment.html" class="product-detail-navlink button">
                <span>
                  <span>BUY NOW!</span>
                  <br />
                </span>
              </a>
              <a
                href="shopping-cart-page.html"
                class="product-detail-navlink1 button"
              >
                <span>
                  <span>ADD TO CHART</span>
                  <br />
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="product-detail-container09">
          <span class="product-detail-text12">Related Products</span>
          <div class="product-detail-container10">
            <a href="product-detail.html" class="product-detail-navlink2">
              <div class="product-detail-container11">
                <img
                  alt="image"
                  src="public/external/15%20promax-200w-700h.jpg"
                  class="product-detail-image"
                />
                <span>iPhone 15 Pro Max</span>
              </div>
            </a>
            <a href="product-detail.html" class="product-detail-navlink3">
              <div class="product-detail-container12">
                <img
                  alt="image"
                  src="public/external/15%20promax-200w-700h.jpg"
                  class="product-detail-image1"
                />
                <span>
                  <span>iPhone 15 Pro</span>
                  <br />
                </span>
              </div>
            </a>
            <a href="product-detail.html" class="product-detail-navlink4">
              <div class="product-detail-container13">
                <img
                  alt="image"
                  src="public/15plus-200w.jpg"
                  class="product-detail-image2"
                />
                <span>iPhone 15 Plus</span>
              </div>
            </a>
            <a href="product-detail.html" class="product-detail-navlink5">
              <div class="product-detail-container14">
                <img
                  alt="image"
                  src="public/15-200w.jpg"
                  class="product-detail-image3"
                />
                <span>iPhone 15</span>
              </div>
            </a>
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
    ></script>
    </form>
    <?php }} ?>  
  </body>
</html>
<?php include 'inc/footer.php'; ?>   