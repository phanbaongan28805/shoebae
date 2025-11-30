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
    <link rel="stylesheet" href="./style2.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
    <style>
    .container1 {
        position: relative;
        width: 70%;
        height: 100%;
        display: block;
        margin-left: auto;
        margin-right: auto;
        padding: 10px;
        margin-bottom: 20px;
    }

    .container1 :after {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        background: #f8f8f8;
        z-index: -1;
    }

    .map {
        justify-content: center;

    }

    .contact-box {
        max-width: 100%;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        justify-content: center;
        align-items: center;
        text-align: center;
        background-color: #fff;

    }

    .left {

        background-size: cover;
        height: 100%;
    }

    .right {
        padding: 25px 40px;
        font-family: 'Quicksand', sans-serif;
    }

    input {
        border-radius: 5px;

    }

    .field {
        width: 100%;
        border: 2px solid rgba(0, 0, 0, 0);
        outline: none;
        background-color: #f5f5f5;
        padding: 0.5rem 1rem;
        font-size: 1.1rem;
        margin-bottom: 22px;
        transition: .3s;
        font-family: 'Quicksand', sans-serif;
    }

    .field:hover {
        background-color: rgba(0, 0, 0, 0.1);
    }

    textarea {
        min-height: 150px;
        border-radius: 5px;
    }

    .btn {
        width: 100%;
        padding: 0.5rem 1rem;
        background-color: #c0392b;
        color: #fff;
        font-size: 1.1rem;
        border: none;
        outline: none;
        cursor: pointer;
        border-radius: 5px;
        transition: .3s;
        font-family: 'Quicksand', sans-serif;
    }

    .btn:hover {
        background-color: #000;
    }

    .field:focus {
        border: 2px solid rgba(30, 85, 250, 0.47);
        background-color: #fff;
    }

    @media screen and (max-width: 880px) {
        .contact-box {
            grid-template-columns: 1fr;
        }

        .left {
            margin-bottom: 300px;
            height: 200px;
        }
    }
    </style>
</head>

<body><?php include 'inc/header.php';?>
    <br>
    <?php
    // gọi class category
    $mess = new customer(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $insertContact = $mess -> insert_contact($_POST, $_FILES); // hàm check catName khi submit lên
    }
  ?>
    <div class="container1">
        <div class="contact-box">
            <div class="left">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.383691583259!2d108.25629781422295!3d15.993529745711859!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142109583a4d30b%3A0xaa8a975f7bc4255c!2zNDcwIMSQxrDhu51uZyBUcuG6p24gxJDhuqFpIE5naMSpYSwgSG_DoCBI4bqjaSwgTmfFqSBIw6BuaCBTxqFuLCDEkMOgIE7hurVuZyA1NTAwMDAsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1634488092859!5m2!1svi!2s"
                    width="100%" height="500" style="border:0; " -->
                    allowfullscreen="" loading="lazy">
                </iframe>
            </div>
            <div class="right">
                <h2></h2></br>
                <?php 
    		if (isset($insertContact)) {
    			echo $insertContact;
    		}
    		 ?>
                <form action="contact.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="name" class="field" placeholder="Nhập Tên">
                    <input type="text" name="email" class="field" placeholder="Nhập Địa Chỉ Email">
                    <input type="text" name="phone" class="field" placeholder="Nhập Số Điện Thoại">
                    <textarea placeholder="Nội Dung" name="mess" class="field"></textarea>
                    <button class="btn" type="submit" name="submit">Gửi</button>
                </form>
            </div>
        </div>
    </div>





    <?php include 'inc/footer.php';
    ?>
    <script src="./js/app.js"></script>
    <script src="./js/index.js"></script>
</body>

</html>