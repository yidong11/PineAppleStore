<!-- 
  File name: personal-info.php
  File description: This file allows the user to view and edit their personal information
 -->
<?php include 'inc/header.php'; ?>

<div
      ><link href="./personal-info.css" rel="stylesheet" /><div
        class="personal-info-container"
        >
      <div class="personal-info-container">
      <?php 
    		    $id = Session::get("cmrId");
    		    $getdata = $cmr->getCustomerData($id);
    		    if ($getdata) {
    			    while ($result = $getdata->fetch_assoc()) {
    		

    		 ?>
          <form action="" method="post">
        <div class="personal-info-container1">
          <h1 class="personal-info-text">Your Account</h1>
        </div>
        <?php 
					      if (isset($updateCmr)) {
					        echo "<tr><td colspan='2'>".$updateCmr."</td></tr>";
					      }
					    ?>
        <div class="personal-info-container2">
          <a href="login-and-security.php" class="personal-info-navlink">
            <div
              class="personal-info-options-container personal-info-options-root-class-name3"
            >
              <div class="personal-info-options-container1">
                <img
                  alt="image"
                  src="public/Pineapple Icons/security-200h.png"
                  class="personal-info-options-image"
                />
                <div class="personal-info-options-container2">
                  <span class="personal-info-options-text">
                    <span>Login &amp; Security</span>
                  </span>
                  <span class="personal-info-options-text1">
                    <span>Edit name, Email or password</span>
                  </span>
                </div>
              </div>
            </div>
          </a>
          <a href="my-address.php" class="personal-info-navlink1">
            <div
              class="personal-info-options-container personal-info-options-root-class-name4"
            >
              <div class="personal-info-options-container1">
                <img
                  alt="image"
                  src="public/Pineapple Icons/fshub_address_book-200w.png"
                  class="personal-info-options-image"
                />
                <div class="personal-info-options-container2">
                  <span class="personal-info-options-text">
                    <span>Your Address</span>
                  </span>
                  <span class="personal-info-options-text1">
                    <span>Edit or view your address</span>
                  </span>
                </div>
              </div>
            </div>
          </a>
          <a href="check-order.php" class="personal-info-navlink2">
            <div
              class="personal-info-options-container personal-info-options-root-class-name1"
            >
              <div class="personal-info-options-container1">
                <img
                  alt="image"
                  src="public/Pineapple Icons/order-200h.png"
                  class="personal-info-options-image"
                />
                <div class="personal-info-options-container2">
                  <span class="personal-info-options-text">
                    <span>Your Orders</span>
                  </span>
                  <span class="personal-info-options-text1">
                    <span>
                      Track your order and rate finished orders
                    </span>
                  </span>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      </form>
    <?php }} ?>
    </div>
    <script
      defer=""
      src="https://unpkg.com/@teleporthq/teleport-custom-scripts"
    ></script>

</html>
<?php include 'inc/footer_clean.php'; ?>  
