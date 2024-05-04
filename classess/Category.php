<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Database.php');
include_once($filepath . '/../helpers/Formate.php');

?>

<?php
/**
 * The Category class represents a category in the PineAppleStore application.
 */
class Category
{

	private $db;
	private $fm;

	/**
	 * Category constructor.
	 * Initializes a new instance of the Category class.
	 */
	public function __construct()
	{

		$this->db = new Database();
		$this->fm = new Format();
	}

	/**
	 * Inserts a new category into the database.
	 *
	 * @param string $catName The name of the category.
	 * @return string The success or error message.
	 */
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

	/**
	 * Retrieves all categories from the database.
	 *
	 * @return array The array of categories.
	 */
	public function getAllCat()
	{
		$query = "SELECT * FROM table_category ORDER BY catId ASC";
		$result = $this->db->select($query);
		return $result;
	}

	/**
	 * Retrieves a category by its ID from the database.
	 *
	 * @param int $id The ID of the category.
	 * @return array The category details.
	 */
	public function getCatById($id)
	{
		$query = "SELECT * FROM table_category WHERE catId = '$id'";
		$result = $this->db->select($query);
		return $result;
	}

	/**
	 * Updates a category's name that has the specified ID in the database.
	 *
	 * @param string $catName The updated name of the category.
	 * @param int $id The ID of the category to be updated.
	 * @return string The success or error message.
	 */
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

	/**
	 * Deletes a category from the database.
	 *
	 * @param int $id The ID of the category to be deleted.
	 * @return string The success or error message.
	 */
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