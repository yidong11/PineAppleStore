<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Formate.php');

?>


<?php

class Cart{
	
private $db;
private $fm;

	public function __construct() {
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function addToCart($quantity, $id){
		if ($quantity < 0) {
			$msg = "Invalid Quantity!";
			return $msg;
		}
		elseif ($quantity == 0) {
			$msg = "The product is sold out!";
			return $msg;
		}

		$quantity = $this->fm->validation($quantity);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		$productId = mysqli_real_escape_string($this->db->link, $id);

		$sId  = session_id();

		$squery = "SELECT * FROM table_product WHERE productId = '$productId'";
		$result = $this->db->select($squery)->fetch_assoc();

		$productName = $result['productName'];
		$price = $result['price'];
		$image = $result['image'];
		$rate = $result['rate'];

		$chquery = "SELECT * FROM table_shoppingcart WHERE productId = '$productId' AND sId='$sId'";
		$getPro = $this->db->select($chquery);
		if ($getPro) {
			$msg = "Product already added!";
			return $msg;
		} else {
    		$query = "INSERT INTO table_shoppingcart(sId,productId,productName,price,quantity,image,rate) VALUES('$sId','$productId','$productName','$price','$quantity','$image','$rate') ";
			$inserted_row = $this->db->insert($query);
			if ($inserted_row) {
				$msg = "Product added to cart!";
				return $msg;
			} else{
				$msg = "Product not added to cart!";
				return $msg;
			}
		}
	}

	public function getCartProduct(){

		$sId  = session_id();
		$query = "SELECT * FROM table_shoppingcart WHERE sId = '$sId'";
		$result = $this->db->select($query);
		return $result;
		

	}

	public function updateCartQuantity($cartId,$quantity){

		$cartId = mysqli_real_escape_string($this->db->link, $cartId);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);

		$query = "UPDATE table_shoppingcart

		SET
		quantity = '$quantity' 
		WHERE cartId = '$cartId'";

		$updated_row = $this->db->update($query);
		if ($updated_row) {
			echo "<script>window.location = 'shopping-cart-page.php';</script>";
		} else{
			$msg = "<span class='error'>Quantity Not Updated !</span>";
			return $msg;
		}
	}


	public function delProductByCart($delId){

		$delId = mysqli_real_escape_string($this->db->link, $delId);
		$query = "DELETE FROM table_shoppingcart WHERE cartId = '$delId'";
		$deldata = $this->db->delete($query);
		if ($deldata) {
			echo "<script>window.location = 'shopping-cart-page.php';</script>";
		} else {
			$msg = "<span class='error'>Product Not Deleted !</span>";
			return $msg;
		}
	}

	public function checkCartTable(){
		$sId  = session_id();
		$query = "SELECT * FROM table_shoppingcart WHERE sId = '$sId'";
		$result = $this->db->select($query);
		return $result;
	}

	public function delCustomerCart(){
		$sId  = session_id();
		$query = "DELETE FROM table_shoppingcart WHERE sId = '$sId'";
		$this->db->delete($query);
	}

	public function orderProduct($cmrId){
		$bool = True;
		$sId  = session_id();
	    $query = "SELECT * FROM table_shoppingcart WHERE sId = '$sId'";
		$getPro = $this->db->select($query);
		if ($getPro) {
			while ($result = $getPro->fetch_assoc()) {
				$productId = $result['productId'];
				$productName = $result['productName'];
				$quantity = $result['quantity'];
				$price = $result['price'] * $quantity;
				$image = $result['image'];

				$query = "SELECT * FROM table_product WHERE productId = '$productId'";
				$getProd = $this->db->select($query);
				if ($getProd) {
					while ($result = $getProd->fetch_assoc()) {
						$stock = $result['stock'] - $quantity;
						if($stock < 0){
							$bool = False;
							continue;
						}
						$query = "UPDATE table_product
									SET	
									stock = $stock
									Where productId = $productId";
						$inserted_row = $this->db->update($query);
					}
				}
				if(!$bool)
					continue;
				$query = "INSERT INTO table_order(cmrId,productId,productName,quantity,price,image) VALUES('$cmrId','$productId','$productName','$quantity','$price','$image') ";
				$inserted_row = $this->db->insert($query);
			}
		}
		return $bool;
	}

	public function getDeliveryProduct($cmrId){
		$query = "SELECT * FROM table_order WHERE cmrId = '$cmrId' and status = 1 ORDER BY date DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function getNotDispatchedProduct($cmrId){
		$query = "SELECT * FROM table_order WHERE cmrId = '$cmrId' and status = 0 ORDER BY date DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function getDeliveredProduct($cmrId){
		$query = "SELECT * FROM table_order WHERE cmrId = '$cmrId' and (status = 2 or status = 3) ORDER BY date DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function getOrderedProduct($cmrId){
		$query = "SELECT * FROM table_order WHERE cmrId = '$cmrId' ORDER BY date DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function getAllOrderProduct(){
		$query = "SELECT * FROM table_order ORDER BY date DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function delOrderById($id){
		$query = "DELETE FROM table_order WHERE id = '$id'";
		$deldata = $this->db->delete($query);
		if ($deldata) {
			$msg = "<span class='success'>Order Deleted Successfully.</span>";
			return $msg;
		} else{
			$msg = "<span class='error'>Order Not Deleted !</span>";
			return $msg;
		}
	}
	public function getOrderById($id){
		$query = "SELECT * FROM table_order WHERE id = '$id'";
		$result = $this->db->select($query);
		return $result;
	}

	public function updateOrderStatus($id, $status){
		$id = mysqli_real_escape_string($this->db->link, $id);
		$status = mysqli_real_escape_string($this->db->link, $status);

		$query = "UPDATE table_order
		SET status ='$status'
		WHERE id = '$id' ";

		$updated_row = $this->db->update($query);
		if ($updated_row) {
			header("Location:order-list.php");
		} else{
			$msg = "<span class='error'>Not Updated !</span>";
			return $msg;
		}
	}

	public function productShifted($id){
		$id = mysqli_real_escape_string($this->db->link, $id);

		$query = "UPDATE table_order
		SET status ='1'
		WHERE id = '$id' ";

		$updated_row = $this->db->update($query);
		if ($updated_row) {
			$msg = "<span class='success'>Updated Successfully.</span>";
			return $msg;
		} else{
			$msg = "<span class='error'>Not Updated !</span>";
			return $msg;
		}

	}

	public function productShiftConfirm($id){
		$id = mysqli_real_escape_string($this->db->link, $id);

		$query = "UPDATE table_order
		SET status ='2'
		WHERE id = '$id' ";

		$updated_row = $this->db->update($query);
		if ($updated_row) {
			$msg = "<span class='success'>Updated Successfully.</span>";
			return $msg;
		} else{
			$msg = "<span class='error'>Not Updated !</span>";
			return $msg;
		}
	}
}

?>