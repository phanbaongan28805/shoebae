<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../lib/database.php');
	include_once($filepath.'/../helpers/format.php');
?>
<?php 
	/**
	* Class to manage staff (admin users) from tbl_admin
	*/
	class staff
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		// Get all staff members
		public function show_staff()
		{
			$query = "SELECT * FROM tbl_admin ORDER BY adminId DESC";
			$result = $this->db->select($query);
			return $result;
		}

		// Get staff by ID
		public function get_staff_by_id($id)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$query = "SELECT * FROM tbl_admin WHERE adminId = '$id' LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}

		// Add new staff
		public function add_staff($data)
		{
			$adminUser = $this->fm->validation($data['adminUser']);
			$adminPass = $this->fm->validation($data['adminPass']);
			$adminName = $this->fm->validation($data['adminName']);
			$role = $this->fm->validation($data['role']);

			$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
			$adminPass = mysqli_real_escape_string($this->db->link, $adminPass);
			$adminName = mysqli_real_escape_string($this->db->link, $adminName);
			$role = mysqli_real_escape_string($this->db->link, $role);

			if(empty($adminUser) || empty($adminPass) || empty($adminName) || empty($role)){
				$alert = "Tất cả các trường không được để trống";
				return $alert;
			}

			// Check if username already exists
			$check_query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' LIMIT 1";
			$check_result = $this->db->select($check_query);
			if($check_result){
				$alert = "Tên đăng nhập đã tồn tại";
				return $alert;
			}

			$query = "INSERT INTO tbl_admin(adminUser, adminPass, adminName, role) VALUES('$adminUser', '$adminPass', '$adminName', '$role')";
			$result = $this->db->insert($query);

			if($result){
				$alert = "Thêm nhân viên thành công";
				return $alert;
			}else{
				$alert = "Thêm nhân viên thất bại";
				return $alert;
			}
		}

		// Update staff
		public function update_staff($data, $id)
		{
			$adminUser = $this->fm->validation($data['adminUser']);
			$adminPass = $this->fm->validation($data['adminPass']);
			$adminName = $this->fm->validation($data['adminName']);
			$role = $this->fm->validation($data['role']);

			$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
			$adminPass = mysqli_real_escape_string($this->db->link, $adminPass);
			$adminName = mysqli_real_escape_string($this->db->link, $adminName);
			$role = mysqli_real_escape_string($this->db->link, $role);
			$id = mysqli_real_escape_string($this->db->link, $id);

			if(empty($adminUser) || empty($adminPass) || empty($adminName) || empty($role)){
				$alert = "Tất cả các trường không được để trống";
				return $alert;
			}

			$query = "UPDATE tbl_admin SET adminUser = '$adminUser', adminPass = '$adminPass', adminName = '$adminName', role = '$role' WHERE adminId = '$id'";
			$result = $this->db->update($query);

			if($result){
				$alert = "Cập nhật nhân viên thành công";
				return $alert;
			}else{
				$alert = "Cập nhật nhân viên thất bại";
				return $alert;
			}
		}

		// Delete staff
		public function delete_staff($id)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$query = "DELETE FROM tbl_admin WHERE adminId = '$id' LIMIT 1";
			$result = $this->db->delete($query);

			if($result){
				$alert = "Xóa nhân viên thành công";
				return $alert;
			}else{
				$alert = "Xóa nhân viên thất bại";
				return $alert;
			}
		}
	}
 ?>
