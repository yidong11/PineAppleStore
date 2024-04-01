<?php
include '../lib/Session.php';
Session::checkSession();

include '../lib/Database.php';
include '../helpers/Formate.php';
spl_autoload_register(function($class){
    include_once "classess/".$class.".php";
});
?>


<?php  
$db = new Database();
$fm = new Format();
?>


<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>AdminPageMain - PineApple</title>
    <meta property="og:title" content="AdminPageMain - PineApple" />
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

    <!-- <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" /> -->
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="js/table/table.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
	  <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
		    setSidebarHeight();
        });
    </script>
	  
    
  </head>

  <body>
    <link rel="stylesheet" href="./css/style.css" />
    <div>
      <link href="./css/dashboard.css" rel="stylesheet" />

      <div class="admin-page-main-container">


        <header
          data-role="Header"
          class="admin-page-header2-header max-width-container"
        >
          <div class="admin-page-header2-navbar">


            <a href="dashboard.php" class="admin-page-header2-navlink">
              <div
                class="logo-container navbar-logo-title logo-root-class-name4"
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


            <a
              href="dashboard.php"
              class="admin-page-header2-navlink1 navbar-link"
            >
              <span>PineApple - Administrator</span>
              <br />
            </a>


            <?php
              if (isset($_GET['action']) && $_GET['action'] == "logout") {
                  Session::destroy();
              }
            ?>


            <div class="admin-page-header2-icons">
              <div
                data-thq="thq-dropdown"
                class="admin-page-header2-thq-dropdown list-item"
              >
                <div
                  data-thq="thq-dropdown-toggle"
                  class="admin-page-header2-dropdown-toggle"
                >
                  <div
                    data-thq="thq-dropdown-arrow"
                    class="admin-page-header2-dropdown-arrow"
                  >
                    <div class="admin-page-header2-container">
                      <svg
                        viewBox="0 0 1024 1024"
                        class="admin-page-header2-icon"
                      >
                        <path
                          d="M512 0c282.857 0 512 229.143 512 512 0 281.143-228 512-512 512-283.429 0-512-230.286-512-512 0-282.857 229.143-512 512-512zM865.714 772c53.143-73.143 85.143-162.857 85.143-260 0-241.714-197.143-438.857-438.857-438.857s-438.857 197.143-438.857 438.857c0 97.143 32 186.857 85.143 260 20.571-102.286 70.286-186.857 174.857-186.857 46.286 45.143 109.143 73.143 178.857 73.143s132.571-28 178.857-73.143c104.571 0 154.286 84.571 174.857 186.857zM731.429 402.286c0-121.143-98.286-219.429-219.429-219.429s-219.429 98.286-219.429 219.429 98.286 219.429 219.429 219.429 219.429-98.286 219.429-219.429z"
                        ></path>
                      </svg>
                    </div>
                  </div>
                </div>
                <ul
                  data-thq="thq-dropdown-list"
                  class="admin-page-header2-dropdown-list"
                >

                  <li
                    data-thq="thq-dropdown"
                    class="admin-page-header2-dropdown list-item"
                  >
                    <a href="edit-admin-info.php">
                      <div
                        data-thq="thq-dropdown-toggle"
                        class="admin-page-header2-dropdown-toggle1"
                      >
                        <span class="admin-page-header2-text2">
                          <span>Edit Info</span>
                        </span>
                      </div>
                    </a>
                  </li>

                  <li
                    data-thq="thq-dropdown"
                    class="admin-page-header2-dropdown1 list-item"
                  >
                    <a href="?action=logout">
                      <div
                        data-thq="thq-dropdown-toggle"
                        class="admin-page-header2-dropdown-toggle2"
                      >
                        <span class="admin-page-header2-text3">
                          <span>Log out</span>
                          <br />
                        </span>
                      </div>
                    </a>
                  </li>

                </ul>
              </div>
            </div>
          </div>
        </header>




        <div class="admin-page-main-container1 max-width-container">