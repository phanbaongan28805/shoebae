<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/staff.php';  ?>
<?php require_once '../helpers/format.php'; ?>
<?php 
	$st = new staff();
	$fm = new Format();
	
	// Handle delete
	if(isset($_GET['delete']) && $_GET['delete'] == 'ok'){
		if(!isset($_GET['id']) || $_GET['id'] == NULL){
			// Redirect if no ID
		}else {
			$id = $_GET['id'];
			$del = $st->delete_staff($id);
		}
	}
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Quản lí Nhân viên</h2>
        <div class="block">
            <?php 
				if(isset($del)){
					echo $del;
				}
			 ?>
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên đăng nhập</th>
                        <th>Tên nhân viên</th>
                        <th>Chức vụ</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
					$stafflist = $st->show_staff();
					$i = 0;
					
					if($stafflist){
						while ($result = $stafflist->fetch_assoc()){
							$i++;
					 ?>
                    <tr class="odd gradeX">
                        <td><?php echo $result['adminId'] ?></td>
                        <td><?php echo $result['adminUser'] ?></td>
                        <td><?php echo $result['adminName'] ?></td>
                        <td>
                            <?php 
								$role = $result['role'];
								if($role === 'admin'){
									echo '<span style="background:#653092;color:#fff;padding:4px 10px;border-radius:4px;">Admin</span>';
								}elseif($role === 'sale'){
									echo '<span style="background:#3498db;color:#fff;padding:4px 10px;border-radius:4px;">Sale</span>';
								}elseif($role === 'bunker'){
									echo '<span style="background:#f39c12;color:#fff;padding:4px 10px;border-radius:4px;">Kho hàng</span>';
								}
							 ?>
                        </td>
                        <td>
                            <a href="staffedit.php?id=<?php echo $result['adminId'] ?>" class="btn-edit" style="padding:4px 8px;background:#3498db;color:#fff;text-decoration:none;border-radius:3px;margin-right:5px;">Sửa</a>
                            <a href="?delete=ok&id=<?php echo $result['adminId'] ?>" onclick="return confirm('Xác nhận xóa?')" class="btn-delete" style="padding:4px 8px;background:#e74c3c;color:#fff;text-decoration:none;border-radius:3px;">Xóa</a>
                        </td>
                    </tr>
                    <?php
						}
					}
					?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    setupLeftMenu();
    $('.datatable').dataTable();
    setSidebarHeight();
});
</script>
<?php include 'inc/footer.php';?>
