<?php include 'inc/header.php'; ?>

      <div>
        <link href="./my-address.css" rel="stylesheet" /><div
        class="my-address-container"
        ><span class="my-address-text05"
          ><span>&gt;&nbsp; &nbsp; </span
          ><span class="my-address-text07">Your Addresses</span></span
        ><a href="personal-info.php" class="my-address-navlink3"
          >Your Account </a
        ><h1 class="my-address-text08">Your Addresses</h1
        ><a href="change-address1.php" class="my-address-navlink4 button"
          >Add New Address</a
        >
        <?php 
    		    $id = Session::get("cmrId");
    		    $getdata = $cmr->getCustomerData($id);
    		    if ($getdata) {
    			    while ($result = $getdata->fetch_assoc()) {
    		

    		 ?>
          <form action="" method="post">
          <?php 
					      if (isset($updateCmr)) {
					        echo "<tr><td colspan='2'>".$updateCmr."</td></tr>";
					      }
					    ?>
            <div class="my-address-container03"
          ><div class="my-address-container04"
            ><div class="my-address-container05"
              ><div class="my-address-container06"
                ><span class="my-address-text09">User ID:&nbsp;</span></div
              ><div class="my-address-container07"
                ><input
                  name="id"
                  type="text"
                  disabled="true"
                  placeholder="1155173835"
                  value="<?php echo $result['id'];?>"
                  class="my-address-textinput1 input" /></div></div
            ><div class="my-address-container08"
              ><div class="my-address-container09"
                ><span class="my-address-text10">User Name:&nbsp;</span></div
              ><div class="my-address-container10"
                ><input
                  name="name"
                  type="text"
                  disabled="true"
                  value="<?php echo $result['name'];?>"
                  class="my-address-textinput2 input" /></div></div
            ><div class="my-address-container11"
              ><div class="my-address-container12"
                ><span class="my-address-text11">User Address:&nbsp;</span></div
              ><div class="my-address-container13"
                ><input
                  name="address"
                  type="text"
                  disabled="true"
                  value="<?php echo $result['address'];?>"
                  class="my-address-textinput3 input" /></div></div
            ><div class="my-address-container14"
              ><div class="my-address-container15"
                ><span class="my-address-text12"
                  >User Phone Number:&nbsp;</span
                ></div
              ><div class="my-address-container16"
                ><input
                  name="phone"
                  type="text"
                  disabled="true"
                  value="<?php echo $result['phone'];?>"
                  class="my-address-textinput4 input" /></div></div></div></div>
                  <?php }} ?>
                  </div
    ></div>
    <script
      defer=""
      src="https://unpkg.com/@teleporthq/teleport-custom-scripts"
    ></script>

<?php include 'inc/footer.php'; ?>
