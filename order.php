<?php 
	include 'inc/header.php';

 ?>
<?php 

	$login_check = Session::get('customer_login');
	if ($login_check==false) {
		header('Location:login.php'); 
	}else {
        header('Location:offlinepayment.php');
    }

 ?>

<?php 
	include 'inc/footer.php';
 ?>