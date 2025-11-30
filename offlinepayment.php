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
.box_left {
    width: 50%;
    border: 1px solid #666;
    float: left;
    padding: 4px;

}

.box_right {
    width: 47%;
    border: 1px solid #666;
    float: right;
    padding: 4px;
}

.a_order {
    background: #653092;
    color: aliceblue;
    padding: 10px;
    font-size: 25px;
    border-radius: none;
    cursor: pointer;
}
}
</style>

<form action="" method="POST">
    <div class="main">
        <div class="content">
            <div class="section group">
                <!-- <div class="section-header">
                    <h3 style=";text-align: center;  font-size: 25px;">Thanh Toán</h3>
                </div> -->
                <div class="heading">

                </div><br><br><br>
                <div class="clear"></div>
                <div class="box_left">
                    <div>

                        <!-- <h3 style="padding-left:10px; font-size: 25px;">Giỏ hàng của bạn</h3> -->
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
                                <th width="5%">Stt</th>
                                <th width="15%">Tên sản phẩm</th>
                                <th width="25%">Giá</th>
                                <th width="15%">Số lượng</th>
                                <th width="20%">Tổng giá</th>

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

                                <td><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></td>
                                <td>
                                    <?php echo $result['quantity'] ?>
                                </td>
                                <td>
                                    <?php 
									$total = $result['price'] * $result['quantity'];
                                    echo $fm->format_currency( $total)." VND";
									 ?>
                                </td>

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
                        <table style="float:right;text-align:left;" width="40%">
                            <tr>
                                <th>Tổng giá : </th>
                                <td>
                                    <?php echo $fm->format_currency( $subtotal)." VND";

									  Session::set('sum',$subtotal);
									  Session::set('qty',$qty);
								?>
                                </td>
                            </tr>
                            <tr>
                                <th>Vận Chuyển : </th>
                                <td><?php echo $vat = 30000.0. ' VND';?></td>
                            </tr>
                            <tr>
                                <th>Tổng cộng :</th>
                                <td><?php 
								$vat = 30000.0;
								$grandTotal = $subtotal + $vat;
                                echo $fm->format_currency($grandTotal)." VND";
								 ?> </td>
                            </tr>
                        </table>
                        <?php 
						}else {
							echo 'Hiện tại không có sản phẩm nào cần thanh toán!!!';
						}
					    ?>
                    </div>


                </div>
                <div class="box_right">
                    <form id="myForm">
                        <table class="tblone">
                            <?php 
		    		$id = Session::get('customer_id');
		    		$get_customers = $cs->show_customers($id);
		    		if ($get_customers) {
		    			while ($result = $get_customers->fetch_assoc()) {
		    			
		    		 ?>
                            <td> <input id="name" type="text" readonly="readonly" value="Siz Sneaker"
                                    style=" color:#fff;border: #fff;margin-top:-1300px; z-index: 100;">
                                <input id="email" readonly="readonly" type="text"
                                    value="<?php echo $result['email']; ?>"
                                    style=" color:#fff;border: #fff;margin-top:-1300px; z-index: 100;">
                                <input id="subject" readonly="readonly" type="text"
                                    value="Chúng tôi đã nhận được đơn hàng của bạn"
                                    style=" color:#fff;border: #fff;margin-top:-1300px; z-index: 100;">
                                <input id="body" type="text" readonly="readonly"
                                    value="Cảm ơn bạn đã ghé thăm chúng tôi, đơn hàng của bạn sẽ nhanh chóng được gửi đi."
                                    style=" color:#fff;border: #fff;margin-top:-1300px; z-index: 100;">
                            </td>
                            <tr>
                                <td>Tên</td>
                                <td>:</td>
                                <td><?php echo $result['name']; ?></td>
                            </tr>
                            <tr>
                                <td> Email</td>
                                <td>:</td>
                                <td><?php echo $result['email']; ?></td>
                            </tr>
                            <tr>
                                <td>Thành Phố</td>
                                <td>:</td>
                                <td><?php echo $result['city']; ?></td>
                            </tr>
                            <tr>
                                <td>Số điện thoại</td>
                                <td>:</td>
                                <td><?php echo $result['phone']; ?></td>
                            </tr>

                            <tr>
                                <td>Mã bưu điện</td>
                                <td>:</td>
                                <td><?php echo $result['zipcode']; ?></td>
                            </tr>

                            <tr>
                                <td>Địa chỉ</td>
                                <td>:</td>
                                <td><?php echo $result['address']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="3"><a href="editprofile.php">Cập nhật thông tin</a></td>

                            </tr>

                            <?php 
		    		}
		    		}
		    		 ?>
                        </table>
                    </form>


                </div>

                <button onclick="sendEmail()" class="btn-flat btn-hover"
                    style=" float:right;margin-right:100px;margin-top:30px;"> <a href="?orderid=order">Đặt hàng
                        ngay</a>
                </button>
                <button class="btn-flat btn-hover" style=" float:right;margin-right:100px;margin-top:30px;"> <a
                        href="index.php">Tiếp Tục Mua Hàng</a>
                </button>
            </div>

        </div>


    </div>
</form>
<script src=" js/jquery-3.2.1.min.js" type="text/javascript"></script>
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