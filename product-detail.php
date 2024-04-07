<?php include 'inc/header.php'; ?>

<?php
if (isset($_GET['proid'])) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['proid']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $quantity = $_POST['quantity'];
    $addCart = $ct->addToCart($quantity,$id);
}
?>


<link href="product-detail.css" rel="stylesheet" />


<?php 
$getPd = $pd->getSingleProduct($id);
if ($getPd) {
    while ($result = $getPd->fetch_assoc()) {
?>

<div class="product-detail-container01">


    <!-- sliders -->
    <div class="product-detail-container02">
        <div data-thq="slider" data-navigation="true" data-pagination="true" class="product-detail-slider swiper">
            
            <div data-thq="slider-wrapper" class="swiper-wrapper">
                <img src="admin/<?php echo $result['image']; ?>" class="product-detail-slider-slide swiper-slide" />
                <img src="admin/<?php echo $result['image']; ?>" class="product-detail-slider-slide1 swiper-slide" />
                <img src="admin/<?php echo $result['image']; ?>" class="product-detail-slider-slide2 swiper-slide" />
            </div>

            <div data-thq="slider-pagination" class="product-detail-slider-pagination swiper-pagination swiper-pagination-bullets swiper-pagination-horizontal">
                <div data-thq="slider-pagination-bullet" class="swiper-pagination-bullet swiper-pagination-bullet-active"></div>
                <div data-thq="slider-pagination-bullet" class="swiper-pagination-bullet"></div>
                <div data-thq="slider-pagination-bullet" class="swiper-pagination-bullet"></div>
            </div>
            <div data-thq="slider-button-prev" class="swiper-button-prev"></div>
            <div data-thq="slider-button-next" class="swiper-button-next"></div>
        </div>
    </div>




    <div class="product-detail-container03">

        <span class="product-detail-text"><?php echo $result['productName'];?> </span>

        <div class="product-detail-container04">
            <span class="product-detail-text01">Ratings: </span>

            <div class="product-detail-container05">
                <?php
                $n = round($result['rate']);
                for ($i=0; $i < $n; $i++) { ?>
                    <svg viewBox="0 0 950.8571428571428 1024" class="product-detail-icon">
                        <path d="M950.857 369.714c0 10.286-7.429 20-14.857 27.429l-207.429 202.286 49.143 285.714c0.571 4 0.571 7.429 0.571 11.429 0 14.857-6.857 28.571-23.429 28.571-8 0-16-2.857-22.857-6.857l-256.571-134.857-256.571 134.857c-7.429 4-14.857 6.857-22.857 6.857-16.571 0-24-13.714-24-28.571 0-4 0.571-7.429 1.143-11.429l49.143-285.714-208-202.286c-6.857-7.429-14.286-17.143-14.286-27.429 0-17.143 17.714-24 32-26.286l286.857-41.714 128.571-260c5.143-10.857 14.857-23.429 28-23.429s22.857 12.571 28 23.429l128.571 260 286.857 41.714c13.714 2.286 32 9.143 32 26.286z"></path>
                    </svg>
                <?php } ?>

                <?php
                for ($i=0; $i < 5-$n; $i++) { ?>
                    <svg viewBox="0 0 950.8571428571428 1024" class="product-detail-icon02">
                        <path d="M649.714 573.714l174.857-169.714-241.143-35.429-108-218.286-108 218.286-241.143 35.429 174.857 169.714-41.714 240.571 216-113.714 215.429 113.714zM950.857 369.714c0 10.286-7.429 20-14.857 27.429l-207.429 202.286 49.143 285.714c0.571 4 0.571 7.429 0.571 11.429 0 15.429-6.857 28.571-23.429 28.571-8 0-16-2.857-22.857-6.857l-256.571-134.857-256.571 134.857c-7.429 4-14.857 6.857-22.857 6.857-16.571 0-24-13.714-24-28.571 0-4 0.571-7.429 1.143-11.429l49.143-285.714-208-202.286c-6.857-7.429-14.286-17.143-14.286-27.429 0-17.143 17.714-24 32-26.286l286.857-41.714 128.571-260c5.143-10.857 14.857-23.429 28-23.429s22.857 12.571 28 23.429l128.571 260 286.857 41.714c13.714 2.286 32 9.143 32 26.286z"></path>
                    </svg>
                <?php } ?>

                <span class="product-detail-text02"><?php echo round($result['rate'], 1); ?></span>
            </div>
        </div>

        
        <form class="product-detail-form" action="" method="post">

            <div class="product-detail-container07">
                <span class="product-detail-text04">Quantity:</span>
                
                <select autocomplete="off" class="product-detail-select1" name="quantity" style="max-lines: 10;">
                    <option value="1">1</option>
                    <?php
                    for ($i=2; $i <= 10; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?> 
                </select>
            </div>

            <h1 class="product-detail-text05"><?php echo $result['price']; ?></h1>

            <div class="product-detail-container08">
                <a href="payment.html" class="product-detail-navlink button">
                    <span>
                        <span>BUY NOW!</span><br />
                    </span></a>
                <a href="shopping-cart-page.html" class="product-detail-navlink1 button">
                    <span>
                        <span>ADD TO CHART</span><br />
                    </span></a>
                </div>
        </form>
    </div>
</div>


<?php } } ?>


<div class="product-detail-container09"><span class="product-detail-text12">Related Products</span>
    <div class="product-detail-container10"><a href="product-detail.html" class="product-detail-navlink2">
            <div class="product-detail-container11"><img alt="image" src="public/external/15%20promax-200w-700h.jpg" class="product-detail-image" /><span>iPhone 15 Pro Max </span></div>
        </a><a href="product-detail.html" class="product-detail-navlink3">
            <div class="product-detail-container12"><img alt="image" src="public/external/15%20promax-200w-700h.jpg" class="product-detail-image1" /><span><span>iPhone 15 Pro</span><br /></span></div>
        </a><a href="product-detail.html" class="product-detail-navlink4">
            <div class="product-detail-container13"><img alt="image" src="public/15plus-200w.jpg" class="product-detail-image2" /><span>iPhone 15 Plus</span></div>
        </a><a href="product-detail.html" class="product-detail-navlink5">
            <div class="product-detail-container14"><img alt="image" src="public/15-200w.jpg" class="product-detail-image3" /><span>iPhone 15</span></div>
        </a></div><img alt="image" src="public/Pineapple Icons/pro1._cb585551876_-1500w.jpg" class="product-detail-image4" />
</div>







<?php include 'inc/footer.php'; ?> 