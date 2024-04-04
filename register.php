<?php include 'inc/header.php'; ?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
  if ($_POST['pass'] != $_POST['confirm_pass']) {
      echo "<span class='error'>Password and Confirm Password do not match!</span>";
  } else {
      $customerReg = $cmr->customerRegistration($_POST);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Register - PineApple</title>
  <meta property="og:title" content="Register - PineApple" />
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
    <link href="./register.css" rel="stylesheet" />

    <div class="register-container">
      <div class="register-container1">
      <?php
      if (isset($customerReg)) {
        echo $customerReg;
      }
      ?>
        <div class="register-container2">
          <span class="register-text">Registration</span>
          <form action="" method="post">
          <div class="register-container3">
            <input name="name" type="text" placeholder="Name" class="register-textinput input" />
            <input name="email" type="text" placeholder="E-mail" class="register-textinput1 input" />
            <input name="pass" type="text" placeholder="Password" class="register-textinput2 input" />
            <input name="confirm_pass" type="text" placeholder="Confirm Password" class="register-textinput3 input" />
          </div>
          <div class="register-navlink button">
              <div><button class="register-text1", name="register">Register</button></div>
          </div>
          </form>
          <div class="register-container4">
            <span>Already have an account?&nbsp;</span>
            <a href="login.php" class="register-navlink1">Login</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script defer="" src="https://unpkg.com/@teleporthq/teleport-custom-scripts"></script>
</body>

</html>

<?php include 'inc/footer.php'; ?>