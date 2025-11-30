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
    if(!isset($_GET['contactId']) || $_GET['contactId'] == NULL){
 }else {
    $id = $_GET['contactId']; 
}   
    
    
  ?>
  <?php
    $cs = new customer(); 
    if(!isset($_GET['customerid']) || $_GET['customerid'] == NULL){
      
    }else {
        $id = $_GET['customerid']; // Lấy catid trên host
    }
    
    
    
  ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2> Đơn Hàng</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID</th>
                        <th style=" width: 15%;">Tên Khách Hàng</th>
                        <th style=" width: 27%;">Địa Chỉ</th>
                        <th>Mã Zip</th>
                        <th>Số Điện Thoại</th>
                        <th>Mail</th>
                        <th>Đơn Hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $get_customer = $cs->show_all_customers();
                    if($get_customer){ 
                        $i = 0;
                        while ($result = $get_customer->fetch_assoc()) {
                            $i++; 
                        
                  ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['id']; ?></td>
                        <td style=" width: 15%;"><?php echo $result['name']; ?></td>
                        <td style=" width: 27%;"><?php echo $result['address']; ?></td>
                        <td><?php echo $result['zipcode']; ?></td>
                        <td><?php echo $result['phone']; ?></td>
                        <td><?php echo $result['email']; ?> </td>
                        <td> <a href="inbox.php?customer_id=<?php echo $result['id'] ?>">Xem đơn hàng</a> </td>
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