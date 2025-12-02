<?php 
	include 'inc/header.php'; 
	// gọi file adminlogin
	include 'classes/adminlogin.php';
 ?>
	


 <?php
 	// gọi class adminlogin
 	$class = new adminlogin(); 
 	if($_SERVER['REQUEST_METHOD'] == 'POST'){
 		// LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
 		$adminUser = $_POST['username'];
 		// $adminPass = md5($_POST['adminPass']);
        $adminPass = $_POST['password'];

 		$login_check = $class -> longin_admin($adminUser,$adminPass); // hàm check User and Pass khi submit lên

 	}
  ?>
<div class="main" style="min-height:calc(100vh - 200px);display:flex;justify-content:center;align-items:center;padding:40px 0;">
    <div class=" content">
        <div class="login_panel" style="width:450px;background:#f5f5f5;padding:40px;border-radius:8px;box-shadow:0 2px 10px rgba(0,0,0,0.1);">
            <h3 style="text-align:center;font-size:24px;margin-bottom:10px;">Đăng nhập</h3>
            <p style="text-align:center;color:#666;margin-bottom:25px;">Xin chào ADMIN</p>
            <?php 
    		if (isset($login_Customer)) {
    			echo $login_Customer;
    		}
    		 ?>
            <form action="" method="POST">
                <input type="text" name="username" class="field" placeholder="Nhập username..." style="width:100%;padding:12px;margin-bottom:15px;border:1px solid #ddd;border-radius:5px;box-sizing:border-box;font-size:14px;">
                <input type="password" name="password" class="field" placeholder="Nhập password..." style="width:100%;padding:12px;margin-bottom:20px;border:1px solid #ddd;border-radius:5px;box-sizing:border-box;font-size:14px;">

                <!-- <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p> -->
                <div style="text-align:center;">
                    <input type="submit" name="login" value="Đăng nhập" style="width:100%;padding:12px;background:#FF6600;color:white;border:none;border-radius:5px;font-size:16px;font-weight:bold;cursor:pointer;transition:background 0.3s;">
                </div>
            </form>
            <p style="margin-top:20px;text-align:center;color:#666;">Chưa có tài khoản? <a href="register.php" style="color:#FF6600;text-decoration:none;font-weight:bold;">Đăng ký tại đây</a>
        <a href="login.php" style="color:#FF6600;text-decoration:none;font-weight:bold;">    Customer</a></p>
        </div>
    </div>

</div>
</div>


<?php 
	include 'inc/footer.php';
 ?>