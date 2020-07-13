<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../format/format.php');
?>
<?php 
class Brand{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_brand($namebrand){
        $namebrand = $this->fm->validation($namebrand);
        $namebrand = mysqli_real_escape_string($this->db->link, $namebrand);
        if(empty($namebrand)){
            $alert = "<span class='error'>Tên thương hiệu không được trống</span>";
            return $alert;
        }else{
            $query = "INSERT INTO ThuongHieu(TenTH) VALUES('$namebrand')";
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
    public function show_brand(){
        $query = "SELECT * FROM ThuongHieu";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_brand($brandname,$idbrand){
        $brandname = $this->fm->validation($brandname);
        $idbrand = mysqli_real_escape_string($this->db->link, $idbrand);
        if(empty($brandname)){
            $alert = "<span class='error'>Tên thương hiệu không được trống</span>";
            return $alert;
        }else{
            $query = "UPDATE ThuongHieu SET TenTH='$brandname' WHERE MaTH='$idbrand'";
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
    public function getbrandnamebyid($id){
        $query = "SELECT * FROM ThuongHieu WHERE MaTH='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getbrandapple(){
        $query = "SELECT * FROM ThuongHieu WHERE TenTH='Apple'";
        $result = $this->db->select($query);
        return $result;
    }
    public function delete_brand($id){
        $query = "DELETE FROM ThuongHieu WHERE MaTH ='$id'";
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