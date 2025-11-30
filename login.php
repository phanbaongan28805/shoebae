<?php 
	include 'inc/header.php';
	
 ?>
<?php 
	$login_check = Session::get('customer_login');
	if ($login_check) {
		header('Location:order.php'); 
	}
?>

<?php
    // gọi class category
     
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $insertCustomer = $cs -> insert_customer($_POST); // hàm check catName khi submit lên
    }
 ?>
<?php 
 	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $login_Customer = $cs -> login_customer($_POST); // hàm check catName khi submit lên
    }
 ?>
<div class="main" style="height:77vh;margin-left:5%;">
    <div class=" content">
        <div class="login_panel" style="margin-left:20%;">
            <h3>Đăng nhập</h3>
            <p>Mời nhập thông tin</p>
            <?php 
    		if (isset($login_Customer)) {
    			echo $login_Customer;
    		}
    		 ?>
            <form action="" method="POST">
                <input type="text" name="email" class="field" placeholder="Nhập email...">
                <input type="password" name="password" class="field" placeholder="Nhập password...">

                <!-- <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p> -->
                <div>
                    <div><input type="submit" name="login" class"grey" value="Đăng nhập" class="btn-flat btn-hover"
                            style="margin-left:30px; margin-top:10px;">
                    </div>
                </div>
            </form>
        </div>

        <div class="register_account" style="height:68vh; width:30%;">
            <h3>Đăng ký tài khoản</h3>
            <p>Mời nhập thông tin</p>
            <?php 
    		if (isset($insertCustomer)) {
    			echo $insertCustomer;
    		}
    		 ?>
            <form action="" method="POST">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div>
                                    <input type="text" name="name" placeholder="Nhập Name...">
                                </div>
                                <div>
                                    <input type="text" name="email" placeholder="Nhập Email...">
                                </div>
                                <div>
                                    <input type="password" name="password" placeholder=" Nhập Password..." style="
    width: 100%;
    height: 33px;
    margin-top: 7px;
    margin-bottom:7px ;
	border: #FFF;
    border-radius: 5px ;
">
                                </div>
                                <div>
                                    <input type="text" name="address" placeholder="Nhập địa chỉ...">
                                </div>
                                <div>
                                    <input type="text" name="phone" placeholder="Nhập số điện thoại...">
                                </div>
                                <div>
                                    <input type="text" name="zipcode" placeholder="Nhập Zipcode...">
                                </div>
                                <div>
                                    <input type="text" name="city" placeholder="Nhập Thành Phố">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div style="margin-left:28%;margin-top:10px;"><input type="submit" name="submit" class"grey"
                        value="Tạo tài khoản" class="btn-flat btn-hover">
                </div>
        </div>
        </form>
    </div>

</div>
</div>


<?php 
	include 'inc/footer.php';
 ?>