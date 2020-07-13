<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../format/format.php');
?>
<?php
class Category{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_category($catName){
        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName);
        if(empty($catName)){
            $alert = "<span class='error'>Tên danh mục không được trống</span>";
            return $alert;
        }else{
            $query = "INSERT INTO nhomhanghoa(TenNhom) VALUES('$catName')";
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
    public function show_category(){
        $query = "SELECT * FROM nhomhanghoa";
        $result = $this->db->select($query);
        return $result;
    }
    public function getcatbyid($id){
        $query = "SELECT * FROM nhomhanghoa WHERE MaNhom ='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_category($catname,$catid){
        $catname = $this->fm->validation($catname);
        $catid = mysqli_real_escape_string($this->db->link, $catid);
        if(empty($catname)){
            $alert = "<span class='error'>Tên danh mục không được trống</span>";
            return $alert;
        }else{
            $query = "UPDATE nhomhanghoa SET TenNhom='$catname' WHERE MaNhom='$catid'";
            $result = $this->db->update($query);
            if($result){
                $alert = "<span class='success'>Cập nhật thành công</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Cập nhật thất bại</span>";
                return $alert;
            }
        }
        
    }
    public function delete_category($id){
        $query = "DELETE FROM nhomhanghoa WHERE MaNhom ='$id'";
        $result = $this->db->delete($query);
        if($result){
            $alert = "<span class='success'>Xóa thành công</span>";
            return $alert;
        }else{
            $alert = "<span class='error'>Xóa thất bại</span>";
            return $alert;
        }
        
    }
}
?>