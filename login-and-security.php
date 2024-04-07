<?php include 'inc/header.php'; ?>



<body
    ><div
      ><link href="./login-and-security.css" rel="stylesheet" />
      <?php 
    		    $id = Session::get("cmrId");
    		    $getdata = $cmr->getCustomerData($id);
    		    if ($getdata) {
    			    while ($result = $getdata->fetch_assoc()) {
    		

    		 ?>
          <form action="" method="post">
      <div
        class="login-and-security-container"
        >
        <?php 
					      if (isset($updateCmr)) {
					        echo "<tr><td colspan='2'>".$updateCmr."</td></tr>";
					      }
					    ?>
          <div class="app-component-container app-component-root-class-name"
          ><div class="app-component-container1"
            ><a href="edit-email.php" class="app-component-navlink button"
              ><span>Edit</span></a
            ></div
          ><div class="app-component-container2"></div
          ><div class="app-component-container3"
            ><a href="edit-name.php" class="app-component-navlink1 button"
              ><span>Edit </span></a
            ><input
              name="name"
              type="text"
              disabled="true"
              placeholder="<?php echo $result['name'];?>"
              class="app-component-textinput input" /></div
          ><a href="change-password.php" class="app-component-navlink2 button"
            ><span>Edit</span></a
          ><span class="app-component-text"
            ><span>&gt;&nbsp; &nbsp; </span
            ><span class="app-component-text2">Login &amp; Security</span></span
          ><a href="personal-info.php" class="app-component-navlink3"
            ><span>Your Account </span></a
          ><span class="app-component-text3"><span>Email</span></span
          ><span class="app-component-text4"><span>Password</span></span
          ><span class="app-component-text5"><span>Name</span></span
          ><input
            name="email"
            type="text"
            disabled="true"
            placeholder="<?php echo $result['email'];?>"
            class="app-component-textinput1 input" /><input
            name="code"
            type="text"
            disabled="true"
            placeholder="*********"
            class="app-component-textinput2 input" /></div>
            </form>
          <?php }} ?>  
          </body>         
<?php include 'inc/footer_clean.php'; ?>      

