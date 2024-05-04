<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Database.php');
include_once($filepath . '/../helpers/Formate.php');

?>

<?php
/**
 * The Product class represents a product in the PineAppleStore application.
 */
class Product
{
	private $db;
	private $fm;

	/**
	 * Product constructor.
	 * Initializes the Database and Format objects.
	 */
	public function __construct()
	{

		$this->db = new Database();
		$this->fm = new Format();
	}

	/**
	 * Inserts a new product into the database.
	 *
	 * @param array $data The product data.
	 * @param array $file The uploaded file data.
	 * @return string The success or error message.
	 */
	public function productInsert($data, $file)
	{
		// Validation and sanitization of input data
		$productName = $this->fm->validation($data['productName']);
		$catId = $this->fm->validation($data['catId']);
		$body = $this->fm->validation($data['body']);
		$price = $this->fm->validation($data['price']);
		$stock = $this->fm->validation($data['stock']);
		$rate = 0.0;
		$sales = 0;

		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$catId       = mysqli_real_escape_string($this->db->link, $data['catId']);
		$body        = mysqli_real_escape_string($this->db->link, $data['body']);
		$price       = mysqli_real_escape_string($this->db->link, $data['price']);
		$stock       = mysqli_real_escape_string($this->db->link, $data['stock']);

		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_temp = $file['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
		$uploaded_image = "uploads/" . $unique_image;

		// Validation checks
		if ($productName == "" || $catId == ""  || $body == "" || $price == "" || $file_name == "" || $stock == "") {
			$msg = "<span class='error'>Fields must not be empty !</span>";
			return $msg;
		} elseif ($file_size > 1048567) {
			$msg = "<span class='error'>Image Size should be less than 1MB!</span>";
			return $msg;
		} elseif (in_array($file_ext, $permited) === false) {
			$msg = "<span class='error'>You can upload only: " . implode(', ', $permited) . "</span>";
			return $msg;
		} elseif ($stock <= 0){
			$msg = "<span class='error'>Stock must be greater than 0</span>";
			return $msg;
		} else {
			move_uploaded_file($file_temp, $uploaded_image);
			$query = "INSERT INTO table_product(productName,catId,body,price,image,rate,sales,stock) VALUES('$productName','$catId','$body','$price','$uploaded_image', '$rate', '$sales', '$stock') ";
			$inserted_row = $this->db->insert($query);
			if ($inserted_row) {
				header("Location:product-list.php");
			} else{
				$msg = "<span class='error'>Product Not inserted.</span>";
				return $msg;
			}
		}
	}

	/**
	 * Retrieves all products from the database.
	 *
	 * @return mixed The result of the database query.
	 */
	public function getAllProduct() {
		$query = "SELECT p.*,c.catName
		FROM table_product as p,table_category as c
		WHERE p.catId = c.catId
		ORDER BY p.productId DESC";

		$result = $this->db->select($query);
		return $result;
	}

	/**
	 * Retrieves a product by its ID.
	 *
	 * @param int $id The product ID.
	 * @return mixed The result of the database query.
	 */
	public function getProById($id)
	{

		$query = "SELECT * FROM table_product WHERE productId = '$id'";
		$result = $this->db->select($query);
		return $result;
	}

	/**
	 * Updates a product in the database.
	 *
	 * @param array $data The updated product data.
	 * @param array $file The uploaded file data.
	 * @param int $id The product ID.
	 * @return string The success or error message.
	 */
	public function productUpdate($data, $file, $id){
		$productName = $this->fm->validation($data['productName']);
		$catId = $this->fm->validation($data['catId']);
		$body = $this->fm->validation($data['body']);
		$price = $this->fm->validation($data['price']);
		$rate = $this->fm->validation($data['rate']);
		$sales = $this->fm->validation($data['sales']);
		$stock = $this->fm->validation($data['stock']);

		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$catId       = mysqli_real_escape_string($this->db->link, $data['catId']);
		$body        = mysqli_real_escape_string($this->db->link, $data['body']);
		$price       = mysqli_real_escape_string($this->db->link, $data['price']);
		$rate        = mysqli_real_escape_string($this->db->link, $data['rate']);
		$sales       = mysqli_real_escape_string($this->db->link, $data['sales']);
		$stock       = mysqli_real_escape_string($this->db->link, $data['stock']);

		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_temp = $file['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
		$uploaded_image = "uploads/" . $unique_image;

		// Validation checks
		if ($productName == "" || $catId == "" || $body == "" || $price == "" || $rate == "" || $sales == "" || $stock == "") {
			$msg = "<span class='error'>Fields must not be empty !</span>";
			return $msg;
		} elseif ($stock <=0) {
			$msg = "<span class='error'>Stock must be greater than 0</span>";
			return $msg;
		} else {
			if (!empty($file_name)) {
				if ($file_size >1048567) {
					$msg = "<span class='error'>Image Size should be less than 1MB!</span>";
					return $msg;
				} elseif (in_array($file_ext, $permited) === false) {
					$msg = "<span class='error'>You can upload only: " . implode(', ', $permited) . "</span>";
					return $msg;
				} else {
					move_uploaded_file($file_temp, $uploaded_image);

					$query = "UPDATE table_product 
					SET
					productName = '$productName',
					catId       = '$catId',
					body        = '$body',
					price       = '$price',
					image       = '$uploaded_image',
					rate        = '$rate',
					sales       = '$sales',
					stock       = '$stock'
					WHERE productId = '$id'";

					$updatedted_row = $this->db->update($query);
					if ($updatedted_row) {
						header("Location:product-list.php");
					} else {
						$msg = "<span class='error'>Product Not Updated.</span>";
						return $msg;
					}
				}
			} else {
				$query = "UPDATE table_product 
				SET
				productName = '$productName',
				catId       = '$catId',
				body        = '$body',
				price       = '$price',
				rate        = '$rate',
				sales       = '$sales',
				stock       = '$stock'
				WHERE productId = '$id'";

				$updatedted_row = $this->db->update($query);
				if ($updatedted_row) {
					header("Location:product-list.php");
				} else{
					$msg = "<span class='error'>Product Not Updated.</span>";
					return $msg;
				}
			}
		}
	}

	/**
	 * Deletes a product from the database.
	 *
	 * @param int $id The product ID.
	 * @return string The success or error message.
	 */
	public function delProById($id)
	{
		$query = "SELECT * FROM table_product WHERE productId = '$id'";
		$getData = $this->db->select($query);
		if ($getData) {
			while ($delImg = $getData->fetch_assoc()) {
				$dellink = $delImg['image'];
				unlink($dellink);
			}
		}

		$delquery = "DELETE FROM table_product where productId = '$id'";
		$deldata = $this->db->delete($delquery);
		if ($deldata) {
			$msg = "<span class='success'>Product Deleted Successfully.</span>";
			return $msg;
		} else {
			$msg = "<span class='error'>Product Not Deleted !</span>";
			return $msg;
		}
	}

	/**
	 * Retrieves the slider products from the database.
	 *
	 * @return mixed The result of the database query.
	 */
	public function getSliderProduct()
	{

		$query = "SELECT * FROM table_product ORDER BY rate DESC LIMIT 5";
		$result = $this->db->select($query);
		return $result;
	}

	/**
	 * Retrieves the trending products from the database.
	 *
	 * @return mixed The result of the database query.
	 */
	public function getTrendingProduct()
	{
		$query = "SELECT * FROM table_product ORDER BY sales DESC LIMIT 5";
		$result = $this->db->select($query);
		return $result;
	}

	/**
	 * Retrieves a single product by its ID.
	 *
	 * @param int $id The product ID.
	 * @return mixed The result of the database query.
	 */
	public function getSingleProduct($id){
		$query = "SELECT p.*,c.catName
		FROM table_product as p,table_category as c
		WHERE p.catId = c.catId AND p.productId = '$id'";
		$result = $this->db->select($query);
		return $result;
	}

	/**
	 * Retrieves related products based on the category and product ID.
	 *
	 * @param int $prodId The product ID.
	 * @param int $catId The category ID.
	 * @return mixed The result of the database query.
	 */
	public function getRelatedProduct($prodId, $catId) {
		$query = "SELECT * FROM table_product WHERE catId = '$catId' AND productId != '$prodId' ORDER BY rate DESC LIMIT 4";
		$result = $this->db->select($query);
		return $result;
	}
}

?>