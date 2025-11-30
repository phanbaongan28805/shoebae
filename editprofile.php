<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
<?php 
	  $login_check = Session::get('customer_login');
	  if ($login_check==false) {
	  	header('Location:login.php');
	  }
	   ?>
<?php 
	// if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
 //        echo "<script> window.location = '404.php' </script>";
        
 //    }else {
 //        $id = $_GET['proid']; // Lấy productid trên host
 //    }
    $id = Session::get('customer_id');
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $UpdateCustomers = $cs -> update_customers($_POST, $id);
        {
            header('Location:profile.php');
        } // hàm check catName khi submit lên
    } 
 ?>
<div class="main">
    <div class="content">
        <div class="section group">

            <h3 style="margin-bottom: 20px;text-align: center; font-size: 16px;font-family:Tahoma, sans-serif;">
                Cập nhật Thông Tin </h3>

            <div class="heading">

            </div>
            <div class="clear"></div>
        </div>
        <form action="" method="post">
            <table class="tblone">
                <tr>
                    <?php 
                if (isset($UpdateCustomers)) {
                    echo '<td colspan="3">'.$UpdateCustomers.'</td>';
                }
                 ?>
                </tr>

                <?php 
    		$id = Session::get('customer_id');
    		$get_customers = $cs->show_customers($id);
    		if ($get_customers) {
    			while ($result = $get_customers->fetch_assoc()) {
    			
    		 ?>
                <tr>
                    <td>Tên</td>
                    <td>:</td>

                    <td><input type="text" name="name" value="<?php echo $result['name']; ?>"></td>
                </tr>

                <tr>
                    <td>Số điện thoại</td>
                    <td>:</td>
                    <td><input type="text" name="phone" value="<?php echo $result['phone']; ?>"></td>

                </tr>

                <tr>
                    <td>Zipcode</td>
                    <td>:</td>
                    <td><input type="text" name="zipcode" value="<?php echo $result['zipcode']; ?>"></td>

                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><input type="text" name="email" value="<?php echo $result['email']; ?>"></td>

                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>:</td>
                    <td><input type="text" name="address" value="<?php echo $result['address']; ?>"></td>

                </tr>
                <tr>
                    <td colspan="3"><input type="submit" name="save" value="Cập Nhật" class="btn-flat btn-hover"></td>

                </tr>

                <?php 
    		}
    		}
    		 ?>
            </table>
        </form>

    </div>
</div>

<?php 
	include 'inc/footer.php';
 ?>