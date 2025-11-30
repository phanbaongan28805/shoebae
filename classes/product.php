<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
/**
 * 
 */
class product
{
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function insert_product($date, $files)
	{

		$productName = mysqli_real_escape_string($this->db->link, $date['productName']);
		$product_code = mysqli_real_escape_string($this->db->link, $date['product_code']);
		$productQuantity = mysqli_real_escape_string($this->db->link, $date['productQuantity']);
		$category = mysqli_real_escape_string($this->db->link, $date['category']);
		$brand = mysqli_real_escape_string($this->db->link, $date['brand']);
		$color = mysqli_real_escape_string($this->db->link, $date['color']);
		$product_desc = mysqli_real_escape_string($this->db->link, $date['desc']);
		$price = mysqli_real_escape_string($this->db->link, $date['price']);
		$type = mysqli_real_escape_string($this->db->link, $date['type']);
		$sex = mysqli_real_escape_string($this->db->link, $date['sex']);
		//mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db

		// kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
		$permited = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_temp = $_FILES['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
		$uploaded_image = "uploads/" . $unique_image;

		if ($productName == "" || $product_code = "" || $productQuantity == "" || $category == "" || $brand == "" || $color == "" || $product_desc == "" || $price == "" || $type == "" || $sex == "" || $file_name == "") {
			$alert = "<span class='error'>Các trường không được để trống!! </span>";
			return $alert;
		} else {
			move_uploaded_file($file_temp, $uploaded_image);
			$query = "INSERT INTO tbl_product(productName,product_code,product_remain,productQuantity,catId,brandId,color,product_desc,price,type,sex,image) VALUES ('$productName', '$product_code', '$productQuantity','$productQuantity','$category','$brand','$color','$product_desc','$price','$type','$sex','$unique_image') ";
			$result = $this->db->insert($query);
			if ($result) {
				$alert = "<span class='success'>Thành Công</span>";
				return $alert;
			} else {
				$alert = "<span class='error'>Lỗi</span>";
				return $alert;
			}
		}
	}
	public function insert_slider($date, $files)
	{
		$sliderName = mysqli_real_escape_string($this->db->link, $date['sliderName']);
		$slider_mota = mysqli_real_escape_string($this->db->link, $date['slider_mota']);

		$type = mysqli_real_escape_string($this->db->link, $date['type']);
		//mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db

		// kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
		$permited  = array('jpg', 'jpeg', 'png', 'gif');

		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_temp = $_FILES['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		// $file_current = strtolower(current($div));
		$unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
		$uploaded_image = "uploads/" . $unique_image;


		if ($sliderName == "" || $type == "") {
			$alert = "<span class='error'>Fields must be not empty</span>";
			return $alert;
		} else {
			if (!empty($file_name)) {
				//Nếu người dùng chọn ảnh
				if ($file_size > 2048000000) {

					$alert = "<span class='success'>Image Size should be less then 2MB!</span>";
					return $alert;
				} elseif (in_array($file_ext, $permited) === false) {
					// echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";	
					$alert = "<span class='success'>You can upload only:-" . implode(', ', $permited) . "</span>";
					return $alert;
				}
				move_uploaded_file($file_temp, $uploaded_image);

				$query = "INSERT INTO tbl_slider(sliderName,slider_mota,slider_image,type) VALUES('$sliderName','$slider_mota','$unique_image','$type')";
				$result = $this->db->insert($query);
				if ($result) {
					$alert = "<span class='success'>Thành Công</span>";
					return $alert;
				} else {
					$alert = "<span class='error'>Lỗi</span>";
					return $alert;
				}
			}
		}
	}

	public function show_slider_top1()
	{
		$query = "SELECT * FROM tbl_slider where type='2' order by sliderId desc";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_slider_top2()
	{
		$query = "SELECT * FROM tbl_slider where type='5' order by sliderId desc";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_slider_top3()
	{
		$query = "SELECT * FROM tbl_slider where type='6' order by sliderId desc";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_slider_center2()
	{
		$query = "SELECT * FROM tbl_slider where type='4' order by sliderId desc";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_slider_center1()
	{
		$query = "SELECT * FROM tbl_slider where type='3' order by sliderId desc";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_slider_down1()
	{
		$query = "SELECT * FROM tbl_slider where type='7' order by sliderId desc";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_slider_down2()
	{
		$query = "SELECT * FROM tbl_slider where type='8' order by sliderId desc";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_slider_nike()
	{
		$query = "SELECT * FROM tbl_slider where type='9' order by sliderId desc";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_slider_adidas()
	{
		$query = "SELECT * FROM tbl_slider where type='10' order by sliderId desc";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_slider_converse()
	{
		$query = "SELECT * FROM tbl_slider where type='11' order by sliderId desc";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_slider_vans()
	{
		$query = "SELECT * FROM tbl_slider where type='12' order by sliderId desc";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_banner_nike()
	{
		$query = "SELECT * FROM tbl_slider where type='13' order by sliderId desc";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_banner_adidas()
	{
		$query = "SELECT * FROM tbl_slider where type='14' order by sliderId desc";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_banner_converse()
	{
		$query = "SELECT * FROM tbl_slider where type='15' order by sliderId desc";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_banner_vans()
	{
		$query = "SELECT * FROM tbl_slider where type='16' order by sliderId desc";
		$result = $this->db->select($query);
		return $result;
	}
	public function getproduct_giathap()
	{
		$sp_tungtrang  = 8;
		if (!isset($_GET['trang'])) {
			$trang = 1;
		} else {
			$trang = $_GET['trang'];
		}
		$tung_trang = ($trang - 1) * $sp_tungtrang;
		$query = "SELECT * FROM tbl_product order by price limit $tung_trang,$sp_tungtrang ";
		$result = $this->db->select($query);
		return $result;
	}
	public function getproduct_giacao()
	{
		$sp_tungtrang  = 8;
		if (!isset($_GET['trang'])) {
			$trang = 1;
		} else {
			$trang = $_GET['trang'];
		}
		$tung_trang = ($trang - 1) * $sp_tungtrang;
		$query = "SELECT * FROM tbl_product order by price desc limit $tung_trang,$sp_tungtrang ";
		$result = $this->db->select($query);
		return $result;
	}
	public function getproductall_nam()
	{
		$sp_tungtrang  = 8;
		if (!isset($_GET['trang'])) {
			$trang = 1;
		} else {
			$trang = $_GET['trang'];
		}
		$tung_trang = ($trang - 1) * $sp_tungtrang;

		$query = "SELECT * FROM tbl_product where sex = '0' order by productId  limit $tung_trang,$sp_tungtrang";
		$result = $this->db->select($query);
		return $result;
	}
	public function getproductall_nu()
	{
		$sp_tungtrang  = 8;
		if (!isset($_GET['trang'])) {
			$trang = 1;
		} else {
			$trang = $_GET['trang'];
		}
		$tung_trang = ($trang - 1) * $sp_tungtrang;
		$query = "SELECT * FROM tbl_product where sex = '1' order by productId desc limit $tung_trang,$sp_tungtrang";
		$result = $this->db->select($query);
		return $result;
	}

	public function show_slider_list()
	{
		$query = "SELECT * FROM tbl_slider order by sliderId desc";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_product_warehouse()
	{
		$query =
			"SELECT tbl_product.*, tbl_warehouse.*

			 FROM tbl_product INNER JOIN tbl_warehouse ON tbl_product.productId = tbl_warehouse.id_sanpham
								
			 order by tbl_warehouse.sl_ngaynhap desc ";


		$result = $this->db->select($query);
		return $result;
	}
	public function update_quantity_product($data, $files, $id)
	{
		$product_more_quantity = mysqli_real_escape_string($this->db->link, $data['product_more_quantity']);
		$product_remain = mysqli_real_escape_string($this->db->link, $data['product_remain']);

		if ($product_more_quantity == "") {

			$alert = "<span class='error'>Lỗi</span>";
			return $alert;
		} else {
			$qty_total = $product_more_quantity + $product_remain;
			//Nếu người dùng không chọn ảnh
			$query = "UPDATE tbl_product SET
					
					product_remain = '$qty_total'	
					
					WHERE productId = '$id'";
		}
		$query_warehouse = "INSERT INTO tbl_warehouse(id_sanpham,sl_nhap) VALUES('$id','$product_more_quantity') ";
		$result_insert = $this->db->insert($query_warehouse);
		$result = $this->db->update($query);

		if ($result) {
			$alert = "<span class='success'>Thêm số lượng thành công</span>";
			return $alert;
		} else {
			$alert = "<span class='error'>Thêm số lượng không thành công</span>";
			return $alert;
		}
	}
	public function show_product()
	{
		$query =
			"SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName

			 FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
								INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
			 order by tbl_product.productId desc ";

		// $query = "SELECT * FROM tbl_product order by productId desc ";
		$result = $this->db->select($query);
		return $result;
	}

	public function update_type_slider($id, $type)
	{

		$type = mysqli_real_escape_string($this->db->link, $type);
		$query = "UPDATE tbl_slider SET type = '$type' where sliderId='$id'";
		$result = $this->db->update($query);
		return $result;
	}
	public function del_slider($id)
	{
		$query = "DELETE FROM tbl_slider where sliderId = '$id' ";
		$result = $this->db->delete($query);
		if ($result) {
			$alert = "<span class='success'>Thành Công</span>";
			return $alert;
		} else {
			$alert = "<span class='success'>Lỗi</span>";
			return $alert;
		}
	}

	public function update_product($data, $files, $id)
	{

		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$product_code = mysqli_real_escape_string($this->db->link, $data['product_code']);
		$productQuantity = mysqli_real_escape_string($this->db->link, $data['productQuantity']);
		$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
		$category = mysqli_real_escape_string($this->db->link, $data['category']);
		$color = mysqli_real_escape_string($this->db->link, $data['color']);
		$product_desc = mysqli_real_escape_string($this->db->link, $data['desc']);
		$price = mysqli_real_escape_string($this->db->link, $data['price']);
		$type = mysqli_real_escape_string($this->db->link, $data['type']);
		$sex = mysqli_real_escape_string($this->db->link, $data['sex']);
		//Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
		$permited  = array('jpg', 'jpeg', 'png', 'gif');

		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_temp = $_FILES['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		// $file_current = strtolower(current($div));
		$unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
		$uploaded_image = "uploads/" . $unique_image;


		if ($product_code == "" || $productName == "" || $productQuantity == "" || $brand == "" || $category == "" || $color == "" || $product_desc == "" || $price == "" || $type == "" || $sex == "") {
			$alert = "<span class='error'>Các trường không được để trống!</span>";
			return $alert;
		} else {
			if (!empty($file_name)) {
				//Nếu người dùng chọn ảnh
				if ($file_size > 2048000) {

					$alert = "<span class='success'>Image Size should be less then 2MB!</span>";
					return $alert;
				} elseif (in_array($file_ext, $permited) === false) {
					// echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";	
					$alert = "<span class='success'>You can upload only:-" . implode(', ', $permited) . "</span>";
					return $alert;
				}
				move_uploaded_file($file_temp, $uploaded_image);
				$query = "UPDATE tbl_product SET
					productName = '$productName',
					product_code = '$product_code',
					productQuantity = '$productQuantity',
					brandId = '$brand',
					catId = '$category', 
					color = '$color', 
					type = '$type',
					sex = '$sex', 
					price = '$price', 
					image = '$unique_image',
					product_desc = '$product_desc'
					WHERE productId = '$id'";
			} else {
				//Nếu người dùng không chọn ảnh
				$query = "UPDATE tbl_product SET

					productName = '$productName',
					product_code = '$product_code',
					productQuantity = '$productQuantity',
					brandId = '$brand',
					catId = '$category', 
					color = '$color', 
					type = '$type', 
					sex = '$sex', 
					price = '$price', 
					
					product_desc = '$product_desc'

					WHERE productId = '$id'";
			}
			$result = $this->db->update($query);
			if ($result) {
				header('Location:productlist.php');
				$alert = "<span class='success'>Sản phẩm cập nhật thành công</span>";
				return $alert;
				header('Location:productlist.php');
			} else {
				$alert = "<span class='error'>Sản phẩm cập nhật không thành công</span>";
				return $alert;
			}
		}
	}
	public function del_product($id)
	{
		$query = "DELETE FROM tbl_product where productId = '$id' ";
		$result = $this->db->delete($query);
		if ($result) {
			$alert = "<span class='success'>Sản phẩm xóa thành công </span>";
			return $alert;
		} else {
			$alert = "<span class='success'>Sản phẩm xóa không thành công</span>";
			return $alert;
		}
	}
	public function del_wlist($proid, $customer_id)
	{
		$query = "DELETE FROM tbl_wishlist where productId = '$proid' AND customer_id='$customer_id' ";
		$result = $this->db->delete($query);
		return $result;
	}
	public function getproductbyId($id)
	{
		$query = "SELECT * FROM tbl_product where productId = '$id' ";
		$result = $this->db->select($query);
		return $result;
	}
	//Kết thúc Backend


	public function getproductall_cocao()
	{
		$sp_tungtrang  = 8;
		if (!isset($_GET['trang'])) {
			$trang = 1;
		} else {
			$trang = $_GET['trang'];
		}
		$tung_trang = ($trang - 1) * $sp_tungtrang;
		$query = "SELECT * FROM tbl_product where type = '0' order by productId desc limit $tung_trang,$sp_tungtrang";
		$result = $this->db->select($query);
		return $result;
	}

	public function getproductall_cothap()
	{
		$sp_tungtrang  = 8;
		if (!isset($_GET['trang'])) {
			$trang = 1;
		} else {
			$trang = $_GET['trang'];
		}
		$tung_trang = ($trang - 1) * $sp_tungtrang;
		$query = "SELECT * FROM tbl_product where type = '1' order by productId desc limit $tung_trang,$sp_tungtrang";
		$result = $this->db->select($query);
		return $result;
	}

	public function getproductnew()
	{
		$sp_tungtrang  = 8;
		if (!isset($_GET['trang'])) {
			$trang = 1;
		} else {
			$trang = $_GET['trang'];
		}
		$tung_trang = ($trang - 1) * $sp_tungtrang;
		$query = "SELECT * FROM tbl_product order by productId desc limit $tung_trang,$sp_tungtrang";
		$result = $this->db->select($query);
		return $result;
	}
	public function getproducthot()
	{
		$sp_tungtrang  = 8;
		if (!isset($_GET['trang'])) {
			$trang = 1;
		} else {
			$trang = $_GET['trang'];
		}
		$tung_trang = ($trang - 1) * $sp_tungtrang;
		$query = "SELECT * FROM tbl_order order by productId desc limit $tung_trang,$sp_tungtrang";
		$result = $this->db->select($query);
		return $result;
	}

	public function get_details($id)
	{
		$query =
			"SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName

			 FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
								INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
			 WHERE tbl_product.productId = '$id'
			 ";

		$result = $this->db->select($query);
		return $result;
	}
	public function getLastestNike()
	{
		$query = "SELECT * FROM tbl_product where brandId = '10' order by productId desc limit 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function getLastestConverse()
	{
		$query = "SELECT * FROM tbl_product where brandId = '8' order by productId desc limit 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function getLastestVans()
	{
		$query = "SELECT * FROM tbl_product where brandId = '7' order by productId desc limit 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function getLastestAdidas()
	{
		$query = "SELECT * FROM tbl_product where brandId = '6' order by productId desc limit 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function get_compare($customer_id)
	{
		$query = "SELECT * FROM tbl_compare where customer_id = '$customer_id' order by id desc";
		$result = $this->db->select($query);
		return $result;
	}

	public function get_wishlist($customer_id)
	{
		$query = "SELECT * FROM tbl_wishlist where customer_id = '$customer_id' order by id desc";
		$result = $this->db->select($query);
		return $result;
	}
	public function insertorder($productid, $customer_id)
	{
		$productid = mysqli_real_escape_string($this->db->link, $productid);
		$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);

		$check_order = "SELECT * FROM tbl_order WHERE productId = '$productid' AND customer_id ='$customer_id'";
		$result_check_order = $this->db->select($check_order);

		if ($result_check_order) {
			$msg = "<span class='error'>Đơn Hàng Đặt Thành Công</span>";
			return $msg;
		} else {

			$query = "SELECT * FROM tbl_product WHERE productId = '$productid'";
			$result = $this->db->select($query)->fetch_assoc();

			$productName = $result["productName"];
			$price = $result["price"];
			$image = $result["image"];
			$size = $result["size"];
			$quantity = $result["quantity"];



			$query_insert = "INSERT INTO tbl_order(productId,price,image,customer_id,productName,size,quantity) VALUES('$productid','$price','$image','$customer_id','$productName','$size','$quantity')";
			$insert_order = $this->db->insert($query_insert);

			if ($insert_order) {
				$alert = "<span class='success'>Thêm sản phẩm vào so sánh thành công</span>";
				return $alert;
			} else {
				$alert = "<span class='error'>Thêm sản phẩm vào so sánh thất bại</span>";
				return $alert;
			}
		}
	}
	public function insertWishlist($productid, $customer_id)
	{
		$productid = mysqli_real_escape_string($this->db->link, $productid);
		$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);

		$check_wlist = "SELECT * FROM tbl_wishlist WHERE productId = '$productid' AND customer_id ='$customer_id'";
		$result_check_wlist = $this->db->select($check_wlist);

		if ($result_check_wlist) {
			$msg = "<span class='error'>Product Added to Wishlist</span>";
			return $msg;
		} else {

			$query = "SELECT * FROM tbl_product WHERE productId = '$productid'";
			$result = $this->db->select($query)->fetch_assoc();

			$productName = $result["productName"];
			$price = $result["price"];
			$image = $result["image"];



			$query_insert = "INSERT INTO tbl_wishlist(productId,price,image,customer_id,productName) VALUES('$productid','$price','$image','$customer_id','$productName')";
			$insert_wlist = $this->db->insert($query_insert);

			if ($insert_wlist) {
				$alert = "<span class='success'>Thêm sản phẩm vào wishlist thành công</span>";
				return $alert;
			} else {
				$alert = "<span class='error'>Thêm sản phẩm vào wishlist thất bại</span>";
				return $alert;
			}
		}
	}
}
?>