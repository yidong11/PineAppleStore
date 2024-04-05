<?php

include 'lib/Session.php';
Session::init();

include 'lib/Database.php';
include 'helpers/Formate.php';
spl_autoload_register(function($class){
  include_once "classess/".$class.".php";
});

$db = new Database();
$fm = new Format();
$pd = new Product();
$cat = new Category();
$ct = new Cart();
$cmr = new Customer();
?>

<?php 
  $login = Session::get("cuslogin");
  if ($login == false) {
    header("Location:login.php");
  }
?>

<?php 
  if (isset($_GET['orderid']) && $_GET['orderid'] == 'Order') {
    $cmrId = Session::get("cmrId");
    $insertOrder = $ct->orderProduct($cmrId);
    $delData = $ct->delCustomerCart();
    header("Location:check-order.php");
}
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>payment - PineApple</title>
    <meta property="og:title" content="payment - PineApple" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta property="twitter:card" content="summary_large_image" />

    <style data-tag="reset-style-sheet">
      html {  line-height: 1.15;}body {  margin: 0;}* {  box-sizing: border-box;  border-width: 0;  border-style: solid;}p,li,ul,pre,div,h1,h2,h3,h4,h5,h6,figure,blockquote,figcaption {  margin: 0;  padding: 0;}button {  background-color: transparent;}button,input,optgroup,select,textarea {  font-family: inherit;  font-size: 100%;  line-height: 1.15;  margin: 0;}button,select {  text-transform: none;}button,[type="button"],[type="reset"],[type="submit"] {  -webkit-appearance: button;}button::-moz-focus-inner,[type="button"]::-moz-focus-inner,[type="reset"]::-moz-focus-inner,[type="submit"]::-moz-focus-inner {  border-style: none;  padding: 0;}button:-moz-focus,[type="button"]:-moz-focus,[type="reset"]:-moz-focus,[type="submit"]:-moz-focus {  outline: 1px dotted ButtonText;}a {  color: inherit;  text-decoration: inherit;}input {  padding: 2px 4px;}img {  display: block;}html { scroll-behavior: smooth  }
    </style>
    <style data-tag="default-style-sheet">
      html {
        font-family: Jost;
        font-size: 16px;
      }

      body {
        font-weight: 400;
        font-style:normal;
        text-decoration: none;
        text-transform: none;
        letter-spacing: 0.02;
        line-height: 1.55;
        color: var(--dl-color-gray-black);
        background-color: var(--dl-color-gray-white);

      }
    </style>
    <link
      rel="stylesheet"
      href="https://unpkg.com/animate.css@4.1.1/animate.css"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font"
    />
    <link
      rel="stylesheet"
      href="https://unpkg.com/@teleporthq/teleport-custom-scripts/dist/style.css"
    />
    <style>
      [data-thq="thq-dropdown"]:hover > [data-thq="thq-dropdown-list"] {
          display: flex;
        }

        [data-thq="thq-dropdown"]:hover > div [data-thq="thq-dropdown-arrow"] {
          transform: rotate(90deg);
        }
    </style>
  </head>
  <body>
    <link rel="stylesheet" href="./style.css" />
    <div>
      <link href="./payment.css" rel="stylesheet" />
      <script
        type="text/javascript"
        src="https://github.com/teleporthq/date-time-primitive/blob/main/dist/default/lib.umd.js"
      ></script>

      <div class="payment-container">
        <div class="payment-left">
          <div class="payment-address">
            <?php 
              $id = Session::get("cmrId");
              $getdata = $cmr->getCustomerData($id);
              if ($getdata) {
                while ($result = $getdata->fetch_assoc()) {

            ?>
                <h1 class="payment-text">1&nbsp; &nbsp; Shipping address</h1>
                <ul class="payment-ul list">
                  <li class="list-item"><span><?php echo $result['name'];?></span></li>
                  <li class="list-item">
                    <span><?php echo $result['address'];?></span>
                  </li>
                  <li class="list-item">
                    <span><?php echo $result['city'];?></span>
                  </li>
                </ul>
                <a href="change-address.php" class="payment-change navbar-link">
                  change
                </a>
            <?php }} ?>
          </div>
          <div class="payment-paymentmethod">
            <h1 class="payment-text04">2&nbsp; &nbsp; Payment method</h1>
            <select name = "payment-method" size="1" class="payment-select1">
              <option value="Wechat">Wechat</option>
              <option value="AliPay">AliPay</option>
              <option value="MasterCard">MasterCard</option>
            </select>
          </div>
          <div class="payment-detail">
            <h1 class="payment-text07">
              3&nbsp; &nbsp; Review items and shipping
            </h1>
            <div class="payment-item">
            <table class="data display datatable" id="example" style="width: 1200px;">
    
              <thead>
                <tr>
                  <th>Product ID</th>
                  <th>Product Name</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Image</th>
                  <th>Total</th>
                </tr>
              </thead>

              <tbody>

                <?php
                  $getPd = $ct->getCartProduct();
                  if ($getPd) {
                    $i = 0;
                    $sum = 0;
                    $qty = 0;
                    while ($result = $getPd->fetch_assoc()) {
                      $i++;
                ?>
                <tr class="odd gradeX">
                  <td><?php echo $result['productId'];?></td>
                  <td><?php echo $result['productName'] ;?></td>
                  <td>HKD <?php echo $result['price'] ;?></td>
                  <td><?php echo $result['quantity'] ;?></td>
                  <td><img src="<?php echo $result['image'] ;?>" height="50px"></td>
                  <td>HKD <?php
                      $total = $result['price'] * $result['quantity'];
                      echo $total;?>
                  </td>
                </tr>
                <?php 
                  $qty = $qty + $result['quantity'];
                  $sum = $sum + $total;
                  Session::set("qty",$qty);
                  Session::set("sum",$sum);
                ?>
                
                <?php } } ?>
                
              </tbody>
	          </table>

            </div>
            <label class="payment-text08">Delivery: <?php echo date('Y-m-d');?></label>
            <div class="payment-payment">
              <button type="button" class="payment-button button">
                <a href="?orderid=Order">Place your order in HKD</a>
              </button>
              <span class="payment-text09">
                You'll be securely redirected to Master Card to complete this
                transaction
              </span>
              <label class="payment-text10">Payment Total: HKD <?php echo $sum;?></label>
              <span class="payment-text11">
                <span>By placing your order you agree to PineApple's</span>
                <a href="template.html" class="payment-navlink">
                  privacy notice
                </a>
                <span>and</span>
                <a href="template.html" class="payment-navlink1">
                  conditions of use
                </a>
              </span>
            </div>
          </div>
        </div>
        <div class="payment-head">
          <a href="index.php" class="payment-navlink2">
            <div class="logo-container navbar-logo-title logo-root-class-name6">
              <span class="logo-logo-center Logo navbar-logo-title">
                <span>PineApple</span>
              </span>
              <img
                alt="image"
                src="public/Pineapple Icons/logo_no_bg_2-200h.png"
                class="logo-image"
              />
            </div>
          </a>
          <h1>
            <span>Checkout</span>
            <span class="payment-text16">(1 Item)</span>
          </h1>
        </div>
        <div class="payment-right">
          <button type="button" class="payment-button1 button">
            <a href="?orderid=Order">Place your order in HKD</a>
          </button>
          <span class="payment-text17">
            You'll be securely redirected to Master Card to complete this
            transaction
          </span>
          <label class="payment-text18">
            <span>Payment Total:</span>
            <br />
            <span>HKD <?php echo $sum;?></span>
          </label>
          <span class="payment-text22">
            <span>By placing your order you agree to PineApple's</span>
            <a href="template.html" class="payment-navlink3">privacy notice</a>
            <span>and</span>
            <a href="template.html" class="payment-navlink4">
              conditions of use
            </a>
          </span>
        </div>
      </div>
    </div>
    <script
      defer=""
      src="https://unpkg.com/@teleporthq/teleport-custom-scripts"
    ></script>
  </body>
</html>
