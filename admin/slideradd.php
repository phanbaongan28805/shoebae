<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php';  ?>
<?php
    // gọi class category
    $product = new product(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        
        $insertSlider = $product -> insert_slider($_POST, $_FILES); // hàm check catName khi submit lên
    }
  ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm slider</h2>
        <div class="block">
            <?php 
    if(isset($insertSlider)){
        echo $insertSlider;
    }
     ?>
            <form action="slideradd.php" method="post" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td>
                            <label>Tiêu đề</label>
                        </td>
                        <td>
                            <input type="text" name="sliderName" placeholder="Nhập tiêu đề..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Mô tả</label>
                        </td>
                        <td>
                            <input type="text" name="slider_mota" placeholder="Nhập mô tả..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Tải ảnh lên</label>
                        </td>
                        <td>
                            <input type="file" name="image" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Banner-Slider</label>
                        </td>
                        <td>
                            <select name="type">
                                <option value="00">Chọn Ảnh</option>
                                <option value="2">Slider Trang Chủ 1</option>
                                <option value="5">Slider Trang Chủ 2</option>
                                <option value="6">Slider Trang Chủ 3</option>
                                <option value="3">Bn-Trang Chủ 1</option>
                                <option value="4">Bn-Trang Chủ 2</option>
                                <option value="7">Bn-Trang Chủ 3</option>
                                <option value="8">Bn-Trang Chủ 4</option>
                                <option value="9">Slider Trang Nike</option>
                                <option value="10">Slider Trang Adidas</option>
                                <option value="11">Slider Trang Converse</option>
                                <option value="12">Slider Trang Vans</option>
                                <option value="13">Bn-Trang Nike</option>
                                <option value="14">Bn-Trang Adidas</option>
                                <option value="15">Bn-Trang Converse</option>
                                <option value="16">Bn-Trang Vans</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" value="Lưu" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
    setupTinyMCE();
    setDatePicker('date-picker');
    $('input[type="checkbox"]').fancybutton();
    $('input[type="radio"]').fancybutton();
});
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>