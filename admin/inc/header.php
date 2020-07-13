<?php 
include_once '../lib/session.php';
Session::checkSessionAdmin();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="icon" href="img/title.ico">
<title>Admin</title>
<link rel="stylesheet" href="./css/style.css">
</head>
<body>
	<header>
	<center><h2>QUẢN TRỊ VIÊN WEBSITE: shoponline.vn</h2></center><br/>
	<div class="hello">
		<ul>
			<img alt="image" src="img/logoctu.png">
			<li> Hello <?php echo $_SESSION['adminUser']?></li>
			<?php 
			if(isset($_GET['action']) && $_GET['action']=='logout'){
			    Session::destroy();
			}
			?>
			<a href="?action=logout">Logout</a>
		</ul>
	</div>
	</header>
	<nav>
		<!-- <a href="index.php">Duyệt đơn hàng</a> -->
		<a href="index.php">Hồ sơ người dùng</a>
		<a href="changepassword.php">Thay đổi password</a>
		<a href="../index.php">Xem website</a>
	</nav>