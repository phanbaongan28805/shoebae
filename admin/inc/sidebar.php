<div class="grid_2">
    <div class="box sidemenu">
        <div class="block" id="section-menu">
            <ul class="section menu">

                <?php 
                    $role = Session::get('role');
                    // Banner menu - chỉ admin
                    if($role === 'admin') {
                ?>
                <li><a class="menuitem">Quản Lí Banner</a>
                    <ul class="submenu">
                        <li><a href="slideradd.php">Thêm Banner</a> </li>
                        <li><a href="sliderlist.php">Tất cả Banner</a> </li>
                    </ul>
                </li>
                <?php } ?>

                <?php 
                    // Category menu - chỉ admin
                    if($role === 'admin') {
                ?>
                <li><a class="menuitem">Quản Lí Danh mục</a>
                    <ul class="submenu">
                        <li><a href="catadd.php">Thêm danh mục</a> </li>
                        <li><a href="catlist.php">Danh sách danh mục</a> </li>
                    </ul>
                </li>
                <?php } ?>

                <?php 
                    // Brand menu - chỉ admin
                    if($role === 'admin') {
                ?>
                <li><a class="menuitem">Quản Lí Thương hiệu </a>
                    <ul class="submenu">
                        <li><a href="brandadd.php">Thêm thương hiệu</a> </li>
                        <li><a href="brandlist.php">Danh sách thương hiệu</a> </li>
                    </ul>
                </li>
                <?php } ?>

                <?php 
                    // Product menu - admin, sale
                    if($role === 'admin' || $role === 'sale') {
                ?>
                <li><a class="menuitem">Quản Lí Sản phẩm</a>
                    <ul class="submenu">
                        <li><a href="productadd.php">Thêm sản phẩm</a> </li>
                        <li><a href="productlist.php">Liệt kê sản phẩm</a> </li>
                    </ul>
                </li>
                <?php } ?>

                <?php 
                    // Warehouse menu - admin, sale, bunker
                    if($role === 'admin' || $role === 'bunker') {
                ?>
                <li><a class="menuitem">Quản Lí Kho Hàng</a>
                    <ul class="submenu">
                        <li><a href="warehouse.php">Quản lý kho</a> </li>
                    </ul>
                </li>
                <?php } ?>

                <?php 
                    // Staff menu - chỉ admin
                    if($role === 'admin') {
                ?>
                <li><a class="menuitem">Quản Lí Nhân Viên</a>
                    <ul class="submenu">
                        <li><a href="staffadd.php">Thêm nhân viên</a> </li>
                        <li><a href="stafflist.php">Danh sách nhân viên</a> </li>
                    </ul>
                </li>
                <?php } ?>
        






            </ul>
        </div>
    </div>
</div>