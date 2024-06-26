<!-- 
 * This file is responsible for handling the login functionality for the admin page of the PineApple Store.
 * It includes the Adminlogin class and performs the admin login process when the form is submitted.
 * The login form collects the admin username and password, and then calls the adminLogin method of the Adminlogin class to validate the credentials.
 * If the login is successful, the user is redirected to the admin dashboard.
 * If the login fails, an error message is displayed on the login page. 
-->


<?php 
include '../classess/Adminlogin.php';

$al = new Adminlogin();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the admin username and password from the form
  $adminUser = $_POST['adminUser'];  
  // Encrypt the password using md5
  $adminPassword = md5($_POST['adminPassword']);  
  // Call the adminLogin method of the Adminlogin class to validate the credentials
  $loginChk = $al->adminLogin($adminUser, $adminPassword);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>AdminPageLogin - PineApple</title>
  <meta property="og:title" content="AdminPageLogin - PineApple" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta charset="utf-8" />
  <meta property="twitter:card" content="summary_large_image" />

  <style data-tag="reset-style-sheet">
    html {
      line-height: 1.15;
    }

    body {
      margin: 0;
    }

    * {
      box-sizing: border-box;
      border-width: 0;
      border-style: solid;
    }

    p,
    li,
    ul,
    pre,
    div,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    figure,
    blockquote,
    figcaption {
      margin: 0;
      padding: 0;
    }

    button {
      background-color: transparent;
    }

    button,
    input,
    optgroup,
    select,
    textarea {
      font-family: inherit;
      font-size: 100%;
      line-height: 1.15;
      margin: 0;
    }

    button,
    select {
      text-transform: none;
    }

    button,
    [type="button"],
    [type="reset"],
    [type="submit"] {
      -webkit-appearance: button;
    }

    button::-moz-focus-inner,
    [type="button"]::-moz-focus-inner,
    [type="reset"]::-moz-focus-inner,
    [type="submit"]::-moz-focus-inner {
      border-style: none;
      padding: 0;
    }

    button:-moz-focus,
    [type="button"]:-moz-focus,
    [type="reset"]:-moz-focus,
    [type="submit"]:-moz-focus {
      outline: 1px dotted ButtonText;
    }

    a {
      color: inherit;
      text-decoration: inherit;
    }

    input {
      padding: 2px 4px;
    }

    img {
      display: block;
    }

    html {
      scroll-behavior: smooth
    }
  </style>
  <style data-tag="default-style-sheet">
    html {
      font-family: Jost;
      font-size: 16px;
    }

    body {
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      letter-spacing: 0.02;
      line-height: 1.55;
      color: var(--dl-color-gray-black);
      background-color: var(--dl-color-gray-white);

    }
  </style>
  <link rel="stylesheet" href="https://unpkg.com/animate.css@4.1.1/animate.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" data-tag="font" />
  <link rel="stylesheet" href="https://unpkg.com/@teleporthq/teleport-custom-scripts/dist/style.css" />
  <style>
    [data-thq="thq-dropdown"]:hover>[data-thq="thq-dropdown-list"] {
      display: flex;
    }

    [data-thq="thq-dropdown"]:hover>div [data-thq="thq-dropdown-arrow"] {
      transform: rotate(90deg);
    }
  </style>
</head>

<body>
  <link rel="stylesheet" href="./css/style.css" />
  <div>
    <link href="./css/login.css" rel="stylesheet" />

    <div class="admin-page-login-container">
      <div class="admin-page-login-container1">
        <form action="login.php" method="post">
          <div class="admin-page-login-container2">



            <span class="admin-page-login-text">Admin Login</span>

            <span class="admin-page-login-text1">
              <?php
              if (isset($loginChk)) {
                // Display the error message if the login fails
                echo $loginChk;
              }
              ?>
            </span>

            <div class="admin-page-login-container3">
              <input type="text" placeholder="Username" name="adminUser" class="admin-page-login-textinput input" />
              <input type="text" placeholder="Password" name="adminPassword" class="admin-page-login-textinput1 input" />
            </div>

            <button type="submit" class="admin-page-login-button button">
              <span class="admin-page-login-text2">Login</span>
            </button>



          </div>
        </form>
      </div>
    </div>

  </div>
  <script defer="" src="https://unpkg.com/@teleporthq/teleport-custom-scripts"></script>
</body>

</html>