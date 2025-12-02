<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/staff.php';  ?>
<?php require_once '../helpers/format.php'; ?>
<?php 
	$st = new staff();
	$fm = new Format();
	
	// Get staff ID
	if(!isset($_GET['id']) || $_GET['id'] == NULL){
		// Redirect if no ID
		header("Location:stafflist.php");
	}else {
		$id = $_GET['id'];
		$get_staff = $st->get_staff_by_id($id);
		$staff_data = $get_staff->fetch_assoc();
	}
	
	// Handle form submission
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
		$result = $st->update_staff($_POST, $id);
		if($result){
			$get_staff = $st->get_staff_by_id($id);
			$staff_data = $get_staff->fetch_assoc();
		}
	}
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa Nhân viên</h2>
        <div class="block">
            <?php 
				if(isset($result)){
					echo '<div style="padding:10px;background:#d4edda;color:#155724;border-radius:4px;margin-bottom:15px;">'.$result.'</div>';
				}
			 ?>
            <form action="" method="post">
                <div class="form-group">
                    <label>Tên đăng nhập:</label>
                    <input type="text" name="adminUser" class="form-control" value="<?php echo isset($staff_data['adminUser']) ? $staff_data['adminUser'] : ''; ?>" required style="width:100%;padding:10px;margin-bottom:15px;border:1px solid #ddd;border-radius:4px;box-sizing:border-box;" />
                </div>

                <div class="form-group">
                    <label>Mật khẩu:</label>
                    <input type="password" name="adminPass" class="form-control" value="<?php echo isset($staff_data['adminPass']) ? $staff_data['adminPass'] : ''; ?>" required style="width:100%;padding:10px;margin-bottom:15px;border:1px solid #ddd;border-radius:4px;box-sizing:border-box;" />
                </div>

                <div class="form-group">
                    <label>Tên nhân viên:</label>
                    <input type="text" name="adminName" class="form-control" value="<?php echo isset($staff_data['adminName']) ? $staff_data['adminName'] : ''; ?>" required style="width:100%;padding:10px;margin-bottom:15px;border:1px solid #ddd;border-radius:4px;box-sizing:border-box;" />
                </div>

                <div class="form-group">
                    <label>Chức vụ:</label>
                    <select name="role" class="form-control" required style="width:100%;padding:10px;margin-bottom:15px;border:1px solid #ddd;border-radius:4px;box-sizing:border-box;">
                        <option value="">-- Chọn chức vụ --</option>
                        <option value="admin" <?php echo (isset($staff_data['role']) && $staff_data['role'] === 'admin') ? 'selected' : ''; ?>>Admin</option>
                        <option value="sale" <?php echo (isset($staff_data['role']) && $staff_data['role'] === 'sale') ? 'selected' : ''; ?>>Sale</option>
                        <option value="bunker" <?php echo (isset($staff_data['role']) && $staff_data['role'] === 'bunker') ? 'selected' : ''; ?>>Kho hàng</option>
                    </select>
                </div>

                <div style="margin-top:20px;">
                    <button type="submit" name="update" class="btn" style="padding:10px 20px;background:#653092;color:#fff;border:none;border-radius:4px;cursor:pointer;font-weight:bold;">Cập nhật</button>
                    <a href="stafflist.php" class="btn" style="padding:10px 20px;background:#6c757d;color:#fff;border:none;border-radius:4px;cursor:pointer;text-decoration:none;display:inline-block;">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'inc/footer.php';?>
