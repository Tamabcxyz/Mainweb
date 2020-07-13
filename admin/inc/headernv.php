<?php
include_once '../lib/session.php';
Session::checkSessionEmployee();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="icon" href="img/title.ico">
<title>Employee</title>
<link rel="stylesheet" href="./css/style.css">
</head>
<body>
	<header>
	<center><h2>NHÂN VIÊN WEBSITE: shoponline.vn</h2></center><br/>
	<div class="hello">
		<ul>
			<img alt="image" src="img/logoctu.png">
			<li> Hello <?php echo $_SESSION['employeeUser']?></li>
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
		<a href="indexnv.php">Duyệt đơn hàng</a>
		<a href="profileemployee.php">Hồ sơ người dùng</a>
		<a href="changepasswordemployee.php">Thay đổi password</a>
		<a href="../index.php">Xem website</a>
	</nav>
