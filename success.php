<?php 
	include 'inc/header.php';
 ?>
<style type="text/css">
.success-container {
    padding: 40px 20px;
    max-width: 1200px;
    margin: 0 auto;
}
.success-headline {
    font-size: 28px;
    font-weight: bold;
    color: #4CAF50; /* Green for success */
    text-align: center;
    margin-bottom: 20px;
}
.success-message {
    text-align: center;
    font-size: 16px;
    color: #333;
    margin-bottom: 30px;
}
.order-details-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}
.order-details-table th, .order-details-table td {
    border: 1px solid #ddd;
    padding: 12px 15px;
    text-align: left;
}
.order-details-table th {
    background-color: #f2f2f2;
    font-weight: bold;
}
.order-details-table img {
    max-width: 80px;
    border-radius: 4px;
}
.button-container {
    text-align: center;
    margin-top: 40px;
}
.btn-continue-shopping {
    display: inline-block;
    padding: 12px 30px;
    background: #FF6600;
    color: white;
    text-decoration: none;
    font-weight: bold;
    border-radius: 5px;
    transition: background 0.3s;
}
.btn-continue-shopping:hover {
    background: #E85A00;
}
</style>

<div class="main">
    <div class="content">
        <div class="success-container">
            <h2 class="success-headline">🎉 Đặt Hàng Thành Công 🎉</h2>
            <p class="success-message">Cảm ơn bạn đã tin tưởng và mua sắm tại Shoebae. Đơn hàng của bạn đã được tiếp nhận và sẽ được xử lý trong thời gian sớm nhất.</p>
            
            <h3 style="font-size: 20px; margin-bottom: 15px; border-bottom: 2px solid #333; padding-bottom: 10px;">CHI TIẾT ĐƠN HÀNG</h3>
            <table class="order-details-table">
                <tr>
                    <th width="5%">STT</th>
                    <th width="20%">Tên sản phẩm</th>
                    <th width="15%">Hình ảnh</th>
                    <th width="10%">Size</th>
                    <th width="15%">Giá</th>
                    <th width="10%">Số lượng</th>
                    <th width="15%">Ngày</th>
                    <th width="10%">Trạng thái</th>
                </tr>
                <?php
                    $customer_id = Session::get('customer_id');  
                    $get_cart_ordered = $ct->get_cart_ordered($customer_id);
                    if($get_cart_ordered){
                        $i=0;
                        while ($result = $get_cart_ordered->fetch_assoc()) {
                        $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $result['productName'] ?></td>
                    <td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
                    <td><?php echo $result['size'] ?></td>
                    <td><?php echo $fm->format_currency($result['price'])." VNĐ" ?></td>
                    <td><?php echo $result['quantity'] ?></td>
                    <td><?php echo $fm->formatDate($result['date_order']) ?></td>
                    <td>
                        <?php 
                            if ($result['status'] == '3') {
                                echo "Chờ thanh toán VNPAY";
                            } elseif ($result['status'] == '0') {
                                echo "Đang chờ xử lý";
                            } elseif ($result['status'] == 1) {
                                echo 'Đang giao hàng';
                            } elseif ($result['status'] == 2) {
                                echo 'Đã nhận';
                            }
                        ?>
                    </td>
                </tr>
                <?php 							
                        }
                    }
                ?>
            </table>
            <div class="button-container">
                <a href="index.php" class="btn-continue-shopping">🛍️ Tiếp tục mua hàng</a>
            </div>
        </div>
    </div>
</div>
<?php 
	include 'inc/footer.php';
 ?>