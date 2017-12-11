<?php 
	 $filePath = realpath(dirname(__FILE__));
	 include_once ($filePath.'/../lib/database.php');
	 include_once ($filePath.'/../helpers/format.php');
?>

<?php
/**
* 
*/
class Brand
{
	private $db;
	private $fm;
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function insertBrand($data){
		$brandName = $this->fm->validation($data['brandName']);

		$brandName = mysqli_real_escape_string($this->db->link, $brandName);

		$Cquery = "SELECT * FROM tbl_brand";
		$result = $this->db->select($Cquery)->fetch_assoc();
		$bName = $result['brandName'];
		if ($bName == $brandName) {
			$msg = "<span style='color:red'>Brand Already Added !!</span>";
			return $msg;
		}

		if ($brandName == "") {
			$msg = "<span style='color:red'>Please Insert Category Name First !!</span>";
			return $msg;
		}else{
			$query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName')";
			$result = $this->db->insert($query);
			if($result){
				$msg = "<span style='color:green'>Brand Added Successfully</span>";
				return $msg;
			}else{
				$msg = "<span style='color:red'>Brand Not Added</span>";
				return $msg;
			}
		}
	}//category insert close

	public function getAllbrand(){
		$query = "SELECT * FROM tbl_brand ORDER BY id DESC";
		$allCat = $this->db->select($query);
		return $allCat;
	}

	public function getAllbrandby($id){
		$query = "SELECT * FROM tbl_brand WHERE id = '$id'";
		$allCat = $this->db->select($query);
		return $allCat;
	}

	public function updateBrand($data, $id){
		$brandName = $this->fm->validation($data['brandName']);

		$brandName = mysqli_real_escape_string($this->db->link, $brandName);

		if ($brandName == "") {
			$msg = "<span style='color:red'>Please Insert Brand Name First !!</span>";
			return $msg;
		}else{
			$query = "UPDATE tbl_brand SET brandName = '$brandName' WHERE id = '$id'";
			$result = $this->db->insert($query);
			if($result){
				echo "<script>window.location='brand_show.php'</script>";
			}else{
				$msg = "<span style='color:red'>Brand Not Added</span>";
				return $msg;
			}
		}
	}

	public function deleteCat($id){
		$query = "DELETE FROM tbl_brand WHERE id = '$id'";
		$result = $this->db->delete($query);
		if ($result) {
			$msg = "<span style='color:green'>Brand Deleted</span>";
			return $msg;
		}else{
			$msg = "<span style='color:red'>Brand Not Deleted !!</span>";
			return $msg;
		}
	}
}?>