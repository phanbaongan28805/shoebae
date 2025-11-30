<?php
	
    include 'lib/session.php';
    Session::init();
?>
<?php
	
	include 'lib/database.php';
	include 'helpers/format.php';

	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";
	});
		

	$db = new Database();
	$fm = new Format();
	$ct = new cart();
	$us = new user();
	$cs = new customer();
	$cat = new category();
	$product = new product();
?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siz Sneaker</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- app css -->
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/app.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/demo.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>

</head>

<body>
    <a id="button"></a>

    <!-- header -->
    <header>
        <!-- mobile menu -->
        <div class="mobile-menu bg-second">
            <a href="index.php" class="mb-logo">Siz Sneaker</a>
            <span class="mb-menu-toggle" id="mb-menu-toggle">
                <i class='bx bx-menu'></i>
            </span>
        </div>
        <!-- end mobile menu -->
        <!-- main header -->
        <div class="header-wrapper" id="header-wrapper">
            <span class="mb-menu-toggle mb-menu-close" id="mb-menu-close">
                <i class='bx bx-x'></i>
            </span>
            <!-- top header -->
            <div class="bg-second">
                <div class="top-header container">
                    <ul class="devided">
                        <li>
                            <a href="tel:0383356646">0383.356.646</a>
                        </li>
                        <li>
                            <a href="contact.php">sizsneaker@mail.com</a>
                        </li>
                    </ul>

                </div>
            </div>
            <!-- end top header -->
            <!-- mid header -->
            <div class="bg-main">
                <div class="mid-header container">
                    <a href="index.php" class="logo"> Siz Sneaker</a>
                    <form action="search.php" method="GET">
                        <div class="search">
                            <input type="text" name="search" required
                                value="<?php if(isset($_GET['search'])){echo $_GET['search'];   } ?>"
                                class="form-control" placeholder="Search...">
                        </div>

                        <button type="submit" style="height:0.01px;color:#fff;"></button>
                    </form>

                    <ul class="user-menu">

                        <li><a href="cart.php"><i class="bx bx-cart"></i></a></li>
                        <li class="dropdown">
                            <a href=""><i class='bx bx-user-circle'></i>
                                <p class="qty">[
                                    <?php
								$check_cart = $ct->check_cart();
								if ($check_cart) {
								 	$sum = Session::get("sum");
								 	$qty = Session::get("qty");
									echo $qty ;

								 }else {
								 	echo '';
								 } 
								
								 ?>
                                    ]</p>

                            </a>
                            <ul class="dropdown-content">
                                <li>
                                    <?php 
				if(isset($_GET['customer_id'])){
					$customer_id = $_GET['customer_id'];
					$delCart = $ct->del_all_data_cart();
					$delCompare = $ct->del_compare($customer_id);
					Session::destroy();
				}
			?>
                                    <div>
                                        <?php 
			$login_check = Session::get('customer_login');
			if ($login_check==false) {
				echo '<li><a href="login.php">Đăng nhập</a></li>'; 
			}else {
				echo '<li><a href="?customer_id='.Session::get('customer_id').' ">
                Đăng Xuất</a></li></a>
               
                    
               '; 
			}
			 ?>


                                        <?php 
	  $customer_id = Session::get('customer_id'); 

	  if ($customer_id==false) {
	  	echo '';
	  }else {
	  	echo '<li><a href="orderdetails.php">Đơn hàng</a></li>';
	  }
	   ?>

                                        <?php 
	  $login_check = Session::get('customer_login');
	  if ($login_check==false) {
	  	echo '';
	  }else {
	  	echo '<li><a href="profile.php">Thông tin</a></li>';
	  }
	   ?>



                                </li>

                            </ul>
                        </li>
                    </ul>
                </div>


                <!-- end mid header -->
                <!-- bottom header -->
                <div class="bg-second">
                    <div class="bottom-header container">
                        <ul class="main-menu">
                            <li>
                                <a href="index.php">Trang chủ</a>
                            </li>
                            <!-- mega menu -->
                            <li class="mega-dropdown">
                                <a href="#">Cửa hàng <i class='bx bxs-chevron-down'></i></a>
                                <div class="mega-content">
                                    <div class="row">
                                        <div class="col-3 col-md-12">
                                            <div class="box">
                                                <h3>Cửa Hàng</h3>
                                                <ul>
                                                <li><a href="nike.php?catid=18">Nike Shoes</a></li>
                        <li><a href="adidas.php?catid=19">Adidas Shoes</a></li>
                        <li><a href="converse.php?catid=20">Converse Shoes</a></li>
                        <li><a href="vans.php?catid=21">Vans Shoes</a></li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                       
                                        <div class="col-3 col-md-12">
                                            <div class="box">
                                                <h3>Danh Mục</h3>
                                                <ul>
                                                    <li><a href="cocao.php">Giày Cổ Cao</a></li>
                                                    <li><a href="cothap.php">Giày Cổ Thấp</a></li>
                                                    <li><a href="giaynam.php">Giày Nam</a></li>
                                                    <li><a href="giaynu.php">Giày Nữ</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-3 col-md-12">
                                            <div class="box">
                                                <h3>Danh Mục</h3>
                                                <ul>
                                                <?php 
						$getall_category = $cat->show_category_fontend();
							if ($getall_category) {
								while ($result_allcat = $getall_category->fetch_assoc()) {
									
								
						 ?>
                        <li><a
                                href="productbycat.php?catid=<?php echo $result_allcat['catId'] ?>"><?php echo $result_allcat['catName'] ?></a>
                        </li>
                        <?php 
				      }
							}
				       ?>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-3 col-md-12">
                                            <div class="box">
                                                <h3>Danh Mục</h3>
                                                <ul>
                                                <li><a href="newproduct.php">Giày Mới Nhất</a></li>
                                                    <li><a href="hotproduct.php">Giày Đang Hot</a></li>
                                                    <li><a href="giacao.php">Giá Từ Cao Đến Thấp</a></li>
                                                    <li><a href="giathap.php">Giá Từ Thấp Đến Cao</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="row img-row">

                                    </div>
                                </div>
                            </li>
                            <!-- end mega menu -->
                            <li>
                                <a href="./intro.php">Về Chúng Tôi</a>
                            </li>
                         
                            <li><a href="./contact.php">Liên Hệ</a></li>
                            
                        </ul>
                    </div>
                </div>
                <!-- end bottom header -->
            </div>
            <!-- end main header -->
    </header>