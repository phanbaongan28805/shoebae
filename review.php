<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Siz Sneaker</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="./css/app.css">
        <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>   
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>


</head>

<body>
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
  

    <body>
    <div class="container">
    	<h1 class="mt-5 mb-5"></h1>
    	<div class="card">
    		<div class="card-header"></div>
    		<div class="card-body">
    			<div class="row">
    				<div class="col-sm-4 text-center">
    					<h1 class="text-warning mt-4 mb-4">
    						<b><span id="average_rating">0.0</span> / 5</b>
    					</h1>
    					<div class="mb-3">
    						<i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
	    				</div>
    					<h3><span id="total_review">0</span> Đánh Giá</h3>
    				</div>
    				<div class="col-sm-4">
    					<p>
                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
                        </p>
    					<p>
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                            </div>               
                        </p>
    				</div>
    				<div class="col-sm-4 text-center">
    					<h3 class="mt-4 mb-3">Đánh giá với chúng tôi</h3>
    					<button type="button" name="add_review" id="add_review" class="btn btn-primary">Đánh Giá</button>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="mt-5" id="review_content"></div>
    </div>
</body>
</html>

<div id="review_modal" class="modal" tabindex="-1" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title">Nội Dung</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
	      		<h4 class="text-center mt-2 mb-4">
	        		<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
	        	</h4>
	        	<div class="form-group">
	        		<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Vui lòng nhập tên..." />
	        	</div>
	        	<div class="form-group">
	        		<textarea name="user_review"  id="user_review" class="form-control" placeholder="Nhập nội dung đánh giá..."></textarea>
	        	</div>
	        	<div class="form-group text-center mt-4">
	        		<button type="button" class="btn btn-primary" id="save_review">Gửi</button>
	        	</div>
	      	</div>
    	</div>
  	</div>
</div>

<style>
.progress-label-left
{
    float: left;
    margin-right: 0.5em;
    line-height: 1em;
}
.progress-label-right
{
    float: right;
    margin-left: 0.3em;
    line-height: 1em;
}
.star-light
{
	color:#e9ecef;
}
</style>

<script>

$(document).ready(function(){

	var rating_data = 0;

    $('#add_review').click(function(){

        $('#review_modal').modal('show');

    });

    $(document).on('mouseenter', '.submit_star', function(){

        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('text-warning');

        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function(){

        var user_name = $('#user_name').val();

        var user_review = $('#user_review').val();

        if(user_name == '' || user_review == '')
        {
            alert("Please Fill Both Field");
            return false;
        }
        else
        {
            $.ajax({
                url:"submit_rating.php",
                method:"POST",
                data:{rating_data:rating_data, user_name:user_name, user_review:user_review},
                success:function(data)
                {
                    $('#review_modal').modal('hide');

                    load_rating_data();

                    alert(data);
                }
            })
        }

    });

    load_rating_data();

    function load_rating_data()
    {
        $.ajax({
            url:"submit_rating.php",
            method:"POST",
            data:{action:'load_data'},
            dataType:"JSON",
            success:function(data)
            {
                $('#average_rating').text(data.average_rating);
                $('#total_review').text(data.total_review);

                var count_star = 0;

                $('.main_star').each(function(){
                    count_star++;
                    if(Math.ceil(data.average_rating) >= count_star)
                    {
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                    }
                });

                $('#total_five_star_review').text(data.five_star_review);

                $('#total_four_star_review').text(data.four_star_review);

                $('#total_three_star_review').text(data.three_star_review);

                $('#total_two_star_review').text(data.two_star_review);

                $('#total_one_star_review').text(data.one_star_review);

                $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

                $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

                $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

                $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

                $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

                if(data.review_data.length > 0)
                {
                    var html = '';

                    for(var count = 0; count < data.review_data.length; count++)
                    {
                        html += '<div class="row mb-3">';

                        html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'+data.review_data[count].user_name.charAt(0)+'</h3></div></div>';

                        html += '<div class="col-sm-11">';

                        html += '<div class="card">';

                        html += '<div class="card-header"><b>'+data.review_data[count].user_name+'</b></div>';

                        html += '<div class="card-body">';

                        for(var star = 1; star <= 5; star++)
                        {
                            var class_name = '';

                            if(data.review_data[count].rating >= star)
                            {
                                class_name = 'text-warning';
                            }
                            else
                            {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                        }

                        html += '<br />';

                        html += data.review_data[count].user_review;

                        html += '</div>';

                        html += '<div class="card-footer text-right">On '+data.review_data[count].datetime+'</div>';

                        html += '</div>';

                        html += '</div>';

                        html += '</div>';
                    }

                    $('#review_content').html(html);
                }
            }
        })
    }

});

</script>
    <!-- footer -->
    <footer class="bg-second">
        <div class="container">
            <div class="row">
                <div class="col-3 col-md-6 col-sm-12">

                    <ul class="menu">
                        <li>
                            <h3>Shoes Collection</h3>
                        </li>
                        <li><a href="nike.php?catid=18">Nike Shoes</a></li>
                        <li><a href="adidas.php?catid=19">Adidas Shoes</a></li>
                        <li><a href="converse.php?catid=20">Converse Shoes</a></li>
                        <li><a href="vans.php?catid=21">Vans Shoes</a></li>
                    </ul>
                </div>
                <div class="col-3 col-md-6 col-sm-12">
                    <ul class="menu">
                        <li>
                            <h3>Danh Mục</h3>
                        </li>
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
                <div class="col-3 col-md-6 col-sm-12">
                    <h3 class="footer-head">support</h3>
                    <iframe
                        src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FSiz-Sneaker-101693367890348%2F&tabs=timeline&width=300&height=195&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=213447797446471"
                        width="100%" 0 height="100%" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                        allowfullscreen="true"
                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
                <div class="col-3 col-md-6 col-sm-12">
                    <div class="contact">
                        <h3 class="logo" style="margin-left:40px;">
                            Siz Sneaker
                        </h3>
                        <ul class="contact-socials">
                            <li>
                                <a href="https://www.facebook.com/Siz-Sneaker-101693367890348" target="_blank">
                                    <i class='bx bxl-facebook-circle'></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/trg_siu/" target="_blank">
                                    <i class='bx bxl-instagram-alt'></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UCmaQE0F74O7UNOVgva_6KVw" target="_blank">
                                    <i class='bx bxl-youtube'></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/?lang=vi" target="_blank">
                                    <i class='bx bxl-twitter'></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="subscribe">
                        <?php 
    		if (isset($insertMail)) {
    			echo $insertMail;
    		}
    		 ?>
                        <form action="index.php" method="post" enctype="multipart/form-data">
                            <input type="email" name="email" placeholder="Nhập Địa Chỉ Email" style=" width:50px ;">
                            <button type="submit" name="submit"  style="margin-top:-50px;">Đăng kí ngay</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script>
var btn = $('#button');

$(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
        btn.addClass('show');
    } else {
        btn.removeClass('show');
    }
});

btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({
        scrollTop: 0
    }, 1500);
});
    </script>

    <script>
let container = document.getElementById('container')

toggle = () => {
    container.classList.toggle('sign-in')
    container.classList.toggle('sign-up')
}

setTimeout(() => {
    container.classList.add('sign-in')
}, 200)
    </script>

    <script src="./js/app.js"></script>
    <script src="./js/index.js"></script>
