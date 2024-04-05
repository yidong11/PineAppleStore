<?php include 'inc/header.php';?>
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
<?php include_once './helpers/Formate.php';?>

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
            <span class="check-order-text1 navbar-link">Orders</span>
            <span class="check-order-text2 navbar-link">Delivery Order</span>
            <a
              href="not-yet-dispatched.html"
              class="check-order-navlink navbar-link">
              Not yet dispatched
            </a>
            <a
              href="cancelled-order.html"
              class="check-order-navlink1 navbar-link">
              Cancelled Order
            </a>
          </div>
          <div class="check-order-container04">
            <div class="check-order-container05">
              <label class="check-order-text3">1 order</label>
              <span class="check-order-text4">placed in</span>
              <select size="1" class="check-order-select">
                <option value="Option 1">past a week</option>
                <option value="Option 1">past a month</option>
                <option value="Option 1">past three months</option>
                <option value="Option 2">past six months</option>
                <option value="Option 2">past a year</option>
                <option value="Option 3">all the time</option>
              </select>
            </div>
            <div class="check-order-container06">
              <table class="data display datatable" id="example" style="width: 1200px;">
    
                <thead>
                  <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Total</th>
                  </tr>
                </thead>

                <tbody>

                  <?php
                    $cmrId = Session::get("cmrId");
                    $getPd = $ct->getOrderedProduct($cmrId);
                    if ($getPd) {
                      $i = 0;
                      $sum = 0;
                      $qty = 0;
                      while ($result = $getPd->fetch_assoc()) {
                        $i++;
                  ?>
                  <tr class="odd gradeX">
                    <td><?php echo $result['productId'];?></td>
                    <td><?php echo $result['productName'] ;?></td>
                    <td>HKD <?php echo $result['price'] ;?></td>
                    <td><?php echo $result['quantity'] ;?></td>
                    <td><img src="<?php echo $result['image'] ;?>" height="50px"></td>
                    <td>HKD <?php
                        $total = $result['price'] * $result['quantity'];
                        echo $total;?>
                    </td>
                  </tr>
                  <?php 
                    $qty = $qty + $result['quantity'];
                    $sum = $sum + $total;
                    Session::set("qty",$qty);
                    Session::set("sum",$sum);
                  ?>
                  
                  <?php } } ?>
                  
                </tbody>
	            </table>
            </div>

    <script type="text/javascript">
      $(document).ready(function () {
          setupLeftMenu();
          $('.datatable').dataTable();
      setSidebarHeight();
      });
    </script>

<?php include 'inc/footer_clean.php';?>