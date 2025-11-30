<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Siz Sneaker</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- app css -->
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/app.css">
</head>

<body>

    <?php include 'inc/header.php'; ?>
    <?php 
	$pd = new product();
	$fm = new Format();
	if(!isset($_GET['productid']) || $_GET['productid'] == NULL){
     
        
    }else {
        $id = $_GET['productid']; 
          }
 ?>
    <div class="hero">
        <div class="slider">

            <div class="container">
                <!-- slide item -->
                <?php 
						$get_slider = $product->show_slider_top1();
						if ($get_slider) {
							while ($result_slider = $get_slider->fetch_assoc()) {
								# code...
							
						 ?>
                <div class="slide active">
                    <div class="info">
                        <div class="info-content">
                            <h3 class="top-down">

                            </h3>
                            <h2 class="top-down trans-delay-0-2">
                                <?php echo $result_slider['sliderName']?>
                            </h2>
                            <p class="top-down trans-delay-0-4">
                                <?php echo $result_slider['slider_mota']?></p>

                            </p>
                            <div class="top-down trans-delay-0-6"><br><br>
                                <a href="nike.php?catid=18" class=" btn-flat btn-hover">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="img left-right">
                        <img src="admin/uploads/<?php echo $result_slider['slider_image'] ?>" alt="" />

                    </div>
                </div> <?php 
						}
						}
						 ?>
                <!-- end slide item -->
                <!-- slide item -->
                <?php 
						$get_slider = $product->show_slider_top2();
						if ($get_slider) {
							while ($result_slider = $get_slider->fetch_assoc()) {
								# code...
							
						 ?>
                <div class="slide">
                    <div class="info">
                        <div class="info-content">
                            <h3 class="top-down">

                            </h3>
                            <h2 class="top-down trans-delay-0-2">
                                <?php echo $result_slider['sliderName']?>
                            </h2>
                            <p class="top-down trans-delay-0-4">
                                <?php echo $result_slider['slider_mota']?></p>
                            </p>
                            <div class="top-down trans-delay-0-6"><br><br>
                                <a href="nike.php?catid=18" class=" btn-flat btn-hover">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="img left-right">
                        <img src="admin/uploads/<?php echo $result_slider['slider_image'] ?>" alt="" />

                    </div>
                </div> <?php 
						}
						}
						 ?>
                <!-- end slide item -->
                <!-- slide item -->
                <?php 
						$get_slider = $product->show_slider_top3();
						if ($get_slider) {
							while ($result_slider = $get_slider->fetch_assoc()) {
								# code...
							
						 ?>
                <div class="slide">
                    <div class="info">
                        <div class="info-content">
                            <h3 class="top-down">

                            </h3>
                            <h2 class="top-down trans-delay-0-2">
                                <?php echo $result_slider['sliderName']?>
                            </h2>
                            <p class="top-down trans-delay-0-4">
                                <?php echo $result_slider['slider_mota']?></p>
                            </p>
                            <div class="top-down trans-delay-0-6"><br><br>
                                <a href="nike.php?catid=18" class=" btn-flat btn-hover">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="img left-right">
                        <img src="admin/uploads/<?php echo $result_slider['slider_image'] ?>" alt="" />

                    </div>
                </div> <?php 
						}
						}
						 ?>
                <!-- end slide item -->
            </div>
            <!-- slider controller -->
            <button class="slide-controll slide-next">
                <i class='bx bxs-chevron-right'></i>
            </button>
            <button class="slide-controll slide-prev">
                <i class='bx bxs-chevron-left'></i>
            </button>
            <!-- end slider controller -->
        </div>
    </div>
    <!-- end hero section -->

    <div class="section-header">
        <h2>Các mẫu giày cổ thấp</h2>
    </div>

    <div class="section">
        <div class="container">
            <div class="section-header">

            </div>
            <div class="row" id="">
                <?php 
				
				$pdlist = $pd->   getproductall_cothap();
										
					if($pdlist){
												while ($result = $pdlist->fetch_assoc()){
										
									
				 ?>
                <div class="col-3 col-md-6 col-sm-12">

                    <div class="product-card">
                        <div class="product-card-img">
                            <a href="detail.php?proid=<?php echo $result['productId'] ?>"> <img
                                    src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
                        </div>
                        <div class="product-card-info">
                            <div class="product-btn">
                                <button class="btn-flat btn-hover btn-shop-now"><a
                                        href="detail.php?proid=<?php echo $result['productId'] ?>">shop
                                        now</button></a>
                                <button class="btn-flat btn-hover btn-cart-add"><a
                                        href="detail.php?proid=<?php echo $result['productId'] ?>">
                                        <i class="bx bxs-cart-add"> </i>
                                    </a> </button>
                                <button class="btn-flat btn-hover btn-cart-add">
                                    <i class="bx bxs-heart"></i>
                                </button>
                            </div>
                            <div class="product-card-name">
                                <a href="detail.php?proid=<?php echo $result['productId'] ?>">
                                    <?php echo $result['productName'] ?></a>
                            </div>
                            <div class="product-card-price">
                                <span><del></del></span>
                                <span
                                    class="curr-price"><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></span>
                            </div>
                        </div>
                    </div>
                </div><?php 
        }
        }
         ?>
          <?php
 $pdall = $pd-> getproductall_cothap();
    $product_count = mysqli_num_rows( $pdall);
    $product_button =ceil($product_count/2.9);
    $i =1;
       for($i=1;$i<=$product_button;$i++){
         
    ?>
    <div class="box">
        <ul class="pagination">
            <li><a href="cothap.php?trang=<?php echo ''.$i.''?>" class="active"><?php echo ''.$i.''?></a>
            </li>
        </ul>
    </div> <?php
        }?>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- end products content -->


   
    <?php include 'inc/footer.php'; ?>

    <!-- app js -->
    <script src="./js/app.js"></script>
    <script src="./js/products.js"></script>
</body>

</html>