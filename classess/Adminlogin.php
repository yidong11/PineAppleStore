<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Session.php');
Session::checkLogin();

include_once($filepath . '/../lib/Database.php');
include_once($filepath . '/../helpers/Formate.php');

?>

<?php

/**
 * The Adminlogin class represents the functionality for admin login.
 */
class Adminlogin
{

	private $db;
	private $fm;

	/**
	 * Adminlogin constructor.
	 * Initializes the Database and Format objects.
	 */
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	/**
	 * Performs the admin login process.
	 *
	 * @param string $adminUser The admin username.
	 * @param string $adminPassword The admin password.
	 * @return string The login message.
	 */
	public function adminlogin($adminUser, $adminPassword)
	{
		// Validate the admin username and password
		$adminUser = $this->fm->validation($adminUser);
		$adminPassword = $this->fm->validation($adminPassword);

		$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
		$adminPassword = mysqli_real_escape_string($this->db->link, $adminPassword);

		if (empty($adminUser) || empty($adminPassword)) {
			$loginmsg = "Username or Password must not be empty !";
			return $loginmsg;
		} else {
			$query = "SELECT * FROM table_admin WHERE adminUser = '$adminUser'
			AND adminPassword = '$adminPassword'";

			$result = $this->db->select($query);

			if ($result != false) {
				// if the admin username and password match
				$value = $result->fetch_assoc();

				// Set the session variables
				Session::set("adminlogin", true);
				Session::set("adminId", $value['adminId']);
				Session::set("adminUser", $value['adminUser']);
				Session::set("adminName", $value['adminName']);

				// Redirect to the dashboard page after successful login
				header("Location:dashboard.php");
			} else {
				$loginmsg = "Username or Password not match !";
				return $loginmsg;
			}
		}
	}
}

?>