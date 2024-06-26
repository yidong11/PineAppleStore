<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Database.php');
include_once($filepath . '/../helpers/Formate.php');

?>

<?php
/**
 * The Customer class represents a customer in the PineAppleStore application.
 */
class Customer{
	
	private $db;
	private $fm;

	/**
	 * Constructs a new Customer object.
	 */
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	/**
	 * Registers a new customer.
	 *
	 * @param array $data The customer data.
	 * @return string The registration message.
	 */
	public function customerRegistration($data) {
		$name = mysqli_real_escape_string($this->db->link, $data['name']);
		$email = mysqli_real_escape_string($this->db->link, $data['email']);
		$pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));

		// Check if any field is empty
		if ($name == "" || $email == "" || $pass == "") {
			$msg = "<span class='error'>Fields must not be empty !</span>";
			return $msg;
		}

		$mailquery = "SELECT * FROM table_user WHERE email = '$email' LIMIT 1";
		$mailchk = $this->db->select($mailquery);

		// Check if email already exists
		if ($mailchk != false) {
			$msg = "<span class='error'>Email already exist !</span>";
			return $msg;
		} else {
			$query = "INSERT INTO table_user(name,email,pass) VALUES('$name','$email','$pass')";
			$inserted_row = $this->db->insert($query);

			// Check if customer data is inserted successfully
			if ($inserted_row) {
				$msg = "<span class='success'>Customer Data inserted Successfully.</span>";
				return $msg;
			} else {
				$msg = "<span class='error'>Customer Data Not inserted.</span>";
				return $msg;
			}
		}
	}

	/**
	 * Logs in a customer.
	 *
	 * @param array $data The login data.
	 * @return string The login message.
	 */
	public function customerLogin($data) {
		$email = mysqli_real_escape_string($this->db->link, $data['email']);
		$pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));

		// Check if email or password is empty
		if (empty($email) || empty($pass)) {
			$msg = "<span class='error'>Fields must not be empty !</span>";
			return $msg;
		}

		$query = "SELECT * FROM table_user WHERE email = '$email' AND pass = '$pass'";
		$result = $this->db->select($query);

		// Check if email and password match
		if ($result != false) {
			$value = $result->fetch_assoc();
			Session::set("cuslogin", true);
			Session::set("cmrId", $value['id']);
			Session::set("cmrName", $value['name']);
			header("Location:index.php");
		} else {
			$msg = "<span class='error'>Email or Password not matched !</span>";
			return $msg;
		}
	}

	/**
	 * Retrieves customer data by ID.
	 *
	 * @param int $id The customer ID.
	 * @return mixed The customer data.
	 */
	public function getCustomerData($id){
		$query = "SELECT * FROM table_user WHERE id = '$id'";
		$result = $this->db->select($query);
		return $result;
	}

	/**
	 * Retrieves all customers.
	 *
	 * @return mixed All customers data.
	 */
	public function getAllCustomer() {
		$query = "SELECT * FROM table_user ORDER BY id ASC";
		$result = $this->db->select($query);
		return $result;
	}

	/**
	 * Deletes a customer by ID.
	 *
	 * @param int $id The customer ID.
	 * @return string The deletion message.
	 */
	public function delCustomerById($id) {
		$query = "DELETE FROM table_user WHERE id = '$id'";
		$deldata = $this->db->delete($query);

		// Check if customer data is deleted successfully
		if ($deldata) {
			$msg = "<span class='success'>User Data Deleted Successfully.</span>";
			return $msg;
		} else {
			$msg = "<span class='error'>User Data Not Deleted !</span>";
			return $msg;
		}
	}

	/**
	 * Updates the rating for a customer.
	 *
	 * @param array $data The rating data.
	 * @param int $cmrId The customer ID.
	 * @return string The rating message.
	 */
	public function rateUpdate($data,$cmrId){
		$id = mysqli_real_escape_string($this->db->link, $data['id']);
		$rate = mysqli_real_escape_string($this->db->link, $data['rate']);

		$query = "SELECT * FROM table_order WHERE id = '$id'";
		$getOrder = $this->db->select($query);

		// Check if order exists
		if ($getOrder) {
			while ($resultOrder = $getOrder->fetch_assoc()) {
				$productId = $resultOrder['productId'];
				$status = $resultOrder['status'];

				if ($status == 3) {
					$msg = "<span class='error'>Already rated!</span>";
				} else {
					$query = "SELECT * FROM table_product WHERE productId = '$productId'";
					$resultProduct = $this->db->select($query)->fetch_assoc();
					$totalRate = $resultProduct['rate'] * $resultProduct['sales'] + $rate;
					$sales = $resultProduct['sales'] + 1;
					$rate = $totalRate / $sales;
					$query = "UPDATE table_product 
								SET
								rate = '$rate',
								sales = '$sales'
								WHERE productId = '$productId'";
					$updated_row = $this->db->update($query);

					// Check if rating is updated successfully
					if ($updated_row) {
						$query = "UPDATE table_order 
						SET
						status = 3
						WHERE id = '$id'";
						$this->db->update($query);
						$msg = "<span class='success'>Rate Successfully.</span>";
						return $msg;
					} else {
						$msg = "<span class='error'>Fail to rate!</span>";
						return $msg;
					}
				}
			}
		}
	}

	/**
	 * Updates customer data.
	 *
	 * @param array $data The customer data.
	 * @param int $cmrId The customer ID.
	 * @return string The update message.
	 */
	public function customerUpdate($data,$cmrId) {
		$name = mysqli_real_escape_string($this->db->link, $data['name']);
		$address = mysqli_real_escape_string($this->db->link, $data['address']);
		$city = mysqli_real_escape_string($this->db->link, $data['city']);
		$zip = mysqli_real_escape_string($this->db->link, $data['zip']);
		$country = mysqli_real_escape_string($this->db->link, $data['country']);
		$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
		$email = mysqli_real_escape_string($this->db->link, $data['email']);

		// Check if any field is empty
		if ($name == "" || $address == "" || $city == "" || $country == "" || $zip == "" || $phone == "" || $email == "") {
			$msg = "<span class='error'>Fields must not be empty !</span>";
			return $msg;
		} else {
			$query = "INSERT INTO table_user(name,address,city,country,zip,phone,email) VALUES('$name','$address','$city','$country','$zip','$phone','$email')";

			$query = "UPDATE table_user
			SET
			name = '$name',
			address = '$address', 
			city = '$city', 
			country = '$country', 
			zip = '$zip', 
			phone = '$phone', 
			email = '$email' 
			WHERE id = '$cmrId'";

			$updated_row = $this->db->update($query);

			// Check if customer data is updated successfully
			if ($updated_row) {
				$msg = "<span class='success'>Customer Data Updated Successfully.</span>";
				return $msg;
			} else {
				$msg = "<span class='error'>Customer Data Not Updated !</span>";
				return $msg;
			}
		}
	}

	/**
	 * Updates the customer's name.
	 *
	 * @param array $data The name data.
	 * @param int $cmrId The customer ID.
	 * @return string The update message.
	 */
	public function UpdateName($data,$cmrId) {
		$name = mysqli_real_escape_string($this->db->link, $data['name']);

		// Check if name is empty
		if ($name == "") {
			$msg = "<span class='error'>Fields must not be empty !</span>";
			return $msg;
		} else {
			$query = "UPDATE table_user
			SET
			name = '$name'
			WHERE id = '$cmrId'";

			$updated_row = $this->db->update($query);

			// Check if customer data is updated successfully
			if ($updated_row) {
				$msg = "<span class='success'>Customer Data Updated Successfully.</span>";
				return $msg;
			} else {
				$msg = "<span class='error'>Customer Data Not Updated !</span>";
				return $msg;
			}
		}
	}

	/**
	 * Updates the customer's email.
	 *
	 * @param array $data The email data.
	 * @param int $cmrId The customer ID.
	 * @return string The update message.
	 */
	public function UpdateEmail($data,$cmrId) {
		$email = mysqli_real_escape_string($this->db->link, $data['email']);

		// Check if email is empty
		if ($email == "") {
			$msg = "<span class='error'>Fields must not be empty !</span>";
			return $msg;
		} else {
			$query = "UPDATE table_user
			SET
			email = '$email'
			WHERE id = '$cmrId'";

			$updated_row = $this->db->update($query);

			// Check if customer data is updated successfully
			if ($updated_row) {
				$msg = "<span class='success'>Customer Data Updated Successfully.</span>";
				return $msg;
			} else {
				$msg = "<span class='error'>Customer Data Not Updated !</span>";
				return $msg;
			}
		}
	}

	/**
	 * Updates the customer's password.
	 *
	 * @param array $data The password data.
	 * @param int $cmrId The customer ID.
	 * @return string The update message.
	 */
	public function UpdatePassword($data,$cmrId) {
		$pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));

		// Check if password is empty
		if ($pass == "") {
			$msg = "<span class='error'>Fields must not be empty !</span>";
			return $msg;
		} else {
			$query = "UPDATE table_user
			SET
			pass = '$pass'
			WHERE id = '$cmrId'";

			$updated_row = $this->db->update($query);

			// Check if customer data is updated successfully
			if ($updated_row) {
				$msg = "<span class='success'>Customer Data Updated Successfully.</span>";
				return $msg;
			} else {
				$msg = "<span class='error'>Customer Data Not Updated !</span>";
				return $msg;
			}
		}
	}
}
?>