<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';  ?>
<?php include '../classes/brand.php';  ?>
<?php include '../classes/product.php';  ?>
<?php
    // gọi class category
    $pd = new product(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $insertProduct = $pd -> insert_product($_POST, $_FILES); // hàm check catName khi submit lên
    }
  ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm sản phẩm</h2>
        <?php 
            if(isset($insertProduct)){
                echo $insertProduct;
            }
         ?>
        <div class="block">

            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label>Tên sản phẩm</label>
                        </td>
                        <td>
                            <input name="productName" type="text" placeholder="Nhập tên sản phẩm..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Code sản phẩm</label>
                        </td>
                        <td>
                            <input name="product_code" type="text" placeholder="Nhập code sản phẩm..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Số lượng sản phẩm</label>
                        </td>
                        <td>
                            <input name="productQuantity" type="text" placeholder="Nhập số lượng sản phẩm..."
                                class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Danh mục sản phẩm</label>
                        </td>
                        <td>
                            <select id="select" name="category">
                                <option>Chọn chuyên mục</option>
                                <?php 
                            $cat = new category();
                            $catlist = $cat->show_category();
                            if($catlist){
                                while ($result = $catlist->fetch_assoc()){
                            
                             ?>
                                <option value=" <?php echo $result['catId'] ?> "> <?php echo $result['catName'] ?>
                                </option>

                                <?php 
                            }
                             }
                             ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Thương hiệu</label>
                        </td>
                        <td>
                            <select id="select" name="brand">
                                <option>Chọn thương hiệu</option>
                                <?php 
                            $brand = new brand();
                            $brandlist = $brand->show_brand();
                            if($brandlist){
                                while ($result = $brandlist->fetch_assoc()){
                            
                             ?>
                                <option value=" <?php echo $result['brandId'] ?> "> <?php echo $result['brandName'] ?>
                                </option>

                                <?php 
                            }
                             }
                             ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Màu Sắc</label>
                        </td>
                        <td>
                            <input name="color" type="text" placeholder="Nhập màu sắc..."
                                class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Mô tả</label>
                        </td>
                        <td>

                            <textarea name="desc" class="tinymce"></textarea>


                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Giá</label>
                        </td>
                        <td>
                            <input name="price" type="text" placeholder="Nhập giá..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Tải ảnh</label>
                        </td>
                        <td>
                            <input name="image" type="file" multiple="multiple" />
                        </td>
                    </tr>



                    <tr>
                        <td>
                            <label>Loại sản phẩm</label>
                        </td>
                        <td>
                            <select id="select" name="type">
                                <?php 
                            if ($result_product['type'] ==0) {
                             ?>
                                <option selected value="0">Giày Cổ Cao</option>
                                <option value="1">Giày Cổ Thấp</option>
                                <?php 
                                }else{
                            ?>
                                <option selected value="0">Giày Cổ Cao</option>
                                <option value="1">Giày Cổ Thấp</option>
                                <?php 
                        }
                             ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Giới Tính</label>
                        </td>
                        <td>
                            <select id="select" name="sex">
                                <?php 
                            if ($result_product['sex'] ==0) {
                             ?>
                                <option selected value="0">Giày Nam</option>
                                <option value="1">Giày Nữ</option>
                                <?php 
                                }else{
                            ?>
                                option selected value="0">Giày Nam</option>
                                <option value="1">Giày Nữ</option>
                                <?php 
                        }
                             ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Lưu" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>


<?php include 'inc/footer.php';?>