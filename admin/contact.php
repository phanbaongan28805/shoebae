<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/customer.php';  ?>
<?php require_once '../helpers/format.php'; ?>

<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/customer.php');
    include_once ($filepath.'/../helpers/format.php');
 ?>
<?php
    $cs = new customer(); 
    if(!isset($_GET['customerid']) || $_GET['customerid'] == NULL){
       
        
    }
    
    
    
  ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách khách hàng</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th style="width: 5%;">No.</th>
                        <th style="width: 5%;">Id</th>
                        <th style="width: 15%;">Tên Khách Hàng</th>
                        <th style="width: 15%;">Mail</th>
                        <th style="width: 10%;">Số Điện Thoại</th>
                        <th style="width: 25%;">Tin Nhắn</th>
                        <th style="width: 10%;">Phản Hồi</th>

                    </tr>
                </thead>
                <tbody>

                    <?php 
                     $get_customer = $cs->show_contact();
                     if($get_customer){
                        $i = 0;
                        while ($result = $get_customer->fetch_assoc()) {
                            $i++; 
                        
                  ?>
                    <tr class="odd gradeX">
                        <td style="width: 5%;"><?php echo $i; ?></td>
                        <td style="width: 5%;"><?php echo $result['contactId']; ?></td>
                        <td style="width: 15%;"><?php echo $result['name']; ?></td>
                        <td style="width: 15%;"><?php echo $result['email']; ?></td>
                        <td style="width: 10%;"><?php echo $result['phone']; ?></td>
                        <td style="width: 25%;"><?php echo $result['mess']; ?></td>
                        <td style="width: 10%;"><a href="repmail.php?id=<?php echo $result['contactId']?>">Trả lời</a>
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