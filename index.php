<?php
    session_start();
?>
<?php include 'inc/header.php'; ?>
<!-- hero section -->
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

<!-- promotion section -->
<div class="promotion">
    <div class="row">
        <div class="col-4 col-md-12 col-sm-12">
            <div class="promotion-box">
                <div class="text">
                    <h3>Jordan Shoes</h3><br>
                    <a href="nike.php?catid=18" class="btn-flat btn-hover">shop collection</a>

                </div>
                <img src="./images/bn-02.png" alt="">
            </div>
        </div>
        <div class="col-4 col-md-12 col-sm-12">
            <div class="promotion-box">
                <div class="text">
                    <h3>Running Shoes</h3><br>
                    <a href="adidas.php?catid=19" class="btn-flat btn-hover">shop collection</a>
                </div>
                <img src="./images/bn-08.png" alt="">
            </div>
        </div>
        <div class="col-4 col-md-12 col-sm-12">
            <div class="promotion-box">
                <div class="text">
                    <h3>Lifestyle Shoes</h3><br>
                    <a href="converse.php?catid=20" class="btn-flat btn-hover">shop collection</a>
                </div>
                <img src="./images/bn-07.png" alt="">
            </div>
        </div>
    </div>
</div>
<!-- end promotion section -->

<div class="section ">
    <?php 
						$get_slider = $product->show_slider_center1();
						if ($get_slider) {
							while ($result_slider = $get_slider->fetch_assoc()) {
								# code...
							
						 ?>
    <div class="container">
        <img src=" admin/uploads/<?php echo $result_slider['slider_image'] ?>" alt="" />

        <div class="collection">
            <h1 href="#"><?php echo $result_slider['sliderName']?></h1>
            <p class="list"><?php echo $result_slider['slider_mota']?></p>

            <div class="section-footer">
                <a href="nike.php?catid=18" class="btn-flat btn-hover">Shop Now</a>
            </div>
        </div>
    </div>
</div> <?php 
						}
						}
						 ?>
</br> </br>

<!-- product list
            ----------------------------------------------------------------------------------------------------------------->
<!-- end promotion section -->
</br>
<div class="section">
    <?php 
						$get_slider = $product->show_slider_center2();
						if ($get_slider) {
							while ($result_slider = $get_slider->fetch_assoc()) {
								# code...
							
						 ?>
    <div class="container">

        <img src="admin/uploads/<?php echo $result_slider['slider_image'] ?>" alt="" />




        <div class=" collection">
            <h1 href="#"><?php echo $result_slider['sliderName']?></h1>

            <p class="list"><?php echo $result_slider['slider_mota']?></p>

            <div class="section-footer">
                <a href="adidas.php?catid=19" class="btn-flat btn-hover">Shop Now</a>
            </div>
        </div>
    </div>
</div> <?php 
						}
						}
						 ?>
</br></br></br>

<div class="section">
    <?php 
						$get_slider = $product->show_slider_down1();
						if ($get_slider) {
							while ($result_slider = $get_slider->fetch_assoc()) {
								# code...
							
						 ?>
    <div class="container">
        <div class="section-header" data-aos="fade-up" data-aos-duration="1200">
            <h2></h2>
        </div>
        <div class="blog">
            <div class="blog-img">
                <img src="admin/uploads/<?php echo $result_slider['slider_image'] ?>" alt="" />
            </div>
            <div class="blog-info">
                <div class="blog-title">
                    <h3>
                        <?php echo $result_slider['sliderName']?></h3>
                </div>
                <div class="blog-gap"></div>
                <div class="blog-preview">
                    <?php echo $result_slider['slider_mota']?>
                </div>
                <p class="list"></p>

                <div class="section-footer">
                    <a href="nike.php?catid=18" class="btn-flat btn-hover">Shop Now</a>
                </div>
            </div>
        </div>
    </div> <?php 
						}
						}
						 ?>
    <!-- ----------------------------------------------------------------------------------------------------------------->

    <div class="section" data-aos="fade-up" data-aos-duration="1200">
        <?php 
						$get_slider = $product->show_slider_down2();
						if ($get_slider) {
							while ($result_slider = $get_slider->fetch_assoc()) {
								# code...
							
						 ?>
        <div class="container">
            <div class="section-header">
                <h2></h2>
            </div>
            <div class="blog row-revere">
                <div class="blog-img">
                    <img src="admin/uploads/<?php echo $result_slider['slider_image'] ?>" alt="" />
                </div>
                <div class="blog-info">
                    <div class="blog-title">
                        <h3>
                            <?php echo $result_slider['sliderName']?></h3>
                    </div>
                    <div class=" blog-gap"></div>
                    <div class="blog-preview" style=" width: 100%;">
                        <?php echo $result_slider['slider_mota']?>
                    </div>
                    <p class="list"></p>

                    <div class="section-footer">
                        <a href="adidas.php?catid=19" class="btn-flat btn-hover">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
        <?php 
						}
						}
						 ?>
        <!-- ----------------------------------------------------------------------------------------------------------------->


        <div class="popup hide__popup">
            <div class="popup__content">
                <div class="popup__close">
                    <svg>
                        <use xlink:href="./images/sprite.svg#icon-cross"></use>
                    </svg>
                </div>
                <div class="popup__left">
                    <div class="popup-img__container">
                        <img class="popup__img" src="./images/bn-09.png" alt="popup">
                    </div>
                </div>
                <?php
    // gọi class category
    $mess = new customer(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $insertMail = $mess -> insert_email($_POST, $_FILES); // hàm check catName khi submit lên
        
    }
  ?>
                <div class="popup__right">
                    <div class="right__content">
                        <h3 style="font-size:30px">Giảm Giá Đến <span style="color:#59b210;">30%</span> </h3><br>
                        <p style=" font-size:15px;">Đăng kí ngay để là người sớm nhất được giảm giá!
                        </p>
                        <?php 
    		if (isset($insertMail)) {
    			echo $insertMail;
    		}
    		 ?>
                        <form action="index.php" method="post" enctype="multipart/form-data">
                            <input type="email" name="email" class="popup__form" placeholder="Nhập Địa Chỉ Email"
                                style=" background-color: #f1f1f1; height:30px;">
                            <button class="btn-flat btn-hover" type="submit" name="submit">Đăng kí ngay</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <?php include 'inc/footer.php'; ?>