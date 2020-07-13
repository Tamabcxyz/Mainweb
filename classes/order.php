<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../format/format.php');
?>
<?php 
class Order{
    private $db;
    private $fm;
    
    public function __construct(){
        $this->db = new Database();// goi ham khoi tao cua Database
        $this->fm = new Format();
    }
    public function show_order(){
        $query = "SELECT * FROM dathang as d, khachhang as k, nhanvien as n WHERE d.MSKH=k.MSKH AND d.MSNV=n.MSNV";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_order($orderid,$seid){
        $query = "UPDATE dathang SET MSNV='$seid', TrangThai='da duyet' WHERE SoDonDH='$orderid'";
        $result = $this->db->update($query);
    }
    public function delete_detail_order($delid){
        $que="select MSHH, SoLuong from chitietdathang where SoDonDH ='$delid'";
        $re=$this->db->select($que);
        
        while($temp=$re->fetch_assoc()){
            $id=$temp['MSHH'];
            $query3 = "SELECT SoLuongHang FROM hanghoa WHERE MSHH='$id'";
            $result3 = $this->db->select($query3);
            
            $ton=0;
            $slh=mysqli_fetch_assoc($result3);
            $ton=$slh["SoLuongHang"]+ $temp["SoLuong"];
            $query4 = "UPDATE hanghoa SET SoLuongHang='$ton' WHERE MSHH='$id'";
            $result4 = $this->db->update($query4);
        }
        $query = "DELETE FROM chitietdathang WHERE SoDonDH ='$delid'";
        $result = $this->db->delete($query);
    }
    public function delete_order($delid){
        $query = "DELETE FROM dathang WHERE SoDonDH ='$delid'";
        $result = $this->db->delete($query);
    }
    public function get_total_price($customerid){
        $query="SELECT c.SoLuong, c.GiaDatHang FROM dathang as d, chitietdathang as c WHERE d.SoDonDH=c.SoDonDH AND d.MSKH ='$customerid'";
        $result=$this->db->select($query);
        return $result;
    }
    public function show_order_detail($orderid){
        $query="SELECT * FROM dathang as d, chitietdathang as c, khachhang as k, hanghoa as h WHERE d.SoDonDH=c.SoDonDH AND d.MSKH=k.MSKH AND c.MSHH=h.MSHH AND c.SoDonDH ='$orderid'";
        $result=$this->db->select($query);
        return $result;
    }
}
?>
