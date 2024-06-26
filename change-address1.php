<!-- 
  This file is used to change the address of the customer.
  Slightly different from the change-address.php file in redirection. Their functionalities are the same.
 -->
<?php
// Path: classess/Customer.php
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
// if the customer is not logged in, redirect to the login page
$login = Session::get("cuslogin");
if ($login == false) {
    header("Location:login.php");
}
 ?>

<?php
// Update the customer's address if the form is submitted
$cmrId = Session::get("cmrId");
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updateCmr = $cmr->customerUpdate($_POST,$cmrId);
}
?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>change-address - PineApple</title>
    <meta property="og:title" content="change-address - PineApple" />
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
      <link href="./change-address.css" rel="stylesheet" />

      <div class="change-address-container">
        <div class="change-address-container1">
          <div class="change-address-container2">
            <a href="index.php">
              <div
                class="logo-container navbar-logo-title logo-root-class-name13">
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
            <h1>Edit Address</h1>
          </div>
          <?php 
          // Get the information of the currently logged in customer
    		    $id = Session::get("cmrId");
    		    $getdata = $cmr->getCustomerData($id);
    		    if ($getdata) {
    			    while ($result = $getdata->fetch_assoc()) {
    		

    		 ?>
          <form action="" method="post">
            <div class="change-address-container3">
              <h1 class="change-address-text1">Edit Address
                <div class = "update-text">
                <?php 
                  if (isset($updateCmr)) {
                    /*echo "<tr><td colspan='2'>".$updateCmr."</td></tr> ";
                    echo "<a href='payment.php' class='navlink'> Click here to return</a>";*/
                    header("Location:my-address.php");
                  }
                ?>
                </div>
              </h1>
              <div class="change-address-container4">
                <div class="change-address-container5">
                  <input name = "name" type="text" class="change-address-textinput input" value="<?php echo $result['name'];?>"/>
                  <h1 class="change-address-text2">Full name</h1>
                </div>
              </div>
              <div class="change-address-container6">
                <input name = "phone" type="text" class="change-address-textinput1 input" value="<?php echo $result['phone'];?>"/>
                <h1 class="change-address-text4">Phone number</h1>
              </div>
              <div class="change-address-container8">
                <input name = "email" type="text" class="change-address-textinput4 input" value="<?php echo $result['email'];?>"/>
                <h1 class="change-address-text6">Email</h1>
              </div>
              <div class="change-address-container7">
                <input name = "address" type="text" placeholder="address" class="change-address-textinput2 input" value="<?php echo $result['address'];?>"/>
                <h1 class="change-address-text5">Address</h1>
                <input name = "city" type="text" placeholder="city" class="change-address-textinput3 input" value="<?php echo $result['city'];?>"/>
              </div>
              <div class="change-address-container9">
                <input name = "zip" type="text" class="change-address-textinput4 input" value="<?php echo $result['zip'];?>"/>
                <h1 class="change-address-text6">Zipcode</h1>
              </div>
              <div class="change-address-ct1">
                  <h1 class="change-address-text3">Country/Area</h1>
                    <select name="country" size="1" class="change-address-select"> <?php $countries = [ "China", "China HK", "United States", "Canada", "United Kingdom", "Australia", "Germany", "France", "Italy", "Spain", "Brazil", "India", "Japan", "South Korea", "South Africa", "Mexico", "Russia", "Argentina", "Belgium", "Chile", "Denmark", "Egypt", "Finland", "Greece", "Hungary", "Indonesia", "Jamaica", "Kenya", "Luxembourg", "Malaysia", "Netherlands", "Oman", "Portugal", "Qatar", "Romania", "Sweden", "Thailand", "Ukraine", "Vietnam", "Yemen", "Zimbabwe" ]; 
                      foreach ($countries as $country) {
                        echo '<option value="'.$country.'"'.($country == $result['country'] ? ' selected="selected"' : '').'>'.$country.'</option>'; 
                      } ?>
                    </select>
                </div>
              <input type="submit" name="submit" value="Save" class="change-address-navlink1 navbar-link">
              <a type="button" href="my-address.php" class="change-address-navlink9 navbar-link">
                Return
              </a>
            </div>
          </form>
          <?php }} ?>
        </div>
      </div>
    </div>
    <script
      defer=""
      src="https://unpkg.com/@teleporthq/teleport-custom-scripts"
    ></script>
  </body>
</html>
