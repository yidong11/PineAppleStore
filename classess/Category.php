<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Database.php');
include_once($filepath . '/../helpers/Formate.php');

?>

<?php
// Category class
class Category
{

	private $db;
	private $fm;

	// Category constructor
	public function __construct()
	{

		$this->db = new Database();
		$this->fm = new Format();
	}

	// catInsert function
	public function catInsert($catName)
	{
		$catName = $this->fm->validation($catName);
		$catName = mysqli_real_escape_string($this->db->link, $catName);


		if (empty($catName)) {
			$msg = "<span class='error'>Category field must not be empty !</span>";
			return $msg;
		} else {
			$query = "INSERT INTO table_category(catName) VALUES('$catName') ";
			$catinsert = $this->db->insert($query);
			if ($catinsert) {
				header("Location:category-list.php");
			} else {
				$msg = "<span class='error'>Category Not inserted.</span>";
				return $msg;
			}
		}
	}

	// getAllCat function
	public function getAllCat()
	{
		$query = "SELECT * FROM table_category ORDER BY catId ASC";
		$result = $this->db->select($query);
		return $result;
	}

	// getCatById function
	public function getCatById($id)
	{
		$query = "SELECT * FROM table_category WHERE catId = '$id'";
		$result = $this->db->select($query);
		return $result;
	}

	// catUpdate function
	public function catUpdate($catName, $id)
	{
		$catName = $this->fm->validation($catName);
		$catName = mysqli_real_escape_string($this->db->link, $catName);
		$id = mysqli_real_escape_string($this->db->link, $id);

		if (empty($catName)) {
			$msg = "<span class='error'>Category field must not be empty !</span>";
			return $msg;
		} else {
			$query = "UPDATE table_category

			SET
			catName = '$catName' 
			WHERE catId = '$id'";

			$updated_row = $this->db->update($query);
			if ($updated_row) {
				header("Location:category-list.php");
			} else {
				$msg = "<span class='error'>Category Not Updated !</span>";
				return $msg;
			}
		}
	}

	// delcatById function
	public function delcatById($id)
	{

		$query = "DELETE FROM table_category WHERE catId = '$id'";
		$deldata = $this->db->delete($query);
		if ($deldata) {
			$msg = "<span class='success'>Category Deleted Successfully.</span>";
			return $msg;
		} else {
			$msg = "<span class='error'>Category Not Deleted !</span>";
			return $msg;
		}
	}
}

?>