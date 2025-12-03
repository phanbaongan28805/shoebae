<?php 
	include 'inc/header.php';
?>
<style>
.fail-container {
    text-align: center;
    margin: 80px auto;
    padding: 40px;
    max-width: 600px;
    background-color: #fff;
    border: 1px solid #ddd;
    box-shadow: 0 0 10px rgba(0,0,0,0.05);
    border-radius: 8px;
}
.fail-container h2 {
    color: #d9534f; /* Red color for failure */
    font-size: 28px;
    margin-bottom: 20px;
}
.fail-container p {
    font-size: 16px;
    color: #555;
    line-height: 1.6;
}
.btn-reorder {
    display: inline-block;
    margin-top: 30px;
    padding: 12px 25px;
    background-color: #f0ad4e; /* Orange color */
    color: white;
    text-decoration: none;
    font-weight: bold;
    border-radius: 5px;
    transition: background-color 0.3s;
}
.btn-reorder:hover {
    background-color: #ec971f;
}
</style>

<div class="main">
    <div class="content">
        <div class="section group">
            <div class="fail-container">
                <h2>❌ Thanh toán không thành công</h2>
                <p>Giao dịch của bạn với VNPAY không thể hoàn tất. Đã có lỗi xảy ra hoặc bạn đã hủy giao dịch.</p>
                <p>Vui lòng thử lại hoặc chọn một phương thức thanh toán khác.</p>
                <a href="cart.php" class="btn-reorder">Thử lại với giỏ hàng</a>
            </div>
        </div>
    </div>
</div>

<?php 
	include 'inc/footer.php';
?>
