<!-- 
    File name: storage.php
    File description: A page that displays a message to the customer that some of the products they ordered are currently in short supply
 -->
<?php include 'inc/header.php';?>

<?php 
$login = Session::get("cuslogin");
if ($login == false) {
    header("Location:login.php");
}
 ?>
<style>
.psuccess{width: 500px;min-height: 200px;text-align: center;border: 1px solid #ddd;margin: 0 auto;padding: 20px;}	
.psuccess h2{border-bottom: 1px solid #ddd;margin-bottom: 20px;padding-bottom: 10px;}
.psuccess p{line-height: 25px;text-align: left;font-size: 18px;}

</style>
<link href="./storage.css" rel="stylesheet" />
<div class="main">
    <div class="content">
    	<div class="section group">
            <div class="psuccess">
                <h2>Shortage of goods</h2>
                <h1>Thanks for Purchase. We are sorry to inform you that some of your products are currently in short supply. Here is your order details   
                    <button type="button">
                    <a href="check-order.php" class="navlink">
                        ...Visit here...
                    </a>
                    </button>
                </h1>
            </div>
 		</div>
 	</div>
</div>
<?php include 'inc/footer.php';?>