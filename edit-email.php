<!-- 
  This page is for changing the email of the customer.
  It collects the new email address from the customer, and updates the email address in the database according to the user ID.
 -->
<?php

include 'lib/Session.php';
Session::init();

include 'lib/Database.php';
include 'helpers/Formate.php';
spl_autoload_register(function ($class) {
  include_once "classess/" . $class . ".php";
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
// Update the email of the customer if the form is submitted
$cmrId = Session::get("cmrId");
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
  $updateCmr = $cmr->UpdateEmail($_POST, $cmrId);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Edit-Email - PineApple</title>
  <meta property="og:title" content="Edit-Email - PineApple" />
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
  <link rel="stylesheet" href="./style.css" />
  <div>
    <link href="./edit-email.css" rel="stylesheet" />
    <div class="edit-email-container">
      <header data-role="Header" class="admin-page-header2-header max-width-container">
        <div class="admin-page-header2-navbar"><a href="index.php" class="admin-page-header2-navlink">
            <div class="logo-container navbar-logo-title logo-root-class-name4"><span class="logo-logo-center Logo navbar-logo-title"><span>PineApple</span></span><img alt="image" src="public/Pineapple Icons/logo_no_bg_2-200h.png" class="logo-image" /></div>
          </a><a href="edit-email.php" class="admin-page-header2-navlink1 navbar-link"><span>PineApple - Editemail</span><br /></a>
          <div class="admin-page-header2-icons">
            <div data-thq="thq-dropdown" class="admin-page-header2-thq-dropdown list-item">
              <div data-thq="thq-dropdown-toggle" class="admin-page-header2-dropdown-toggle">
                <div data-thq="thq-dropdown-arrow" class="admin-page-header2-dropdown-arrow">
                  <div class="admin-page-header2-container"><svg viewBox="0 0 1024 1024" class="admin-page-header2-icon">
                      <path d="M512 0c282.857 0 512 229.143 512 512 0 281.143-228 512-512 512-283.429 0-512-230.286-512-512 0-282.857 229.143-512 512-512zM865.714 772c53.143-73.143 85.143-162.857 85.143-260 0-241.714-197.143-438.857-438.857-438.857s-438.857 197.143-438.857 438.857c0 97.143 32 186.857 85.143 260 20.571-102.286 70.286-186.857 174.857-186.857 46.286 45.143 109.143 73.143 178.857 73.143s132.571-28 178.857-73.143c104.571 0 154.286 84.571 174.857 186.857zM731.429 402.286c0-121.143-98.286-219.429-219.429-219.429s-219.429 98.286-219.429 219.429 98.286 219.429 219.429 219.429 219.429-98.286 219.429-219.429z"></path>
                    </svg></div>
                </div>
              </div>
              <ul data-thq="thq-dropdown-list" class="admin-page-header2-dropdown-list">
                <li data-thq="thq-dropdown" class="admin-page-header2-dropdown1 list-item"><a href="login.php">
                    
                  </a></li>
              </ul>
            </div>
          </div>
        </div>
      </header>

      <?php
      $id = Session::get("cmrId");
      $getdata = $cmr->getCustomerData($id);
      if ($getdata) {
        while ($result = $getdata->fetch_assoc()) {


      ?>
          <?php
          if (isset($updateCmr)) {
            echo $updateCmr;
            $url = "login-and-security.php";
            echo "<SCRIPT LANGUAGE='javascript'>";
            echo "location.href='$url'";
            echo "</SCRIPT>";
          } ?>
          <form action="" method="post">
            <div class="edit-email-container1">
              <input name="email" type="text" class="edit-email-textinput input" value="<?php echo $result['email']; ?>" />
            </div>
              <input type="submit" class="edit-email-navlink button" name="submit" value="Save" />
          </form>
          <span class="edit-email-text">
            <span>Current email address: "<?php echo $result['email']; ?>"</span>
            <br />
            <br />
            <span>Enter the new email address you would like to associate with your account below. </span>
            <br />
            <span>We will send a One Time Password (OTP) to that address.</span>
          </span>
          <h1 class="edit-email-text7">Change your email address</h1>
          <span class="edit-email-text8">New Email Address</span>
    </div>
  </div>
<?php }
      } ?>
<script defer="" src="https://unpkg.com/@teleporthq/teleport-custom-scripts"></script>
</body>

</html>