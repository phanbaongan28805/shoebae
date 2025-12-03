<?php ob_start(); ?>
<?php 
	include 'inc/header.php';
	
 ?>
<?php 
	$login_check = Session::get('customer_login');
	  if ($login_check==false) {
	  	header('Location:login.php');
	  }
 ?>
<?php 
	if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
       $customer_id = Session::get('customer_id');
       $insertOrder = $ct->insertOrder($customer_id);
       $delCart = $ct->del_all_data_cart();
   
      header('Location:orderdetails.php');
   
    }
 ?>
<style type="text/css">
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.box_left {
    width: 100%;
    padding: 30px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    margin-bottom: 30px;
}

.box_right {
    width: 100%;
    padding: 30px;
    background: #f5f5f5;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.payment-container {
    display: flex;
    gap: 30px;
    margin-top: 30px;
    flex-wrap: wrap;
}

.payment-container .box_left {
    flex: 1;
    min-width: 300px;
    margin-bottom: 0;
}

.payment-container .box_right {
    flex: 1;
    min-width: 300px;
}

.tblone {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.tblone th {
    background: #FF6600;
    color: white;
    padding: 15px;
    text-align: left;
    font-weight: bold;
    font-size: 14px;
}

.tblone td {
    padding: 12px 15px;
    border-bottom: 1px solid #eee;
    font-size: 14px;
}

.tblone tr:hover {
    background: #f9f9f9;
}

.tblone tr:last-child td {
    border-bottom: none;
}

.summary-table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

.summary-table tr {
    border-bottom: 1px solid #ddd;
}

.summary-table th {
    background: #FF6600;
    color: white;
    padding: 12px 15px;
    text-align: left;
    font-weight: bold;
}

.summary-table td {
    padding: 12px 15px;
}

.summary-table tr:last-child td {
    border-bottom: none;
    font-weight: bold;
    font-size: 16px;
    background: #f5f5f5;
}

.info-table {
    width: 100%;
    border-collapse: collapse;
}

.info-table td {
    padding: 12px 0;
    border-bottom: 1px solid #eee;
}

.info-table td:first-child {
    font-weight: bold;
    color: #FF6600;
    width: 35%;
}

.info-table td:nth-child(2) {
    width: 10%;
    text-align: center;
    color: #999;
}

.info-table tr:last-child td {
    border-bottom: none;
}

.info-table a {
    color: #FF6600;
    text-decoration: none;
    font-weight: bold;
}

.info-table a:hover {
    text-decoration: underline;
}

.button-group {
    display: flex;
    gap: 15px;
    justify-content: flex-end;
    margin-top: 30px;
    flex-wrap: wrap;
}

.btn-flat {
    padding: 12px 30px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
}

.btn-order {
    background: #FF6600;
    color: white;
}

.btn-order:hover {
    background: #E85A00;
    box-shadow: 0 4px 12px rgba(255,102,0,0.3);
    transform: translateY(-2px);
}

.btn-continue {
    background: #666;
    color: white;
}

.btn-continue:hover {
    background: #555;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    transform: translateY(-2px);
}

.btn-flat a {
    text-decoration: none;
    color: inherit;
    display: block;
}

.hidden-inputs {
    display: none;
}

.section-title {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin-bottom: 25px;
    border-bottom: 3px solid #FF6600;
    padding-bottom: 15px;
}

.empty-cart-message {
    padding: 40px;
    text-align: center;
    background: #fff3cd;
    border-radius: 8px;
    color: #856404;
    font-size: 16px;
}
</style>

<form action="" method="POST">
    <div class="main" style="min-height:calc(100vh - 200px);padding:40px 20px;">
        <div class="content" style="max-width:1200px;margin:0 auto;">
            <div class="section group">
                <h2 class="section-title">📦 Xác Nhận Đơn Hàng & Thanh Toán</h2>
                
                <div class="payment-container">
                <div class="box_left">
                    <div>
                        <h3 style="font-size:20px;color:#333;margin-bottom:20px;font-weight:bold;">🛒 Chi Tiết Giỏ Hàng</h3>
                        <?php 
			    	if (isset($update_quantity_Cart)) {
			    		echo $update_quantity_Cart;
			    	}
			    	 ?>
                        <?php 
			    	if (isset($delcart)) {
			    		echo $delcart;
			    	}
			    	 ?>
                        <?php
			    	 if(isset($delcart)){
			    	 	echo $delcart;
			    	 }
			    	?>
                        <table class="tblone">
                            <tr>
                                <th width="5%">STT</th>
                                <th width="20%">Tên Sản Phẩm</th>
                                <th width="20%">Giá</th>
                                <th width="15%">Số Lượng</th>
                                <th width="20%">Tổng Giá</th>
                            </tr>
                            <?php 
							$get_product_cart = $ct->get_product_cart();
							if($get_product_cart){
								$subtotal = 0;
								$qty = 0;
								$i=0;
								while ($result = $get_product_cart->fetch_assoc()) {
									$i++;
								
							 ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['productName'] ?></td>
                                <td><?php echo $fm->format_currency($result['price'])." VNĐ" ?></td>
                                <td style="text-align:center;"><?php echo $result['quantity'] ?></td>
                                <td><?php 
									$total = $result['price'] * $result['quantity'];
                                    echo $fm->format_currency($total)." VNĐ";
									 ?></td>
                            </tr>
                            <?php 
							$subtotal += $total;
							$qty = $qty + $result['quantity'];
								}
							}
							 ?>
                        </table>
                        <?php
							$check_cart = $ct->check_cart();
							if ($check_cart) {

							 ?>
                        <table class="summary-table">
                            <tr>
                                <th colspan="2">TỔNG HÓA ĐƠN</th>
                            </tr>
                            <tr>
                                <td>Tổng Giá Hàng:</td>
                                <td>
                                    <?php echo $fm->format_currency($subtotal)." VNĐ";
									  Session::set('sum',$subtotal);
									  Session::set('qty',$qty);
								?></td>
                            </tr>
                            <tr>
                                <td>Vận Chuyển:</td>
                                <td><?php echo $vat = 30000.0. ' VNĐ';?></td>
                            </tr>
                            <tr>
                                <td>Tổng Cộng:</td>
                                <td><?php 
								$vat = 30000.0;
								$grandTotal = $subtotal + $vat;
                                echo $fm->format_currency($grandTotal)." VNĐ";
								 ?></td>
                            </tr>
                        </table>
                        <?php 
						}else {
							echo '<div class="empty-cart-message">⚠️ Giỏ hàng của bạn hiện đang trống. Vui lòng thêm sản phẩm trước khi thanh toán!</div>';
						}
					    ?>
                    </div>
                </div>
                
                <div class="box_right">
                    <form id="myForm">
                        <h3 style="font-size:20px;color:#333;margin-bottom:20px;font-weight:bold;">👤 Thông Tin Giao Hàng</h3>
                        <div class="hidden-inputs">
                            <input id="name" type="text" readonly="readonly" value="Shoebae">
                            <input id="email" readonly="readonly" type="text" value="">
                            <input id="subject" readonly="readonly" type="text" value="Chúng tôi đã nhận được đơn hàng của bạn">
                            <input id="body" type="text" readonly="readonly" value="Cảm ơn bạn đã ghé thăm chúng tôi, đơn hàng của bạn sẽ nhanh chóng được gửi đi.">
                        </div>
                        
                        <table class="info-table">
                            <?php 
		    		$id = Session::get('customer_id');
		    		$get_customers = $cs->show_customers($id);
		    		if ($get_customers) {
		    			while ($result = $get_customers->fetch_assoc()) {
		    			
		    		 ?>
                            <tr>
                                <td>Tên Khách Hàng</td>
                                <td>:</td>
                                <td><?php echo $result['name']; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><?php echo $result['email']; ?></td>
                            </tr>
                            <tr>
                                <td>Thành Phố</td>
                                <td>:</td>
                                <td><?php echo $result['city']; ?></td>
                            </tr>
                            <tr>
                                <td>Số Điện Thoại</td>
                                <td>:</td>
                                <td><?php echo $result['phone']; ?></td>
                            </tr>
                            <tr>
                                <td>Mã Bưu Điện</td>
                                <td>:</td>
                                <td><?php echo $result['zipcode']; ?></td>
                            </tr>
                            <tr>
                                <td>Địa Chỉ Giao Hàng</td>
                                <td>:</td>
                                <td><?php echo $result['address']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="3"><a href="editprofile.php">✏️ Cập Nhật Thông Tin</a></td>
                            </tr>
                            <?php 
		    		}
		    		}
		    		 ?>
                        </table>
                    </form>
                </div>
                </div>

                <div class="button-group">
                    <a href="index.php" class="btn-flat btn-continue">🛍️ Tiếp Tục Mua Hàng</a>
                    <a href="?orderid=order" class="btn-flat btn-order" onclick="sendEmail()">💵 Thanh toán khi nhận hàng</a>
                    <form action="vnpay_process.php" method="POST">
                        <input type="hidden" name="amount" value="<?php echo $grandTotal ?>">
                        <button type="submit" name="redirect" class="btn-flat btn-order" style="background-color: #005c94;">💳 Thanh toán VNPAY</button>
                    </form>
                </div>
            </div>

        </div>


    </div>
</form>
<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
function sendEmail() {
    var name = $("#name");
    var email = $("#email");
    var subject = $("#subject");
    var body = $("#body");

    if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(
            body)) {
        $.ajax({
            url: 'sendEmail.php',
            method: 'POST',
            dataType: 'json',
            data: {
                name: name.val(),
                email: email.val(),
                subject: subject.val(),
                body: body.val()
            },
            success: function(response) {
                $('#myForm')[0].reset();
                $('.sent-notification').text("Message Sent Successfully.");

            }
        });
    }
    alert("Đơn hàng đã được đặt thành công!!");
}

function isNotEmpty(caller) {
    if (caller.val() == "") {
        caller.css('border', '1px solid red');
        return false;
    } else
        caller.css('border', '');

    return true;
}
</script>
<?php 
	include 'inc/footer.php';
 ?>
