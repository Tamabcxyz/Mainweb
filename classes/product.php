<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../format/format.php');
?>
<?php 
class Product{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_product($data, $files){
        $productname = mysqli_real_escape_string($this->db->link, $data['nameproduct']);
        $productcategory = mysqli_real_escape_string($this->db->link, $data['category']);
        $productbrand = mysqli_real_escape_string($this->db->link, $data['brand']);
        $productdesc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
        $productprice = mysqli_real_escape_string($this->db->link, $data['priceproduct']);
        $productnum = mysqli_real_escape_string($this->db->link, $data['numproduct']);
        $producttype = mysqli_real_escape_string($this->db->link, $data['selecttype']);
        
        $permited = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['imgProduct']['name'];
        $file_size = $_FILES['imgProduct']['size'];
        $file_temp = $_FILES['imgProduct']['tmp_name'];
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;
        if($productname==""||$productcategory==""||$productbrand==""||$productdesc==""||$productprice==""||$productnum==""||$producttype==""||$file_name==""){
            $alert = "<span class='error'>Tên danh mục không được trống</span>";
            return $alert;
        }else{
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO hanghoa(TenHH, Gia, SoLuongHang, MaNhom, MaTH, Hinh, MoTaHH, type) VALUES('$productname','$productprice','$productnum','$productcategory','$productbrand','$unique_image','$productdesc','$producttype')";
            $result = $this->db->insert($query);
            if($result){
                $alert = "<span class='success'>Thêm thành công</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Thêm thất bại</span>";
                return $alert;
            }
        }
    }
    public function show_product(){
            $query = "SELECT h.*, n.TenNhom, t.TenTH FROM hanghoa as h, nhomhanghoa as n, thuonghieu as t WHERE h.MaNhom = n.MaNhom AND h.MaTH=t.MaTH";
            $result = $this->db->select($query);
            return $result;
    }
    public function getproductbyid($id){
        $query = "SELECT * FROM hanghoa WHERE MSHH='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_product($data, $files, $id){
        $productname = mysqli_real_escape_string($this->db->link, $data['nameproduct']);
        $productcategory = mysqli_real_escape_string($this->db->link, $data['category']);
        $productbrand = mysqli_real_escape_string($this->db->link, $data['brand']);
        $productdesc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
        $productprice = mysqli_real_escape_string($this->db->link, $data['priceproduct']);
        $productnum = mysqli_real_escape_string($this->db->link, $data['numproduct']);
        $producttype = mysqli_real_escape_string($this->db->link, $data['selecttype']);
        
        $permited = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['imgProduct']['name'];
        $file_size = $_FILES['imgProduct']['size'];
        $file_temp = $_FILES['imgProduct']['tmp_name'];
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;
        if($productname==""||$productcategory==""||$productbrand==""||$productdesc==""||$productprice==""||$productnum==""||$producttype==""){
            $alert = "<span class='error'>Các trường không được trống</span>";
            return $alert;
        }else{
            if(!empty($file_name)){
                if($file_size>2097152){
                    $alert ="<span class='error'>Kích thước ảnh không được quá 2MB</span>"; return $alert;
                }
                elseif(in_array($file_ext, $permited)===false){
                    $alert ="<span class='error'>Anh phai la file co duoi ".implode(',',$permited)."</span>"."$file_ext"; return $alert;
                }
                move_uploaded_file($file_temp, $uploaded_image);
                $query ="UPDATE hanghoa SET 
                TenHH='$productname',
                Gia='$productprice',
                SoLuongHang='$productnum',
                MaNhom='$productcategory',
                MaTH='$productbrand',
                Hinh='$unique_image',
                MoTaHH='$productdesc',
                type='$producttype'
                WHERE MSHH='$id'";
            }
            else{
                $query ="UPDATE hanghoa SET
                TenHH='$productname',
                Gia='$productprice',
                SoLuongHang='$productnum',
                MaNhom='$productcategory',
                MaTH='$productbrand',
                MoTaHH='$productdesc',
                type='$producttype'
                WHERE MSHH='$id'";
            }
        }
        $result = $this->db->update($query);
        if($result){
            $alert = "<span class='success'>Cập nhật thành công</span>";
            return $alert;
        }else{
            $alert = "<span class='error'>Cập nhật thất bại</span>";
            return $alert;
        }
    }
    public function delete_product($id){
        $query1 = "SELECT Hinh FROM hanghoa WHERE MSHH='$id'";
        $result1 = $this->db->select($query1);
        $l = $result1->fetch_assoc();
        $temp = $l['Hinh'];
        $path = "uploads/$temp";
        unlink($path);
        $query = "DELETE FROM hanghoa WHERE MSHH ='$id'";
        $result = $this->db->delete($query);
        if($result){
            $alert = "<span class='success'>Xóa thành công</span>";
            return $alert;
        }else{
            $alert = "<span class='error'>Xóa thất bại</span>";
            return $alert;
        }
        
    }
    // end admin
    public function getproducttype1(){
        $query = "SELECT * FROM hanghoa WHERE type='1' LIMIT 8";
        $result = $this->db->select($query);
        return $result;
    }
    // lay sp moi
    public function getproductnew(){
        $product_a_page=8;
        $page=1;
        if(!isset($_GET['page'])){
            $page=1;
        }else{
            $page=$_GET['page'];
        }
        $temp=($page-1)*$product_a_page;
        $query = "SELECT * FROM hanghoa ORDER BY MSHH DESC LIMIT $temp,$product_a_page";
        $result = $this->db->select($query);
        return $result;
    }
    // lay tat ca sp
    public function getproductall(){
        $query = "SELECT * FROM hanghoa";
        $result = $this->db->select($query);
        return $result;
    }
    public function getdetailproduct($id){
        $query = "SELECT h.*, n.TenNhom, t.TenTH FROM hanghoa as h, nhomhanghoa as n, thuonghieu as t WHERE h.MaNhom = n.MaNhom AND h.MaTH=t.MaTH AND h.MSHH ='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproductbybrandnamenew($name){
        $query = "SELECT h.*, t.TenTH FROM hanghoa as h, thuonghieu as t WHERE h.MaTH=t.MaTH AND t.TenTH ='$name' order by h.MSHH desc LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproductnamelike($searchname){
        $searchname ="%".$searchname."%";
        $query = "SELECT * FROM hanghoa WHERE TenHH LIKE '$searchname' LIMIT 16";
        $result = $this->db->select($query);
        return $result;
    }
}
?>