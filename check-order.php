<?php include 'inc/header.php';?>

<?php 
  if (isset($_GET['customerId'])) {
    $id = $_GET['customerId'];
    $confirm = $ct->productShiftConfirm($id);

  }
?>


          <link href="./check-order.css" rel="stylesheet" />
          <div class="check-order-container02">
            <h1 class="check-order-text">Your orders</h1>
            <input
              type="text"
              placeholder="Search all orders"
              class="check-order-input input"
            />
            <button type="button" class="check-order-button button">
              Search orders
            </button>
            <img
              alt="image"
              src="public/d4ea6a63_e775824_f774866d-200h.png"
              class="check-order-image"
            />
          </div>
          <div class="check-order-container03">
            <span class="check-order-text1 navbar-link">Orders</span>
            <span class="check-order-text2 navbar-link">Delivery Order</span>
            <a
              href="not-yet-dispatched.html"
              class="check-order-navlink navbar-link"
            >
              Not yet dispatched
            </a>
            <a
              href="cancelled-order.html"
              class="check-order-navlink1 navbar-link"
            >
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

    <script
      defer=""
      src="https://unpkg.com/@teleporthq/teleport-custom-scripts"
    ></script>
  </body>
</html>