<?php 
    session_start();
?><?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
<?php
    if(isset($_GET['cartid'])){
        $cartid = $_GET['cartid']; 
        $delcart = $ct->del_product_cart($cartid);
    }
        
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $cartId = $_POST['cartId'];
        $proId = $_POST['proId'];
        $quantity = $_POST['quantity'];
        $update_quantity_Cart = $ct -> update_quantity_Cart($proId,$cartId, $quantity); // hàm check catName khi submit lên
    	if ($quantity <= 0) {
    		$delcart = $ct->del_product_cart($cartId);
    	}
    } 
 ?>
<?php
	if(!isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
	}
?>

<div class="main">
    <div class="content">
        <div class="section-header">

        </div>
        <div class="cartoption">
            <h3
                style="margin-bottom: 20px;float:left;font-size: 16px;margin-left:30px;margin-top:-35px;font-family:Tahoma, sans-serif;">
                Giỏ Hàng Của
                Bạn
            </h3>

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


            <table class="tblone">
                <tr>
                    <th width="20%">Tên sản phẩm</th>
                    <th width="10%">Hình ảnh</th>
                    <th width="15%">Giá</th>
                    <th width="10%">Size</th>
                    <th width="20%">Số lượng</th>
                    <th width="10%">Tổng giá</th>
                    <th width="10%">Xử lý</th>
                </tr>

                <?php 
							$get_product_cart = $ct->get_product_cart();
							if($get_product_cart){
								$subtotal = 0;
								$qty = 0;
								while ($result = $get_product_cart->fetch_assoc()) {
									
								
							 ?>
                <tr>
                    <td width="20%"><?php echo $result['productName'] ?></td>
                    <td width="10%"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></td>
                    <td width="15%"><?php echo $fm->format_currency($result['price'])." VND" ?></td>
                    <td width="10%"><?php echo $fm->format_currency($result['size'])." " ?></td>
                    <td width="20%">
                        <form action="" method="post">
                            <input type="hidden" name="cartId" min="0" value="<?php echo $result['cartId'] ?>" />
                            <input type="hidden" name="proId" min="0" value="<?php echo $result['productId'] ?>" />
                            <input type="number" name="quantity" min="0" value="<?php echo $result['quantity'] ?>" />
                            <input type="submit" name="submit" value="Update" />
                        </form>
                    </td>
                    <td>
                        <?php 
									$total = $result['price'] * $result['quantity'];
									echo $fm->format_currency($total)." VND";
									 ?>
                    </td>
                    <td><a href="?cartid=<?php echo $result['cartId'] ?>">Xóa</a></td>
                </tr>
                <?php 

							$subtotal += $total;
							$qty = $qty + $result['quantity'];
								}
							}
							 ?>

            </table>
        </div>

        <?php
							$check_cart = $ct->check_cart();
							if ($check_cart) {

							 ?>
        <div class="shopping">
            <table style=" float:right; width:40%;margin-top: 30px; ">
                <tr>
                    <th>Sub Total : </th>
                    <td>
                        <?php echo $fm->format_currency($subtotal)." VND";

									  Session::set('sum',$subtotal);
									  Session::set('qty',$qty);
								?>
                    </td>
                </tr>
                <tr>
                    <th>Vận Chuyển </th>
                    <td>30.000 VND</td>
                </tr>
                <tr>
                    <th>Grand Total :</th>
                    <td><?php 
								$vat = 30000.0;
								$grandTotal = $subtotal + $vat ;
								echo $fm->format_currency($grandTotal)." VND";
								 ?> </td>
                </tr>
                <tr>

                    <td> <button class="btn-flat btn-hover" style="width:220px;margin-top:15px;">
                            <a href="offlinepayment.php">Tiến
                                hành
                                thanh
                                toán</a>
                        </button></td>
                </tr>
            </table>
            <?php 
						}else {
   
    echo '<span style="margin-left:30px;">Giỏ của bạn trống trơn ! Hãy mua sắm  <b><a href="index.php"> ngay bây giờ</a></b></span>';
						}
					    ?>


        </div>

    </div>
    <div class="clear"></div>
</div>
</div>
<br> <br> <br>
<?php 
	include 'inc/footer.php';
 ?>