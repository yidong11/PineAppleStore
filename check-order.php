<!-- 
  This file list all the orders of the customer.
  Including the pending, delivering, and completed orders.
 -->
<?php include 'inc/header.php';?>

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
<?php include_once './helpers/Formate.php';?>

<?php
  // session_start();
  $cmrId = Session::get("cmrId");
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updateCmr = $cmr->rateUpdate($_POST,$cmrId);
  }
?> 

<?php 
  if (isset($_GET['customerId'])) {
    $id = $_GET['customerId'];
    $confirm = $ct->productShiftConfirm($id);
  }
?>


          <link href="./check-order.css" rel="stylesheet" />
          <div class="check-order-container02">
            <h1 class="check-order-text">Your orders</h1>
          </div>
          <div class="check-order-container03">
            <a href="check-order.php" class="check-order-text1 navbar-link">All Orders</a>
            <a href="delivery.php"  class="check-order-navlink navbar-link">Delivering Order</a>
            <a
              href="not-yet-dispatched.php"
              class="check-order-text2 navbar-link">
              Not yet dispatched
            </a>
            <a href="delivered.php"  class="check-order-text9 navbar-link">Completed Order</a>
          </div>
          <div class="check-order-container04">
            <div class="check-order-container06">
              <table class="data display datatable" id="example" style="width: 1200px">
    
                <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Date</th>
                    <th>Status</th>
                  </tr>
                </thead>

                <tbody>

                  <?php
                  // get all the ordered products of the currently logged in customer
                    $cmrId = Session::get("cmrId");
                    $qty = 0;
                    $getPd = $ct->getOrderedProduct($cmrId);
                    if ($getPd) {
                      $i = 0;
                      $sum = 0;
                      $qty = 0;
                      while ($result = $getPd->fetch_assoc()) {
                        $i++;
                        $qty++;
                  ?>
                  <tr class="odd gradeX" style="margin:auto;text-align:center">
                    <form action="" method="post">
                      <td><input type = "hidden" name = "id" value = <?php echo $result['id'];?>><?php echo $result['id'];?></td>
                      <td><?php echo $result['productName'];?></td>
                      <td>HKD <?php echo $result['price'];?></td>
                      <td><?php echo $result['quantity'];?></td>
                      <td><img src="admin/<?php echo $result['image'];?>" height="50px"></td>
                      <td><?php echo $result['date'];?>
                      </td>
                      <td>
                        <?php 
                          if($result['status'] == 3){?>
                            <div>Rated</div>
                          <?php }
                          else if($result['status'] == 0){?>
                            <div>Pending</div>
                          <?php }
                          else if($result['status'] == 1){
                            ?>
                            <div>Delivering</div>
                          <?php }
                          else if($result['status'] == 2){
                          ?>
                              <div class = "group" style="text-align:center;margin:auto">
                                <select name = "rate" size="1">
                                  <option type = "int" value= 5>5</option>
                                  <option type = "int" value= 4>4</option>
                                  <option type = "int" value= 3>3</option>
                                  <option type = "int" value= 2>2</option>
                                  <option type = "int" value= 1>1</option>
                                </select>
                                <img src="./images/star.png" height="20px">
                                <input type="submit" name="submit" value="&nbsp; Rate" class="navlink navbar-link">
                              </div>
                        <?php }?>
                      </td>
                    </form>
                  </tr>
                  <?php } } ?>
                </tbody>
	            </table>
            </div>
            <div class="check-order-container05">
              <label class="check-order-text3"><?php echo $qty;?> Order</label>
              <!--<span class="check-order-text4">placed in</span>
              <select size="1" class="check-order-select">
                <option value="Option 3">all the time</option>
                <option value="Option 1">past a week</option>
                <option value="Option 1">past a month</option>
                <option value="Option 1">past three months</option>
                <option value="Option 2">past six months</option>
                <option value="Option 2">past a year</option>
              </select>-->
            </div>

    <script type="text/javascript">
      $(document).ready(function () {
          setupLeftMenu();
          $('.datatable').dataTable();
      setSidebarHeight();
      });
    </script>

<?php include 'inc/footer_clean.php';?>