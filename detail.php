<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Siz Sneaker</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- app css -->
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/app.css">
</head>

<body>

    <?php include 'inc/header.php'; ?>
    <?php
    if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
    } else {
        $id = $_GET['proid']; // Lấy productid trên host
    }
    $customer_id = Session::get('customer_id'); // bỏ $ nha chú , $ là biến chứ không phải thuộc tính 
    //$customer_id = Session::get('$customer_id'); // dòng lỗi ,nản chú ghê,easy vậy mà

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $size = $_POST['size'];
        $quantity = $_POST['quantity'];
        $insertCart = $ct->add_to_cart($id, $size, $quantity); // hàm check catName khi submit lên
    }
    ?>
    <?php
    if (!isset($_GET['brandId']) || $_GET['brandId'] == NULL) {
    } else {
        $id = $_GET['brandId']; // Lấy productid trên host
    }

    ?>

    <!-- product-detail content -->
    <div class="bg-main">
        <div class="container">
            <?php
            $get_product_details = $product->get_details($id);
            if ($get_product_details) {
                while ($result_details = $get_product_details->fetch_assoc()) {
                    # code...

            ?>
                    <div class="box">
                        <div class="breadcumb">
                            <a href="./index.php">home</a>
                            <span><i class='bx bxs-chevrons-right'></i></span>
                            <a href="./newproduct.php">all products</a>
                            <span><i class='bx bxs-chevrons-right'></i></span>
                            <a href="./detail.php">
                                <?php echo $result_details['productName'] ?></a>
                        </div>
                    </div>

                    <div class="row product-row">
                        <div class="col-5 col-md-12">
                            <div class="product-img" id="product-img">
                                <img src="admin/uploads/<?php echo $result_details['image'] ?>" alt="" />
                            </div>

                        </div>
                        <div class="col-7 col-md-12">

                            <div class="product-info">
                                <h2>
                                    <?php echo $result_details['productName'] ?>
                                </h2>
                                <div class="product-info-detail">
                                    <span class="product-info-detail-title">Brand:</span>
                                    <a href="#"><span> <?php echo $result_details['brandName'] ?></a><br>

                                </div>
                                <div class="product-info-detail">
                                    <span class="product-info-detail-title">Color:</span>
                                    <a href="#"><span><?php echo $result_details['color'] ?></a><br>
                                </div>
                                <div class="product-info-detail">
                                    <span class="product-info-detail-title">Kho:</span>
                                    <a href="#"><span> <?php echo $result_details['product_remain'] ?> Đôi</a><br>
                                </div>

                                <p class="product-description">
                                    <?php echo $fm->textShorten($result_details['product_desc']) ?>
                                </p>
                                <div id="fb-root"></div>
                                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0&appId=406732757828083&autoLogAppEvents=1" nonce="YU6HsSJB"></script>
                                <div class="fb-like" data-href="http://localhost/web_mvc/" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>
                                <div class="product-info-price">
                                    <?php echo $fm->format_currency($result_details['price']) . " " . "VNĐ" ?></div>

                                <div class="product-quantity-wrapper">
                                    <form action="" method="post">
                                        <input type="number" class="buyfield" name="size" value="35" min="35" max="43" style="width: 30%;height:33px;" /><BR><BR>
                                        <input type="number" class="buyfield" name="quantity" value="1" min="1" style="width: 30%;" /><BR><BR><BR>
                                        <input type="submit" class="btn-flat btn-hover" name="submit" value="Thêm vào giỏ hàng" />
                                    </form>

                                    <?php
                                    if (isset($AddtoCart)) {
                                        echo '<span style="color:red; font-size:18px;">Sản phẩm đã được bạn thêm vào giỏ hàng</span>';
                                    }
                                    ?>
                                    <?php
                                    if (isset($insertCart)) {
                                        echo $insertCart;
                                    }
                                    ?>


                                </div>
                            </div>
                        </div>






                    </div>
        </div>
    </div>
    <div class="tabs">
        <ul id="tabs-nav">
            <li><a href="#tab1">Thông Tin Chi Tiết</a></li>
            <li><a href="#tab2">Hình Ảnh Sản Phẩm</a></li>
            <li><a href="#tab3">Bình Luận</a></li>

        </ul> <!-- END tabs-nav -->
        <div id="tabs-content">
            <div id="tab1" class="tab-content">
                <p>Tên Sản Phẩm: <?php echo $result_details['productName'] ?></p>
                <p>Thương Hiệu: <?php echo $result_details['brandName'] ?></p>
                <p>Màu Sắc: <?php echo $result_details['color'] ?></p>
                <p>Size: 35 - 43</p>
                <p>Số Lượng: Còn <?php echo $result_details['product_remain'] ?> Đôi</p>
                <p>Mô Tả: <?php echo $result_details['product_desc'] ?></p>
            </div>
            <div id="tab2" class="tab-content">
                <img src="admin/uploads/<?php echo $result_details['image'] ?>" alt="" style="max-width: 40%; display: block;
    margin-left: auto;
    margin-right: auto;" />

            </div>
            <div id="tab3" class="tab-content">
                <div id="fb-root" style="margin-left:50px;">
                    <div class="fb-comments" data-href="https://web-enternity.herokuapp.com/index.html" data-width="100%" data-numposts="5"></div>
                </div>
                <div id="fb-root"></div>
                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0&appId=406732757828083&autoLogAppEvents=1" nonce="aXUS9Sg5"></script>

            </div>

        </div> <!-- END tabs-content -->
    </div> <!-- END tabs -->

<?php
                }
            }
?>
<!-- end product-detail content -->
</div>
</div>


<?php include 'inc/footer.php'; ?>
<script type="text/javascript">
    // Show the first tab and hide the rest
    $('#tabs-nav li:first-child').addClass('active');
    $('.tab-content').hide();
    $('.tab-content:first').show();

    // Click function
    $('#tabs-nav li').click(function() {
        $('#tabs-nav li').removeClass('active');
        $(this).addClass('active');
        $('.tab-content').hide();

        var activeTab = $(this).find('a').attr('href');
        $(activeTab).fadeIn();
        return false;
    });
</script>
<!-- app js -->
<script src="./js/app.js"></script>
<script src="./js/product-detail.js"></script>
</body>

</html>