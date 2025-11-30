<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/customer.php');
     include_once ($filepath.'/../helpers/format.php');
 ?>

<?php
    $cs = new customer(); 
    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }
    
    
    
  ?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<style>
.container {
    padding: 3em;
    display: grid;
    grid-gap: 2em;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
}

.quote {
    background: #bebbb8;
    padding: 2em;
    border-radius: 20px 50px;
    box-shadow: 10px 10px 30px rgba(0, 0, 0, 0.439);
    transition: transform 0.3s ease-in-out;
}

.quote:hover {

    transform: scale(1.03);
}

h3 {

    padding: 10px 0;
    font-size: 25px;
    margin-left: 10%;
    font-weight: bold;
    position: relative;
    color: #0f0f0e;
}

p {
    margin-top: 0;
    color: #0f0f0e;
}

span a {

    font-weight: bold;
    position: relative;
    margin-left: 18px;

}

&:before {
    content: '';
    color: #000;
    position: absolute;
    height: 1px;
    width: 10px;
    border-bottom: 1px solid black;
    top: 10px;
    left: -15px;



}

@media (min-width: 550px) {
    /* 
    .span-2 {
        grid-column: auto / span 2;
    } */

}
</style>
<div class="grid_10">
    <br>
    <div class="box round first grid">
        <h2> Dashboard</h2>
        <div class="container">
            <?php 
                     $get_customer = $cs-> show_sldonhang();
                     if($get_customer){
                        $i = 0;
                        while ($result = $get_customer->fetch_assoc()) {
                            $i++; 
                        
                  ?>
            <div class="quote">
                <span><a href="info.php" style=" color: #0f0f0e;">Đơn Hàng</a></span>
                <h3> <?php echo $result['COUNT(*)']; ?>
                </h3>
                <p>Số lượng đơn hàng cập nhất mới nhất</p>
            </div>
            <?php 
							}
						}
						 ?>
            <?php 
                     $get_customer = $cs-> show_doanhthu();
                     if($get_customer){
                        $i = 0;
                        while ($result = $get_customer->fetch_assoc()) {
                            $i++; 
                        
                  ?>
            <div class="quote span-2">
                <span><a href="" style=" color: #0f0f0e;">Doanh Thu</a></span>
                <h3><?php echo number_format($result['SUM(price)'])?> VNĐ

                </h3>
                <p>Tổng doanh thu được cập nhật mới nhất</p>
            </div>
            <?php 
							}
						}
						 ?>
            <?php 
                     $get_customer = $cs-> show_slkhachhang();
                     if($get_customer){
                        $i = 0;
                        while ($result = $get_customer->fetch_assoc()) {
                            $i++; 
                        
                  ?>
            <div class="quote">
                <span><a href="" style=" color: #0f0f0e;">Khách Hàng</a></span>
                <h3> <?php echo $result['COUNT(*)']; ?>
                </h3>
                <p>Số lượng khách hàng đã đăng ký </p>
            </div>
            <?php 
							}
						}
						 ?>
            <?php 
                     $get_customer = $cs-> show_slsanpham ();
                     if($get_customer){
                        $i = 0;
                        while ($result = $get_customer->fetch_assoc()) {
                            $i++; 
                        
                  ?>
            <div class="quote">
                <span><a href="productlist.php" style="color: #0f0f0e;">Các mẫu</a></span>
                <h3>
                    <?php echo $result['COUNT(*)']; ?>
                </h3>
                <p>Số lượng các mẫu đang kinh doanh</p>
            </div>
            <?php 
							}
						}
						 ?>
            <?php 
                     $get_customer = $cs-> show_slphanhoi();
                     if($get_customer){
                        $i = 0;
                        while ($result = $get_customer->fetch_assoc()) {
                            $i++; 
                        
                  ?>
            <div class="quote">
                <span><a href="contact.php" style="color: #0f0f0e;">Phản Hồi</a></span>
                <h3> <?php echo $result['COUNT(*)']; ?>
                </h3>
                <p>Số lượng phản hồi từ khách hàng</p>

            </div>
            <?php 
							}
						}
						 ?>
            <?php 
                     $get_customer = $cs-> show_slspkho();
                     if($get_customer){
                        $i = 0;
                        while ($result = $get_customer->fetch_assoc()) {
                            $i++; 
                        
                  ?>
            <div class="quote">
                <span><a href="warehouse.php" style=" color: #0f0f0e;">Kho</a></span>
                <h3><?php echo $result['SUM(product_remain)'];?>
                </h3>
                <p>Số lượng sản phẩm trong kho</p>
            </div>
            <?php 
							}
						}
						 ?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>