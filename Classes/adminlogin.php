<?php 
	 $filePath = realpath(dirname(__FILE__));
	  include_once ($filePath.'/../lib/session.php');
     
     Session::checkLogin();
	 include_once ($filePath.'/../lib/database.php');
	 include_once ($filePath.'/../helpers/format.php');


?>
<?php
/**
* 
*/
class Signup
{
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function signin($data){
		$email = $this->fm->validation($data['adminEmail']);
		$pass = $this->fm->validation($data['adminPass']);

		$email = mysqli_real_escape_string($this->db->link, $email);
		$pass = mysqli_real_escape_string($this->db->link, md5($pass));

		$email = $email;
			// Remove all illegal characters from email
			$email = filter_var($email, FILTER_SANITIZE_EMAIL);
			
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			  $msg ="is a valid email address";
			  //return $msg;
			} else {
			  $msg = "<span style='color:red'>You entered an Invalid Email Address</span>";
			  return $msg;
			}

		if ($email == "" || $pass == "") {
			$msg = "<span style='color:red'>Please Give Your Email Or Password !!</span>";
			return $msg;
		}else{
			$query = "SELECT * FROM tbl_admin WHERE adminEmail = '$email' AND adminPass = '$pass'";
			$result = $this->db->select($query);
			if ($result != false) {
				$value = $result->fetch_assoc();
				Session::set("login", true);
				Session::set("adminId",   $value['id']);
				Session::set("adminName", $value['adminName']);
				Session::set("adminUser", $value['adminEmail']);
				header("Location:index.php");
			}else{
				$msg = "<span style='color:red'>Your Email Or Password is incorrect !!</span>";
				return $msg;
			}
		}
	}
}

?>