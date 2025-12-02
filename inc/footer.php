    <!-- footer -->
    <footer class="bg-second" style="background:linear-gradient(135deg, #f5f5f5 0%, #e8e8e8 100%);margin-top:60px;padding:60px 0 20px;border-top:3px solid #FF6600;">
        <div class="container">
            <div class="row">
                <div class="col-3 col-md-6 col-sm-12" style="padding:20px;">
                    <ul class="menu">
                        <li>
                            <h3 style="color:#FF6600;font-size:18px;font-weight:bold;margin-bottom:15px;border-bottom:2px solid #FF6600;padding-bottom:10px;">Shoes Collection</h3>
                        </li>
                        <li style="margin-bottom:10px;"><a href="nike.php?catid=18" style="color:#555;text-decoration:none;transition:0.3s;display:inline-block;" onmouseover="this.style.color='#FF6600'" onmouseout="this.style.color='#555'">➤ Nike Shoes</a></li>
                        <li style="margin-bottom:10px;"><a href="adidas.php?catid=19" style="color:#555;text-decoration:none;transition:0.3s;display:inline-block;" onmouseover="this.style.color='#FF6600'" onmouseout="this.style.color='#555'">➤ Adidas Shoes</a></li>
                        <li style="margin-bottom:10px;"><a href="converse.php?catid=20" style="color:#555;text-decoration:none;transition:0.3s;display:inline-block;" onmouseover="this.style.color='#FF6600'" onmouseout="this.style.color='#555'">➤ Converse Shoes</a></li>
                        <li style="margin-bottom:10px;"><a href="vans.php?catid=21" style="color:#555;text-decoration:none;transition:0.3s;display:inline-block;" onmouseover="this.style.color='#FF6600'" onmouseout="this.style.color='#555'">➤ Vans Shoes</a></li>
                    </ul>
                </div>
                <div class="col-3 col-md-6 col-sm-12" style="padding:20px;">
                    <ul class="menu">
                        <li>
                            <h3 style="color:#FF6600;font-size:18px;font-weight:bold;margin-bottom:15px;border-bottom:2px solid #FF6600;padding-bottom:10px;">Danh Mục</h3>
                        </li>
                        <?php 
						$getall_category = $cat->show_category_fontend();
							if ($getall_category) {
								while ($result_allcat = $getall_category->fetch_assoc()) {
									
								
						 ?>
                        <li style="margin-bottom:10px;"><a
                                href="productbycat.php?catid=<?php echo $result_allcat['catId'] ?>" style="color:#555;text-decoration:none;transition:0.3s;display:inline-block;" onmouseover="this.style.color='#FF6600'" onmouseout="this.style.color='#555'">➤ <?php echo $result_allcat['catName'] ?></a>
                        </li>
                        <?php 
				      }
							}
				       ?>
                    </ul>

                </div>
                <div class="col-3 col-md-6 col-sm-12" style="padding:20px;">
                    <div class="contact">
                        <h3 class="logo" style="color:#FF6600;font-size:28px;font-weight:bold;margin-bottom:20px;text-align:center;">
                            🔥 Shoebae 🔥
                        </h3>
                        <ul class="contact-socials" style="display:flex;justify-content:center;gap:20px;margin-bottom:30px;list-style:none;padding:0;">
                            <li>
                                <a href="https://www.facebook.com/Siz-Sneaker-101693367890348" target="_blank" style="display:flex;align-items:center;justify-content:center;width:45px;height:45px;background:#FF6600;border-radius:50%;transition:0.3s;color:white;font-size:24px;" onmouseover="this.style.transform='scale(1.1)';this.style.boxShadow='0 0 15px rgba(255,102,0,0.6)'" onmouseout="this.style.transform='scale(1)';this.style.boxShadow='none'">
                                    <i class='bx bxl-facebook-circle'></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/trg_siu/" target="_blank" style="display:flex;align-items:center;justify-content:center;width:45px;height:45px;background:#FF6600;border-radius:50%;transition:0.3s;color:white;font-size:24px;" onmouseover="this.style.transform='scale(1.1)';this.style.boxShadow='0 0 15px rgba(255,102,0,0.6)'" onmouseout="this.style.transform='scale(1)';this.style.boxShadow='none'">
                                    <i class='bx bxl-instagram-alt'></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UCmaQE0F74O7UNOVgva_6KVw" target="_blank" style="display:flex;align-items:center;justify-content:center;width:45px;height:45px;background:#FF6600;border-radius:50%;transition:0.3s;color:white;font-size:24px;" onmouseover="this.style.transform='scale(1.1)';this.style.boxShadow='0 0 15px rgba(255,102,0,0.6)'" onmouseout="this.style.transform='scale(1)';this.style.boxShadow='none'">
                                    <i class='bx bxl-youtube'></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/?lang=vi" target="_blank" style="display:flex;align-items:center;justify-content:center;width:45px;height:45px;background:#FF6600;border-radius:50%;transition:0.3s;color:white;font-size:24px;" onmouseover="this.style.transform='scale(1.1)';this.style.boxShadow='0 0 15px rgba(255,102,0,0.6)'" onmouseout="this.style.transform='scale(1)';this.style.boxShadow='none'">
                                    <i class='bx bxl-twitter'></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="subscribe">
                        <h4 style="color:#FF6600;text-align:center;margin-bottom:15px;font-weight:bold;">Đăng ký nhận khuyến mãi</h4>
                        <?php 
    		if (isset($insertMail)) {
    			echo $insertMail;
    		}
    		 ?>
                        <form action="index.php" method="post" enctype="multipart/form-data" style="display:flex;gap:8px;">
                            <input type="email" name="email" placeholder="Nhập Email..." style="flex:1;padding:10px;border:none;border-radius:5px;font-size:14px;box-sizing:border-box;">
                            <button type="submit" name="submit" style="padding:10px 20px;background:#FF6600;color:white;border:none;border-radius:5px;font-weight:bold;cursor:pointer;transition:0.3s;">Đăng ký</button>
                        </form>

                    </div>
                </div>
            </div>
            <div style="border-top:1px solid #ddd;margin-top:40px;padding-top:20px;text-align:center;color:#777;font-size:14px;">
                <p>&copy; 2024 Shoebae. All rights reserved. | Designed with ❤️ by Shoebae Team</p>
            </div>
        </div>
    </footer>

    <!-- end footer -->
    <!-- app js -->
    </body>
    <script src="./js/app.js"></script>
    <script src="./js/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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

    </html>