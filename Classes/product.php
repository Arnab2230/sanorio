<?php 
	 $filePath = realpath(dirname(__FILE__));
	 include_once ($filePath.'/../lib/database.php');
	 include_once ($filePath.'/../helpers/format.php');
?>
<?php
	/**
	* 
	*/
	class Product
	{
		private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insertProduct($data, $file){
			$productName = $this->fm->validation($data['productName']);
			$catId		 = $this->fm->validation($data['catId']);
			$brandId	 = $this->fm->validation($data['brandId']);
			$body		 = $this->fm->validation($data['body']);
			$price		 = $this->fm->validation($data['price']);
			$type		 = $this->fm->validation($data['type']);

			$productName = mysqli_real_escape_string($this->db->link, $productName);
			$catId		 = mysqli_real_escape_string($this->db->link, $catId);
			$brandId	 = mysqli_real_escape_string($this->db->link, $brandId);
			$body		 = mysqli_real_escape_string($this->db->link, $body);
			$price		 = mysqli_real_escape_string($this->db->link, $price);
			$type		 = mysqli_real_escape_string($this->db->link,  $type);

			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			  $file_name = $file['image']['name'];
			  $file_size = $file['image']['size'];
			  $file_temp = $file['image']['tmp_name'];

		      $div            = explode('.', $file_name);
		      $file_ext       = strtolower(end($div));
		      $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
		      $uploaded_image = "uploads/".$unique_image;


		    if ($productName == "" || $catId == "" || $brandId == "" || $body == "" || $price == "" || $type == "") {
		    	 
		    	 $errmsg = "Field Must Not Be Empty!!";
		    	 return $errmsg;

		    	}elseif ($file_size >1048567) {
			     echo "<span style='color:red;'>Image Size should be less then 1MB!</span>";

   			 	} elseif (in_array($file_ext, $permited) === false) {

		     	echo "<span style='color:red;'>You can upload only:-".implode(', ', $permited)."</span>";

    			} else {
			    	 move_uploaded_file($file_temp, $uploaded_image);
			    	 $query = "INSERT INTO tbl_product(productName, catId, brandId, body, price, image, type) VALUES('$productName', '$catId', '$brandId', '$body', '$price', '$uploaded_image', '$type')";

			    	 $inserted_row = $this->db->insert($query);
					if($inserted_row){
						$msg = "<span style='color:green;'>Product Added Successfully</span>";
						return $msg;
					}else{
						$msg = "<span style='color:red;'>Product Not Added!!</span>";
						return $msg;
			}

	    }
	}

	public function getAllproduct(){
		$query = "SELECT p.*, c.catName, b.brandName FROM tbl_product as p, tbl_category as c, tbl_brand as b WHERE p.catId = c.id AND p.brandId = b.id ORDER BY p.id DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function deleteCat($id){
		$query = "DELETE FROM tbl_product WHERE id = '$id'";
		$result = $this->db->delete($query);
		if ($result) {
			$msg = "<span style='color:green'>Product Deleted</span>";
			return $msg;
		}else{
			$msg = "<span style='color:red'>Product Not Deleted !!</span>";
			return $msg;
		}
	}
}?>