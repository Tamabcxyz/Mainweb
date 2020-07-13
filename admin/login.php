<?php 
    include_once '../classes/adminlogin.php';
?>
<?php 
$class=new adminlogin();
if($_SERVER['REQUEST_METHOD']==='POST'){// isset($_POST)
    $AdminUser=$_POST['adminuser'];
    $AdminPass=md5($_POST['adminpass']);
    $logincheck=$class->login_admin($AdminUser,$AdminPass);
}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
</head>
<body>
<div class="containlogin">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Đăng nhập cho quản trị hoặc nhân viên</h1>
			<span>
				<?php 
				if(isset($logincheck)){
				    echo $logincheck;
				}
				?>
			</span>
			<div>
				<input type="text" placeholder="Ten dang nhap" name="adminuser"/>
			</div>
			<div>
				<input type="password" placeholder="Mat khau" name="adminpass"/>
			</div>
			<div>
				<input id="login" type="submit" value="Log in" />
			</div>
		</form>
		<div class="button">
		</div>
	</section>
</div>
</body>
</html>