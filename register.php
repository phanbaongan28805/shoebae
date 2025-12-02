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
<div class="main" style="min-height:calc(100vh - 200px);display:flex;justify-content:center;align-items:center;padding:40px 20px;width:100%;box-sizing:border-box;">
    <div class="content" style="width:100%;max-width:750px;box-sizing:border-box;">
        <div class="register_account" style="width:100%; height:100%;background:#f5f5f5;padding:40px;border-radius:8px;box-shadow:0 2px 10px rgba(0,0,0,0.1);">

            <h3 style="text-align:center;font-size:24px;margin-bottom:10px;">Đăng ký tài khoản</h3>
            <p style="text-align:center;color:#666;margin-bottom:25px;">Mời nhập thông tin</p>

            <?php 
                if (isset($insertCustomer)) {
                    echo $insertCustomer;
                }
            ?>

            <form action="" method="POST">
                <div style="display:flex;gap:15px;">
                    <div style="flex:1;">
                        <input required type="text" name="name" placeholder="Nhập Name..." style="width:100%;padding:12px;margin-bottom:12px;border:1px solid #ddd;border-radius:5px;box-sizing:border-box;font-size:14px;">
                    </div>
                    <div style="flex:1;">
                        <input required type="email" name="email" placeholder="Nhập Email..." style="width:100%;padding:12px;margin-bottom:12px;border:1px solid #ddd;border-radius:5px;box-sizing:border-box;font-size:14px;">
                    </div>
                </div>

                <div style="display:flex;gap:15px;">
                    <div style="flex:1;">
                        <input required type="password" name="password" placeholder="Nhập Password..." style="width:100%;padding:12px;margin-bottom:12px;border:1px solid #ddd;border-radius:5px;box-sizing:border-box;font-size:14px;">
                    </div>
                    <div style="flex:1;">
                        <input required type="text" name="phone" placeholder="Nhập số điện thoại..." style="width:100%;padding:12px;margin-bottom:12px;border:1px solid #ddd;border-radius:5px;box-sizing:border-box;font-size:14px;">
                    </div>
                </div>

                <div style="display:flex;gap:15px;">
                    <div style="flex:1;">
                        <input required type="text" name="address" placeholder="Nhập địa chỉ..." style="width:100%;padding:12px;margin-bottom:12px;border:1px solid #ddd;border-radius:5px;box-sizing:border-box;font-size:14px;">
                    </div>
                    <div style="flex:1;">
                        <input required type="text" name="zipcode" placeholder="Nhập Zipcode..." style="width:100%;padding:12px;margin-bottom:12px;border:1px solid #ddd;border-radius:5px;box-sizing:border-box;font-size:14px;">
                    </div>
                </div>

                <div>
                    <input required type="text" name="city" placeholder="Nhập Thành Phố..." style="width:100%;padding:12px;margin-bottom:20px;border:1px solid #ddd;border-radius:5px;box-sizing:border-box;font-size:14px;">
                </div>

                <div style="text-align:center;">
                    <input type="submit" name="submit" value="Tạo tài khoản" style="width:100%;padding:12px;background:#FF6600;color:white;border:none;border-radius:5px;font-size:16px;font-weight:bold;cursor:pointer;">
                </div>
            </form>

            <p style="margin-top:20px;text-align:center;color:#666;">Đã có tài khoản? 
                <a href="login.php" style="color:#FF6600;text-decoration:none;font-weight:bold;">Đăng nhập tại đây</a>
            </p>

        </div>
    </div>
</div>


<?php 
	include 'inc/footer.php';
 ?>
