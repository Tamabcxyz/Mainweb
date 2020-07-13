<?php 
	include_once "inc/header.php";
	include_once "inc/sidebar.php";
	include_once '../classes/brand.php';
?>
<?php 
    $brand = new Brand();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $namebrand = $_POST['namebrand'];
        $insertbrand = $brand->insert_brand($namebrand);
    }
?>
	<div class="main">
		<div class="topmain">Thêm thương hiệu</div>
		<div class="centmain">
			<?php 
			if(isset($insertbrand)){
			    echo $insertbrand;
			}
			?>
			<form action="addbrand.php" method="post">
				<table class="form">					
                <tr>
                    <td>
                        <label>Tên thương hiệu:</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Tên thương hiệu sp..."  name="namebrand"  />
                    </td>
                </tr>
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Thêm" />
                    </td>
                </tr>
            </table>
			</form>
		</div>
	</div>
<?php 
	include_once "inc/footer.php";
?>