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

header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache"); 
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
header("Cache-Control: max-age=2592000");
?>

<?php 
if (isset($_GET['cid'])) {
  $cmrId = Session::get("cmrId");
  $delData = $ct->delCustomerCart();
  $delComp = $pd->delCompareData($cmrId);
  Session::destroy();
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Homepage - PineApple</title>
    <meta property="og:title" content="Homepage - PineApple" />
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
      <link href="./css/homepage.css" rel="stylesheet" />

      <div class="homepage-container">


      <header data-role="Header" class="homepage-header max-width-container">
          <div class="homepage-navbar">

            <!-- For logo -->
			<a href="index.php" class="homepage-navlink">
				<div
				class="logo-container navbar-logo-title logo-root-class-name16"
				>
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


            <!-- For search bar -->
            <form class="homepage-form" action="search-page.php" method="get">
              <div class="homepage-container01">
                <input
                  type="text"
                  id="Search bar"
                  name="search"
                  placeholder="Search for products"
                  autocomplete="off"
                  class="homepage-textinput input"
                />
                <button type="submit" name="submit" class="homepage-button button">
                  <svg viewBox="0 0 1024 1024" class="homepage-icon">
                    <path
                      d="M406 598q80 0 136-56t56-136-56-136-136-56-136 56-56 136 56 136 136 56zM662 598l212 212-64 64-212-212v-34l-12-12q-76 66-180 66-116 0-197-80t-81-196 81-197 197-81 196 81 80 197q0 42-20 95t-46 85l12 12h34z"
                    ></path>
                  </svg>
                </button>
              </div>
            </form>



            <!-- For shopping cart and user information -->
            <div class="homepage-icons">
              <?php
              $login = Session::get("cuslogin");
              $cart_icon_link = $login ? "shopping-cart-page.php" : "login.php";
              ?>

              <!-- Shopping cart icon -->
              <a 
                href="<?php echo $cart_icon_link; ?>" 
                class="homepage-navlink1 button"
              >
                <svg viewBox="0 0 1024 1024" class="homepage-icon02">
                  <path
                    d="M726 768q34 0 59 26t25 60-25 59-59 25-60-25-26-59 26-60 60-26zM42 86h140l40 84h632q18 0 30 13t12 31q0 2-6 20l-152 276q-24 44-74 44h-318l-38 70-2 6q0 10 10 10h494v86h-512q-34 0-59-26t-25-60q0-20 10-40l58-106-154-324h-86v-84zM298 768q34 0 60 26t26 60-26 59-60 25-59-25-25-59 25-60 59-26z"
                  ></path>
                </svg>
              </a>


              <!-- Show shopping cart info -->
              <span class="homepage-text">
                <?php 
                if ($login == false){
                  echo "Need Login";
                } else {
                  $cartData = $ct->checkCartTable();
                  if ($cartData){
                    $sum = Session::get("sum");
                    $qty = Session::get("qty");
                    echo "Total: HKD".$sum." | Qty: ".$qty;
                  } else {
                    echo "Cart is empty";
                  }
                }
                ?>
              </span>


              <div
                data-thq="thq-dropdown"
                class="homepage-thq-dropdown list-item"
              >
                <div
                  data-thq="thq-dropdown-toggle"
                  class="homepage-dropdown-toggle"
                >
                  <div
                    data-thq="thq-dropdown-arrow"
                    class="homepage-dropdown-arrow"
                  >
                    <div class="homepage-container02">
                      <svg viewBox="0 0 1024 1024" class="homepage-icon04">
                        <path
                          d="M512 0c282.857 0 512 229.143 512 512 0 281.143-228 512-512 512-283.429 0-512-230.286-512-512 0-282.857 229.143-512 512-512zM865.714 772c53.143-73.143 85.143-162.857 85.143-260 0-241.714-197.143-438.857-438.857-438.857s-438.857 197.143-438.857 438.857c0 97.143 32 186.857 85.143 260 20.571-102.286 70.286-186.857 174.857-186.857 46.286 45.143 109.143 73.143 178.857 73.143s132.571-28 178.857-73.143c104.571 0 154.286 84.571 174.857 186.857zM731.429 402.286c0-121.143-98.286-219.429-219.429-219.429s-219.429 98.286-219.429 219.429 98.286 219.429 219.429 219.429 219.429-98.286 219.429-219.429z"
                        ></path>
                      </svg>
                    </div>
                  </div>
                </div>
                <ul data-thq="thq-dropdown-list" class="homepage-dropdown-list">

                  <!-- if login -->
                  <?php if ($login): ?>
                    <li
                      data-thq="thq-dropdown"
                      class="homepage-dropdown list-item"
                    >
                      <a href="personal-info.html">
                        <div
                          data-thq="thq-dropdown-toggle"
                          class="homepage-dropdown-toggle1"
                        >
                          <span class="homepage-text01">Information</span>
                        </div>
                      </a>
                    </li>
                    <li
                      data-thq="thq-dropdown"
                      class="homepage-dropdown1 list-item"
                    >
                      <a href="?cid=<?php Session::get('cmrId') ?>">
                        <div
                          data-thq="thq-dropdown-toggle"
                          class="homepage-dropdown-toggle2"
                        >
                          <span class="homepage-text02">
                            <span>Log out</span>
                            <br />
                          </span>
                        </div>
                      </a>
                    </li>

                  <!-- if not login -->
                  <?php else: ?>
                    <li
                      data-thq="thq-dropdown"
                      class="homepage-dropdown1 list-item"
                    >
                      <a href="login.php">
                        <div
                          data-thq="thq-dropdown-toggle"
                          class="homepage-dropdown-toggle2"
                        >
                          <span class="homepage-text02">
                            <span>Log in</span>
                            <br />
                          </span>
                        </div>
                      </a>
                    </li>
                  <?php endif; ?>

                </ul>
              </div>
            </div>
          </div>
        </header>
        
        <div class="app-component-container app-component-root-class-name"
          ><div class="app-component-container1"
            ><a href="edit-email.html" class="app-component-navlink button"
              ><span>Edit</span></a
            ></div
          ><div class="app-component-container2"></div
          ><div class="app-component-container3"
            ><a href="edit-name.php" class="app-component-navlink1 button"
              ><span>Edit </span></a
            ><input
              type="text"
              disabled="true"
              placeholder="LIANG Leyan"
              class="app-component-textinput input" /></div
          ><a href="change-password.html" class="app-component-navlink2 button"
            ><span>Edit</span></a
          ><span class="app-component-text"
            ><span>&gt;&nbsp; &nbsp; </span
            ><span class="app-component-text2">Login &amp; Security</span></span
          ><a href="personal-info.html" class="app-component-navlink3"
            ><span>Your Account </span></a
          ><span class="app-component-text3"><span>Email</span></span
          ><span class="app-component-text4"><span>Password</span></span
          ><span class="app-component-text5"><span>Name</span></span
          ><input
            type="text"
            disabled="true"
            placeholder="LLYjuangou@gmail.com"
            class="app-component-textinput1 input" /><input
            type="text"
            disabled="true"
            placeholder="*********"
            class="app-component-textinput2 input" /></div></div
    ></div>
    <script
      defer=""
      src="https://unpkg.com/@teleporthq/teleport-custom-scripts"
    ></script></body
></html>
