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
                            <input type="email" name="email" placeholder="Nhập Địa Chỉ Email">
                            <button type="submit" name="submit">Đăng kí ngay</button>
                        </form>

                    </div>
                </div>
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