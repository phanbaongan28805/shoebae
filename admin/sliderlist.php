<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php';?>
<?php 
	$product = new product();
	if(isset($_GET['type_slider']) && isset($_GET['type'])){
		$id = $_GET['type_slider'];
		$type = $_GET['type'];
		$update_type_slider = $product->update_type_slider($id,$type);

	}
	if(isset($_GET['slider_del'])){
		$id = $_GET['slider_del'];
		$del_slider = $product->del_slider($id);

	}
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Slider List</h2>
        <div class="block">
            <?php 
        if (isset($del_slider)) {
        	echo $del_slider;
        }
         ?>
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th style="width:5%;">No.</th>
                        <th style="width:20%;">Tiêu đề slider</th>
                        <th style="width:50%;">Slider Image</th>

                        <th style="width:5%;">Xử lý</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
					$product = new product();
					$get_slider = $product->show_slider_list();
					if($get_slider){
						$i = 0;
						while($result_slider = $get_slider->fetch_assoc()){
							$i++;
						?>
                    <tr class="odd gradeX">
                        <td style="width:5%;"><?php echo $i; ?></td>
                        <td style="width:20%;"><?php echo $result_slider['sliderName'] ?></td>
                        <td style="width:30%;"><img src="uploads/<?php echo $result_slider['slider_image'] ?>"
                                height="50%" width="50%" />
                        </td>

                        <td style="width:5%;">

                            <a href="?slider_del=<?php echo $result_slider['sliderId'] ?>"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa???')">Delete</a>
                        </td>
                    </tr>
                    <?php
				}}
			    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    setupLeftMenu();
    $('.datatable').dataTable();
    setSidebarHeight();
});
</script>
<?php include 'inc/footer.php';?>