<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Database.php');
include_once($filepath . '/../helpers/Formate.php');

?>

<?php
/**
 * The Cart class represents a shopping cart in an e-commerce application.
 */
class Cart
{

	private $db;
	private $fm;

	/**
	 * Cart constructor.
	 * Initializes a new instance of the Cart class.
	 */
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	/**
	 * Adds a product to the cart.
	 *
	 * @param int $quantity The quantity of the product to add.
	 * @param int $id The ID of the product to add.
	 * @return string The message indicating the result of the operation.
	 */
	public function addToCart($quantity, $id)
	{
		// Validate the quantity
		if ($quantity < 0) {
			$msg = "Invalid Quantity!";
			return $msg;
		} elseif ($quantity == 0) {
			$msg = "The product is sold out!";
			return $msg;
		}

		$quantity = $this->fm->validation($quantity);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		$productId = mysqli_real_escape_string($this->db->link, $id);

		$sId  = session_id();

		// Get the product details from the database
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
			// Insert the product into the cart
			$query = "INSERT INTO table_shoppingcart(sId,productId,productName,price,quantity,image,rate) VALUES('$sId','$productId','$productName','$price','$quantity','$image','$rate') ";
			$inserted_row = $this->db->insert($query);
			if ($inserted_row) {
				$msg = "Product added to cart!";
				return $msg;
			} else {
				$msg = "Product not added to cart!";
				return $msg;
			}
		}
	}

	/**
	 * Retrieves the products in the cart based on the session ID.
	 *
	 * @return mixed The result of the query.
	 */
	public function getCartProduct()
	{
		$sId  = session_id();
		$query = "SELECT * FROM table_shoppingcart WHERE sId = '$sId'";
		$result = $this->db->select($query);
		return $result;
	}

	/**
	 * Updates the quantity of a product in the cart.
	 *
	 * @param int $cartId The ID of the cart item.
	 * @param int $quantity The new quantity of the product.
	 * @return string The message indicating the result of the operation.
	 */
	public function updateCartQuantity($cartId, $quantity)
	{
		$cartId = mysqli_real_escape_string($this->db->link, $cartId);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);

		$query = "UPDATE table_shoppingcart
		SET
		quantity = '$quantity' 
		WHERE cartId = '$cartId'";

		$updated_row = $this->db->update($query);
		if ($updated_row) {
			echo "<script>window.location = 'shopping-cart-page.php';</script>";
		} else {
			$msg = "<span class='error'>Quantity Not Updated !</span>";
			return $msg;
		}
	}

	/**
	 * Deletes a product from the cart.
	 *
	 * @param int $delId The ID of the cart item to delete.
	 * @return string The message indicating the result of the operation.
	 */
	public function delProductByCart($delId)
	{
		$delId = mysqli_real_escape_string($this->db->link, $delId);
		$query = "DELETE FROM table_shoppingcart WHERE cartId = '$delId'";
		$deldata = $this->db->delete($query);
		if ($deldata) {
			// if the product is deleted successfully, redirect to the shopping cart page
			echo "<script>window.location = 'shopping-cart-page.php';</script>";
		} else {
			$msg = "<span class='error'>Product Not Deleted !</span>";
			return $msg;
		}
	}

	/**
	 * Checks if the cart table is empty.
	 *
	 * @return mixed The result of the query.
	 */
	public function checkCartTable()
	{
		$sId  = session_id();
		$query = "SELECT * FROM table_shoppingcart WHERE sId = '$sId'";
		$result = $this->db->select($query);
		return $result;
	}

	/**
	 * Deletes all products from the cart for the current session.
	 */
	public function delCustomerCart()
	{
		$sId  = session_id();
		$query = "DELETE FROM table_shoppingcart WHERE sId = '$sId'";
		$this->db->delete($query);
	}

	/**
	 * Places an order for the products in the cart.
	 *
	 * @param int $cmrId The ID of the customer placing the order.
	 * @return bool True if the order is placed successfully, false otherwise.
	 */
	public function orderProduct($cmrId)
	{
		$bool = True;
		$sId  = session_id();
		$query = "SELECT * FROM table_shoppingcart WHERE sId = '$sId'";
		$getPro = $this->db->select($query);
		if ($getPro) {
			while ($result = $getPro->fetch_assoc()) {
				// For each product in the cart, place an order
				$productId = $result['productId'];
				$productName = $result['productName'];
				$quantity = $result['quantity'];
				$price = $result['price'] * $quantity;
				$image = $result['image'];

				$query = "SELECT * FROM table_product WHERE productId = '$productId'";
				$getProd = $this->db->select($query);
				if ($getProd) {
					while ($result = $getProd->fetch_assoc()) {
						// Update the stock of the product
						$stock = $result['stock'] - $quantity;
						if ($stock < 0) {
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
				if (!$bool)
					continue;
				// Insert the order into the table_order
				$query = "INSERT INTO table_order(cmrId,productId,productName,quantity,price,image) VALUES('$cmrId','$productId','$productName','$quantity','$price','$image') ";
				$inserted_row = $this->db->insert($query);
			}
		}
		return $bool;
	}

	/**
	 * Retrieves the products that have been delivered to a customer.
	 *
	 * @param int $cmrId The ID of the customer.
	 * @return mixed The result of the query.
	 */
	public function getDeliveryProduct($cmrId)
	{
		$query = "SELECT * FROM table_order WHERE cmrId = '$cmrId' and status = 1 ORDER BY date DESC";
		$result = $this->db->select($query);
		return $result;
	}

	/**
	 * Retrieves the products that have not been dispatched to a customer.
	 *
	 * @param int $cmrId The ID of the customer.
	 * @return mixed The result of the query.
	 */
	public function getNotDispatchedProduct($cmrId)
	{
		$query = "SELECT * FROM table_order WHERE cmrId = '$cmrId' and status = 0 ORDER BY date DESC";
		$result = $this->db->select($query);
		return $result;
	}

	/**
	 * Retrieves the products that have been delivered or cancelled for a customer.
	 *
	 * @param int $cmrId The ID of the customer.
	 * @return mixed The result of the query.
	 */
	public function getDeliveredProduct($cmrId)
	{
		$query = "SELECT * FROM table_order WHERE cmrId = '$cmrId' and (status = 2 or status = 3) ORDER BY date DESC";
		$result = $this->db->select($query);
		return $result;
	}

	/**
	 * Retrieves all the products that have been ordered by a customer.
	 *
	 * @param int $cmrId The ID of the customer.
	 * @return mixed The result of the query.
	 */
	public function getOrderedProduct($cmrId)
	{
		$query = "SELECT * FROM table_order WHERE cmrId = '$cmrId' ORDER BY date DESC";
		$result = $this->db->select($query);
		return $result;
	}

	/**
	 * Retrieves all the ordered products.
	 *
	 * @return mixed The result of the query.
	 */
	public function getAllOrderProduct()
	{
		$query = "SELECT * FROM table_order ORDER BY date DESC";
		$result = $this->db->select($query);
		return $result;
	}

	/**
	 * Deletes an order by its ID.
	 *
	 * @param int $id The ID of the order to delete.
	 * @return string The message indicating the result of the operation.
	 */
	public function delOrderById($id)
	{
		$query = "DELETE FROM table_order WHERE id = '$id'";
		$deldata = $this->db->delete($query);
		if ($deldata) {
			$msg = "<span class='success'>Order Deleted Successfully.</span>";
			return $msg;
		} else {
			$msg = "<span class='error'>Order Not Deleted !</span>";
			return $msg;
		}
	}

	/**
	 * Retrieves an order by its ID.
	 *
	 * @param int $id The ID of the order.
	 * @return mixed The result of the query.
	 */
	public function getOrderById($id)
	{
		$query = "SELECT * FROM table_order WHERE id = '$id'";
		$result = $this->db->select($query);
		return $result;
	}

	/**
	 * Updates the status of an order.
	 *
	 * @param int $id The ID of the order.
	 * @param int $status The new status of the order.
	 * @return string The message indicating the result of the operation.
	 */
	public function updateOrderStatus($id, $status)
	{
		$id = mysqli_real_escape_string($this->db->link, $id);
		$status = mysqli_real_escape_string($this->db->link, $status);

		$query = "UPDATE table_order
		SET status ='$status'
		WHERE id = '$id' ";

		$updated_row = $this->db->update($query);
		if ($updated_row) {
			header("Location:order-list.php");
		} else {
			$msg = "<span class='error'>Not Updated !</span>";
			return $msg;
		}
	}

	/**
	 * Marks a product as shifted.
	 *
	 * @param int $id The ID of the order.
	 * @return string The message indicating the result of the operation.
	 */
	public function productShifted($id)
	{
		$id = mysqli_real_escape_string($this->db->link, $id);

		$query = "UPDATE table_order
		SET status ='1'
		WHERE id = '$id' ";

		$updated_row = $this->db->update($query);
		if ($updated_row) {
			$msg = "<span class='success'>Updated Successfully.</span>";
			return $msg;
		} else {
			$msg = "<span class='error'>Not Updated !</span>";
			return $msg;
		}
	}

	/**
	 * Confirms the product shift.
	 *
	 * @param int $id The ID of the order.
	 * @return string The message indicating the result of the operation.
	 */
	public function productShiftConfirm($id)
	{
		$id = mysqli_real_escape_string($this->db->link, $id);

		$query = "UPDATE table_order
		SET status ='2'
		WHERE id = '$id' ";

		$updated_row = $this->db->update($query);
		if ($updated_row) {
			$msg = "<span class='success'>Updated Successfully.</span>";
			return $msg;
		} else {
			$msg = "<span class='error'>Not Updated !</span>";
			return $msg;
		}
	}
}

?>