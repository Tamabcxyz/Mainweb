<?php 
include_once 'lib/session.php';
Session::init();
?>
<?php
include_once 'lib/database.php';
include_once 'format/format.php';
//    auto load library
spl_autoload_register(function ($lassname){
    include_once 'classes/'.$lassname.'.php';
});
$db = new Database();
$fm = new Format();
$cart = new Cart();
$pro = new Product();
$ca = new Category();
$br = new Brand();
$cs = new Customer();
$order= new Order();
?>
<!DOCTYPE html>
<html>
<head>
<title>Web ban hang</title>
<link rel="icon" href="image/title.ico">
<script type="text/javascript" src="js/script.js"></script>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header class="header">
		<div class="menu">
			<nav>
				<a href="index.php">Trang chủ</a>
				<a href="topbrand.php">Thương hiệu</a>
				<?php 
				$logincheck = Session::get('customer_login');
				if($logincheck==FALSE){
				    echo '';
				}else{
				    echo '<a href="profile.php">Thông tin tài khoản</a>';
				    
				}
				?>
				
				<a href="contact.php">Liên hệ</a> 
				<a href="register.php">Đăng ký tài khoản</a>
			</nav>
		</div>
		<div class="logo"></div>
		<form action="search.php?search=" method="get">
			<div class="search">
			<input type="search" name="name" placeholder="Tìm kiếm sản phẩm..">
			<input type="submit" value="Tìm kiếm" >
			</div>
		</form>
		<div class="cartshoping">
			<div class="leftcartshoping"></div>
			<div class="rightcartshoping">
				<a href="mycart.php">
					<span class="titlecart">Giỏ hàng</span>
					<span class="nofunctioncart">
						<?php 
						$checkcart = $cart->check_cart();
						if($checkcart){
						    $sum = Session::get("sum");
						    $qty = Session::get("qty");
						    echo $sum.' '.'('.$qty.')';
						}else{
						    echo "Rỗng";
						} 
						?>
					</span>
				</a>
			</div>
		</div>
		<?php 
		// neu nguoi dung nhan vao dang xuat thi url se xuat hien customerID nen ta co the huy session
		// truoc khi huy session can xoa het data trong gio hang
		if(isset($_GET['customerID'])){
		    $delcart = $cart->delete_all_productincart();
		    Session::destroy();
		}
		?>
		<div class="logout">
		<?php 
		// neu nguoi dung chua dang nhap thi hien nut dang nhap
		      $logincheck = Session::get('customer_login');
		      if($logincheck==FALSE){
		          echo '<a href="login.php">Đăng nhập</a>';
		      }else{
		          echo '<a class="error" href="?customerID='.Session::get('customer_id').'">Đăng xuất </a>';
		         
		      }
		?>
		</div>
		<div class="animation">
			<marquee><i>Chào mừng các bạn đến với trang Web mua hàng chất lượng shoponline.com.</i></marquee>
		</div>
	</header>
