<?php
include_once "inc/header.php";
include_once "inc/sidebar.php";
include_once '../classes/brand.php';
?>
<?php 
    $brand =new Brand();
    if(!isset($_GET['idbrand']) || $_GET['idbrand'] == NULL){
        echo "<script>window.location='listbrand.php';</script>";
    }else{
        $idbrand = $_GET['idbrand'];
    }
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $brandname = $_POST['brandname'];
        $updatebrand = $brand->update_brand($brandname,$idbrand);
    }
?>

	<div class="main">
		<div class="topmain">Sửa thương hiệu sản phẩm</div>
		<div class="centmain">
		<?php 
		if(isset($updatebrand)){
		    echo $updatebrand;
		}
		?>
		<?php 
		$getbrandname = $brand->getbrandnamebyid($idbrand);
		if($getbrandname){
		    while($result = $getbrandname->fetch_assoc()){
		        
		   
		?>
			<form action="" method="post"><!-- action o day phai la rong no moi gui catid ve dung nhu link khi click vao sua neu gui trang khac thi se ko co id de capnhat vao csdl -->
				<table class="form">					
                <tr>
                    <td>
                        <label>Tên thương hiệu:</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Bạn muốn sửa thành thương hiệu gì?"  name="brandname" value="<?php echo $result['TenTH']?>"/>
                    </td>
                </tr>
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Sửa" />
                    </td>
                </tr>
            </table>
			</form>
		<?php 
		    }
		}
		?>
		</div>
	</div>
<?php 
	include_once "inc/footer.php";
?>	
