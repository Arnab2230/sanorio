<?php 
	 $filePath = realpath(dirname(__FILE__));
	 include_once ($filePath.'/../lib/database.php');
	 include_once ($filePath.'/../helpers/format.php');
?>

<?php
/**
* 
*/
class Category
{
	private $db;
	private $fm;
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function insertCategory($data){
		$catName = $this->fm->validation($data['catName']);

		$catName = mysqli_real_escape_string($this->db->link, $catName);

		$Cquery = "SELECT * FROM tbl_category";
		$result = $this->db->select($Cquery)->fetch_assoc();
		$cName = $result['catName'];
		if ($cName == $catName) {
			$msg = "<span style='color:red'>Category Already Added !!</span>";
			return $msg;
		}

		if ($catName == "") {
			$msg = "<span style='color:red'>Please Insert Category Name First !!</span>";
			return $msg;
		}else{
			$query = "INSERT INTO tbl_category(catName) VALUES('$catName')";
			$result = $this->db->insert($query);
			if($result){
				$msg = "<span style='color:green'>Category Added Successfully</span>";
				return $msg;
			}else{
				$msg = "<span style='color:red'>Category Not Added</span>";
				return $msg;
			}
		}
	}//category insert close

	public function getAllcat(){
		$query = "SELECT * FROM tbl_category ORDER BY id DESC";
		$allCat = $this->db->select($query);
		return $allCat;
	}

	public function getAllcatby($id){
		$query = "SELECT * FROM tbl_category WHERE id = '$id'";
		$allCat = $this->db->select($query);
		return $allCat;
	}

	public function updateCategory($data, $id){
		$catName = $this->fm->validation($data['catName']);

		$catName = mysqli_real_escape_string($this->db->link, $catName);

		if ($catName == "") {
			$msg = "<span style='color:red'>Please Insert Category Name First !!</span>";
			return $msg;
		}else{
			$query = "UPDATE tbl_category SET catName = '$catName' WHERE id = '$id'";
			$result = $this->db->insert($query);
			if($result){
				echo "<script>window.location='category_show.php'</script>";
			}else{
				$msg = "<span style='color:red'>Category Not Added</span>";
				return $msg;
			}
		}
	}

	public function deleteCat($id){
		$query = "DELETE FROM tbl_category WHERE id = '$id'";
		$result = $this->db->delete($query);
		if ($result) {
			$msg = "<span style='color:green'>Category Deleted</span>";
			return $msg;
		}else{
			$msg = "<span style='color:red'>Category Not Deleted !!</span>";
			return $msg;
		}
	}
}?>