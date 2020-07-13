<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../format/format.php');
?>
<?php
class Cart{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_cart($quality,$proid){
        $quality = $this->fm->validation($quality);
        $quality = mysqli_real_escape_string($this->db->link, $quality);
        $proid = mysqli_real_escape_string($this->db->link, $proid);
        $seid = session_id();
        $query = "SELECT * FROM hanghoa WHERE MSHH='$proid'";
        $result = $this->db->select($query)->fetch_assoc();
        $namepro = $result['TenHH'];
        $pricepro = $result['Gia'];
        $imagepro = $result['Hinh'];
        
        $soluong=$result['SoLuongHang'];
        if($soluong>=$quality){
            $queryinsertcart = "INSERT INTO GioHang(MSHH, IdSession, TenSanPham, SoLuong, GiaSanPham, HinhAnh) VALUES('$proid','$seid','$namepro','$quality','$pricepro','$imagepro')";
            $result1 = $this->db->insert($queryinsertcart);
            if($result1){
                header('Location: mycart.php');
            }else{
                header('Location: 404.php');
            }
        }else{
            echo '<script language="javascript">';
            echo 'alert("Hiện tại sản phẩm này chỉ còn '.$soluong.'")';
            echo '</script>';
        }
   
    }
    public function show_mycart(){
        $seid = session_id();
        $query ="SELECT * FROM GioHang WHERE IdSession ='$seid'";
        $result =$this->db->select($query);
        return $result;
    }
    public function update_quantity_cart($quantity, $cartid){
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $cartid = mysqli_real_escape_string($this->db->link, $cartid);
        $query = "UPDATE GioHang SET SoLuong='$quantity' WHERE IdGiohang='$cartid'";
        $result = $this->db->update($query);
        if($result){
            header('Location:mycart.php');
        }else{
            $alert = "<span class='success'>Cập nhật thất bại</span>";
            return $alert;
        }
    }
    public function delete_cartid($id){
        $query = "DELETE FROM GioHang WHERE IdGiohang ='$id'";
        $result = $this->db->delete($query);
        if($result){
            header('Location:mycart.php');
            $alert = "<span class='success'>Xóa thành công</span>";
            return $alert;
        }else{
            $alert = "<span class='error'>Xóa thất bại</span>";
            return $alert;
        }
    }
    public function check_cart(){
        $seid = session_id();
        $query ="SELECT * FROM GioHang WHERE IdSession ='$seid'";
        $result =$this->db->select($query);
        return $result;
    }
    public function delete_all_productincart(){
        $seid = session_id();
        $query ="DELETE FROM GioHang WHERE IdSession ='$seid'";
        $result =$this->db->select($query);
        return $result;
    }
    public function insert_from_cart_to_order($customerid){
        $seid = session_id();// session cua nguoi dung dang login
        $query ="SELECT * FROM GioHang WHERE IdSession ='$seid'";
        $getpro =$this->db->select($query); 
        if($getpro){
            // insert vao ban dat hang
            $query1="INSERT INTO dathang(MSKH,MSNV,TrangThai) VALUES('$customerid','NULL','chua duyet')";
            $kq=$this->db->insert($query1);
            $getmaxSoDonDH="SELECT max(SoDonDH) FROM dathang";
            $run=$this->db->select($getmaxSoDonDH);
            $row= mysqli_fetch_array($run);
            $SoDonDH=$row[0];
            while($result = $getpro->fetch_assoc()){
                // insert vao bang chi tiet dat hang
                $mshh=$result['MSHH'];
                $sl=$result['SoLuong'];
                $gia=$result['GiaSanPham'];
                
                $query31 = "SELECT SoLuongHang FROM hanghoa WHERE MSHH='$mshh'";
                $result31 = $this->db->select($query31);
                $run=mysqli_fetch_assoc($result31);
               
                if($sl > $run['SoLuongHang']){
                    echo '<script language="javascript">';
                    echo 'alert("Sản phẩm hiện chỉ mua được tối đa '.$run['SoLuongHang'].' sản phẩm.")';
                    echo '</script>';
                    
                }else{
                    $query2="INSERT INTO chitietdathang(SoDonDH,MSHH,SoLuong,GiaDatHang) VALUES('$SoDonDH','$mshh','$sl','$gia')";
                    $this->db->insert($query2);
                    $query2 = "SELECT SoLuong FROM chitietdathang where SoDonDH=(SELECT Max(SoDonDH) FROM chitietdathang)";
                    $result2= $this->db->select($query2);
                    
                    // lay so luong tu hanghoa
                    $query3 = "SELECT SoLuongHang FROM hanghoa WHERE MSHH='$mshh'";
                    $result3 = $this->db->select($query3);
                    $tong=0;
                    
                    $slh=mysqli_fetch_assoc($result3);
                    $temp=mysqli_fetch_assoc($result2);
                    $ton=$slh["SoLuongHang"]-$temp["SoLuong"];
                    $query4 = "UPDATE hanghoa SET SoLuongHang='$ton' WHERE MSHH='$mshh'";
                    $result4 = $this->db->update($query4);
                }
                  
            }
        }
    }
    
  
}
?>