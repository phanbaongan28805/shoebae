<?php include 'inc/header.php'; ?>
<?php include '../classes/customer.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/cart.php');
include_once($filepath . '/../classes/customer.php');
include_once($filepath . '/../helpers/format.php');
?>
<?php
$cs = new customer();
if (!isset($_GET['customerid']) || $_GET['customerid'] == NULL) {

} else {
    $id = $_GET['customerid']; // Lấy catid trên host
}



?>
<?php
$ct = new cart();

if (isset($_GET['shiftid'])) {
    $user = $_GET['customer_id'];
    $id = $_GET['shiftid'];
    $proid = $_GET['proid'];
    $qty = $_GET['qty'];
    $time = $_GET['time'];
    $price = $_GET['price'];
    $shifted = $ct->shifted($id, $proid, $qty, $time, $price);
    header("Location: inbox.php?customer_id=$user");
}

if (isset($_GET['delid'])) {
    $id = $_GET['delid'];

    $time = $_GET['time'];
    $price = $_GET['price'];
    $del_shifted = $ct->del_shifted($id, $time, $price);
}

?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Chi Tiết Đơn hàng</h2>
        <div class="block">
            <?php
            if (isset($shifted)) {
                echo $shifted;
            }
            ?>
            <?php
            if (isset($del_shifted)) {
                echo $del_shifted;
            }
            ?>
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Ngày đặt</th>
                        <th>Hình</th>
                        <th>Sản phẩm</th>
                        <th>Size</th>
                        <th>Số lượng</th>
                        <th>Giá</th>


                        <th>Xử lý</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($_GET['customer_id'])){
                        $customer_id = $_GET['customer_id'];
                        $get_cart_ordered = $ct->get_cart_ordered($customer_id);
                        if ($get_cart_ordered) {
                            $i = 0;
                            $qty = 0;
                            while ($result = $get_cart_ordered->fetch_assoc()) {
                                $i++;
                                ?>
                                <tr class="odd gradeX">
    
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $result['date_order']; ?></td>
                                    <td><img src="uploads/<?php echo $result['image'] ?>" width="80"> </td>
                                    <td><?php echo $result['productName'] ?> </td>
                                    <td><?php echo $result['size'] ?></td>
                                    <td><?php echo $result['quantity'] ?></td>
                                    <td><?php echo $result['price'] . ' VNĐ' ?></td>
    
    
                                    <td>
                                        <?php
                                        if ($result['status'] == 0) {
                                            ?>
    
                                            <a
                                                href="?customer_id=<?php echo $customer_id ?>&shiftid=<?php echo $result['id'] ?>&qty=<?php echo $result['quantity'] ?>&proid=<?php echo $result['productId'] ?>&price=<?php echo $result['price']; ?>&time=<?php echo $result['date_order'] ?>">Đang
                                                chờ xử lý
                                            <?php
                                        } elseif ($result['status'] == 1) {
                                            ?>
    
                                                <?php
                                                echo 'Đang giao hàng...';
                                                ?>
    
                                            <?php
                                        } elseif ($result['status'] == 2) {
    
                                            ?>
                                                <a
                                                    href="?delid=<?php echo $result['id'] ?>&price=<?php echo $result['price']; ?>&time=<?php echo $result['date_order'] ?>">Xóa
                                                    đơn</a>
                                            <?php
                                        }
                                        ?>
                                    </td>
    
                                </tr>
                            <?php
                            }
                        }
                    }
                    
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php'; ?>