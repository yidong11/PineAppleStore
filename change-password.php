<?php include 'inc/header.php'; ?>
<body
    ><div
      ><link href="./change-password.css" rel="stylesheet" />
      <?php 
    		    $id = Session::get("cmrId");
    		    $getdata = $cmr->getCustomerData($id);
    		    if ($getdata) {
    			    while ($result = $getdata->fetch_assoc()) {
    		

    		 ?>
          <form action="" method="post">
      <div
        class="change-password-container"
        ><div class="component1-container component1-root-class-name"
          ><div class="component1-container1"
            ><span class="component1-text"
              ><span
                >To change the password for your PineApple account, use this
                form.</span
              ></span
            ><span class="component1-text1"><span>New Password</span></span
            ><input type="text" class="component1-textinput input" /></div
          ><a href="login-and-security.html" class="component1-navlink button"
            ><span>Confirm</span></a
          ><h1 class="component1-text2"><span>Change Password</span></h1
          ><span class="component1-text3"><span>Change Password</span></span
          ><span class="component1-text4"><span>&gt; </span></span
          ><span class="component1-text5"><span>&gt; </span></span
          ><a href="login-and-security.html" class="component1-navlink1"
            ><span>&nbsp; &nbsp; </span
            ><span class="component1-text7">Login &amp; Security</span></a
          ><a href="personal-info.html" class="component1-navlink2"
            ><span>Your Account </span></a
          ></div

        >
        </form>
          <?php }} ?>
          </div
      ></div
    >
    <script
      defer=""
      src="https://unpkg.com/@teleporthq/teleport-custom-scripts"
    ></script></body
></html>