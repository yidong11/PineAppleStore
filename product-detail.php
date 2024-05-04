<!-- 
    This page is used to display the details of a product.
    it displays the product image, name, id, ratings, sales, stock, price, and description.
 -->
<?php
// start output buffering
ob_start();
?>

<?php include 'inc/header.php'; ?>

<?php
if (isset($_GET['proid'])) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['proid']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // if there is no enough stock, the quantity is not set in the form
    $quantity = 0;
    if (isset($_POST['quantity'])) {
        $quantity = $_POST['quantity'];
    }

    $addCart = $ct->addToCart($quantity, $id);

    if ($_POST['submit'] == 'buy_now' && $addCart == 'Product added to cart!') {
        header("Location: shopping-cart-page.php");
    }
    else if ($_POST['submit'] == "add_cart" && $addCart == "Product added to cart!") {
        // if the product is added to the cart successfully, refresh the page to show the success message and update the cart icon
        echo "<meta http-equiv = 'refresh' content ='0;URL=?proid=$id' />";
    }
}
?>


<link href="product-detail.css" rel="stylesheet" />


<?php 
// get the product details from the database
$getPd = $pd->getSingleProduct($id);
if ($getPd) {
    while ($result = $getPd->fetch_assoc()) {
?>

<div class="product-detail-container01">


    <!-- sliders -->
    <div class="product-detail-container02">
        <div data-thq="slider" data-navigation="true" data-pagination="true" class="product-detail-slider swiper" style="height: auto;">
            <div data-thq="slider-wrapper" class="swiper-wrapper">
                <div data-thq="slider-slide" class="product-detail-slider-slide swiper-slide">
                    <img src="admin/<?php echo $result['image']; ?>" width="100%" />
                </div>
                <div data-thq="slider-slide" class="product-detail-slider-slide swiper-slide">
                    <img src="admin/<?php echo $result['image']; ?>" width="100%" />
                </div>
                <div data-thq="slider-slide" class="product-detail-slider-slide swiper-slide">
                    <img src="admin/<?php echo $result['image']; ?>" width="100%" />
                </div>
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
            <span class="product-detail-text01">Product ID: </span>
            <div class="product-detail-container05">
                <span class="product-detail-text02"><?php echo $result['productId']; ?></span>
            </div>
        </div>


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


        <div class="product-detail-container04">
            <span class="product-detail-text01">Sales: </span>
            <div class="product-detail-container05">
                <span class="product-detail-text02"><?php echo $result['sales']; ?></span>
            </div>
        </div>


        <div class="product-detail-container04">
            <span class="product-detail-text01">Stock: </span>
            <div class="product-detail-container05">
                <span class="product-detail-text02"><?php echo $result['stock']; ?></span>
            </div>
        </div>
            

        
        <form class="product-detail-form" action="" method="post">

            <div class="product-detail-container04">
                <span class="product-detail-text04">Quantity:</span>
                
                <div class="product-detail-container05">
                    
                    <!-- if the quantity is 0 -->
                    <?php
                    $quant = $result['stock'];
                    if ($quant == 0) { ?>
                        <select class="product-detail-select1" name="quantity" disabled>
                            <option value="0">Sold Out</option>
                        </select>
                    <?php } else { ?>
                        <select autocomplete="off" class="product-detail-select1" name="quantity">
                            <option value="1">1</option>
                            <?php
                            $upper_bound = 10;
                            if ($quant < 10) {
                                $upper_bound = $quant;
                            }
                            for ($i=2; $i <= $upper_bound; $i++) { ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?> 
                        </select>
                    <?php } ?>
                    
                </div>
            </div>

            <h1 class="product-detail-text05">HKD. <?php echo $result['price']; ?></h1>

            <?php if (isset($addCart) && $addCart != "Product added to cart!") { ?>
            <div class="product-detail-container04" style="margin-bottom: -40px; margin-top: 15px; height: 25px; margin-left: 150px">
                <span class="product-detail-text01"><?php echo $addCart; ?></span>
            </div>
            <?php } ?>

            <div class="product-detail-container08">
                <button type="submit" name="submit" value="buy_now" class="product-detail-navlink button">
                    <span>
                        <span>BUY NOW!</span><br />
                    </span>
                </button>
                <button type="submit" name="submit" value="add_cart" class="product-detail-navlink1 button">
                    <span>
                        <span>ADD TO CART</span><br />
                    </span>
                </button>
            </div>
        </form>


    </div>
</div>




<!-- Product Info -->
<div class="product-detail-container09">
    <span class="product-detail-text12">Product Details</span>

    <div class="product-detail-container10" style="width: 80%;">
        <span class="product-detail-text01"><?php echo $result['body']; ?></span>
    </div>
</div>


<div class="product-detail-container09"><span class="product-detail-text12">Related Products</span>
    <div class="product-detail-container10">

        <?php
        $getRelated = $pd->getRelatedProduct($id, $result['catId']);
        if ($getRelated) {
            while ($relatedItem = $getRelated->fetch_assoc()) {
        ?>
        <a href="?proid=<?php echo $relatedItem['productId']; ?>" class="product-detail-navlink2">
            <div class="product-detail-container11">
                <img alt="image" src="admin/<?php echo $relatedItem['image']; ?>" class="product-detail-image" />
                <span><?php echo $relatedItem['productName']; ?></span>
            </div>
        </a>
        <?php } } ?>
    </div>
</div>



<?php } } ?>







<?php include 'inc/footer.php'; ?> 

<?php
// get the content of the buffer and put it in your file
ob_end_flush();
?>