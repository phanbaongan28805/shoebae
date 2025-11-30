<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>



<?php 
	/**
	* 
	*/
	class customer
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insert_customer($date)
		{
			$name = mysqli_real_escape_string($this->db->link, $date['name']);
			$city = mysqli_real_escape_string($this->db->link, $date['city']);
			$zipcode = mysqli_real_escape_string($this->db->link, $date['zipcode']);
			$email = mysqli_real_escape_string($this->db->link, $date['email']);
			$address = mysqli_real_escape_string($this->db->link, $date['address']);
			$phone = mysqli_real_escape_string($this->db->link, $date['phone']);
			$password = mysqli_real_escape_string($this->db->link, md5($date['password']));

			if($name == "" || $city == "" || $zipcode == "" || $email == "" || $address == "" || $phone == "" || $password == ""){
				$alert = "<span class='error'>Form không hợp lệ!!</span>";
				return $alert;
			}else{
				$check_email = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
				$result_check = $this->db->select($check_email);
				if ($result_check) {
					$alert = "<span class='error'>Email đã tồn tại!</span>";
					return $alert;
				}else {
					$query = "INSERT INTO tbl_customer(name,city,zipcode,email,address,phone,password) VALUES('$name','$city','$zipcode','$email','$address','$phone','$password') ";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Thêm thông tin thành công!</span>";
						return $alert;
					}else {
						$alert = "<span class='error'>Thêm thông tin thất bại!</span>";
						return $alert;
					}
				}
			}
		}
		
		public function login_customer($date)
		{
			$email =  $date['email'];
			$password = md5($date['password']);
			if($email == '' || $password == ''){
				$alert = "<span class='error'>Email không tồn tại!</span>";
				return $alert;
			}else{
				$check_login = "SELECT * FROM tbl_customer WHERE email='$email' AND password='$password' ";
				$result_check = $this->db->select($check_login);
				if ($result_check != false) {
					$value = $result_check->fetch_assoc();
					Session::set('customer_login', true);
					Session::set('customer_id', $value['id']);
					Session::set('customer_name', $value['name']);
					header('Location:order.php');
				}else {
					$alert = "<span class='error'>Email hoặc Mật khẩu không đúng!</span>";
					return $alert;
				}
			}
		}
		public function show_customers($id)
		{
			$query = "SELECT * FROM tbl_customer WHERE id='$id' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_all_customers()
		{
			$query = "SELECT * FROM tbl_customer";
			$result = $this->db->select($query);
			return $result;
		}
		public function insert_contact($date)
		{
			$name = mysqli_real_escape_string($this->db->link, $date['name']);
			$email = mysqli_real_escape_string($this->db->link, $date['email']);
			$phone = mysqli_real_escape_string($this->db->link, $date['phone']);
			$mess = mysqli_real_escape_string($this->db->link, $date['mess']);

			if($name == "" || $email == "" || $phone == "" || $mess == "" ){
				$alert = "<span class='error'>Lỗi</span>";
				return $alert;
				}else {
					$query = "INSERT INTO tbl_contact(name,email,phone,mess) VALUES('$name','$email','$phone','$mess') ";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Gửi thành công!</span>";
						return $alert;
					}else {
						$alert = "<span class='error'>Gửi thất bại!</span>";
						return $alert;
					}
				}
			}
			public function insert_email($date)
		{
				$email = mysqli_real_escape_string($this->db->link, $date['email']);
			if( $email == "" ){
				$alert = "<span class='error'>Vui lòng nhập Email</span>";
				return $alert;
				}else {
					$query = "INSERT INTO tbl_contact(`email`) VALUES('$email')";
					$result = $this->db->insert($query);
					return ;
				}
			}
		public function show_contact()
		{
			$query = "SELECT * FROM tbl_contact  order by contactId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_mail($id)
		{
		
			$query = "SELECT * FROM tbl_contact where contactId='$id'";
			$result = $this->db->select($query);
			return $result;
		}
	
		public function show_slsanpham()
		{
			$query = "SELECT COUNT(*)  FROM tbl_product";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_slkhachhang()
		{
			$query = "SELECT COUNT(*) FROM tbl_customer";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_slphanhoi()
		{
			$query = "SELECT COUNT(*) FROM tbl_contact";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_sldonhang()
		{
			$query = "SELECT COUNT(*) FROM tbl_order";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_slspkho()
		{
			$query = "SELECT SUM(product_remain) FROM tbl_product";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_doanhthu()
		{
			$query = "SELECT SUM(price) FROM tbl_order";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_customers($data, $id)
		{
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			
			if($name=="" || $zipcode=="" || $email=="" || $address=="" || $phone ==""){
				$alert = "<span class='error'>Các trường không được để trống!</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_customer SET name='$name',zipcode='$zipcode',email='$email',address='$address',phone='$phone' WHERE id ='$id'";
				$result = $this->db->insert($query);
				if($result){
						$alert = "<span class='success'>Khách hàng cập nhật thành công</span>";
						return $alert;
				}else{
						$alert = "<span class='error'>Khách hàng cập nhật không thành công</span>";
						return $alert;
				}
				
			}
		}

	}
 ?>