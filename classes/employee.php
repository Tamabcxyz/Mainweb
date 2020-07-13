<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../format/format.php');
?>
<?php
class Employee{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_employee($ht,$cv,$dc,$sdt,$mk){
        $ht = mysqli_real_escape_string($this->db->link, $ht);
        $cv = mysqli_real_escape_string($this->db->link, $cv);
        $dc = mysqli_real_escape_string($this->db->link, $dc);
        $sdt = mysqli_real_escape_string($this->db->link, $sdt);
        $mk = mysqli_real_escape_string($this->db->link, $mk);
        if(empty($ht)||empty($cv)||empty($dc)||empty($sdt)||empty($mk)){
            $alert = "<span class='error'>Tên danh mục không được trống</span>";
            return $alert;
        }else{
            $query = "INSERT INTO NhanVien(HoTenNV,ChucVu,DiaChi,SoDienThoai,pass) VALUES('$ht','$cv','$dc','$sdt','$mk')";
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
    public function show_employee(){
        $query = "SELECT * FROM NhanVien";
        $result = $this->db->select($query);
        return $result;
    }
    public function getemployeebyid($id){
        $query = "SELECT * FROM NhanVien WHERE MSNV ='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_employee($ht,$cv,$dc,$sdt,$employeeid){
        $ht = mysqli_real_escape_string($this->db->link, $ht);
        $cv = mysqli_real_escape_string($this->db->link, $cv);
        $dc = mysqli_real_escape_string($this->db->link, $dc);
        $sdt = mysqli_real_escape_string($this->db->link, $sdt);
        $employeeid = mysqli_real_escape_string($this->db->link, $employeeid);
        if(empty($ht)||empty($cv)||empty($dc)||empty($sdt)){
            $alert = "<span class='error'>Tên danh mục không được trống</span>";
            return $alert;
        }else{
            $query = "UPDATE NhanVien SET HoTenNV='$ht', ChucVu='$cv', DiaChi='$dc', SoDienThoai='$sdt' WHERE MSNV='$employeeid'";
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
    public function delete_employee($id){
        $query = "DELETE FROM NhanVien WHERE MSNV ='$id'";
        $result = $this->db->delete($query);
        if($result){
            $alert = "<span class='success'>Xóa thành công</span>";
            return $alert;
        }else{
            $alert = "<span class='error'>Xóa thất bại</span>";
            return $alert;
        }
    }
    public function update_employee_pass($data,$id){
        $oldpass = mysqli_real_escape_string($this->db->link,$data['oldpass']);
        $newpass = mysqli_real_escape_string($this->db->link,$data['newpass']);
        if(empty($oldpass)||empty($newpass)){
            $alert = "<span class='error'>Tên danh mục không được trống</span>";
            return $alert;
        }else{
            $oldpass=md5($oldpass);
            $newpass=md5($newpass);
            $checkoldpass ="SELECT pass FROM nhanvien WHERE MSNV='$id' LIMIT 1";
            $resultchecoldpass = $this->db->select($checkoldpass);
            $check= $resultchecoldpass->fetch_assoc();
            if($check['pass']==$oldpass){
                $query = "UPDATE nhanvien SET pass='$newpass' WHERE MSNV='$id'";
                $result = $this->db->update($query);
                if($result){
                    $alert = "<span class='success'>Cập nhật thành công</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'> Cập nhật thất bại</span>";
                    return $alert;
                }
            }else{
                $alert = "<span class='error'>Mật khẩu cũ không đúng</span>";
                return $alert;
            }
        }
    }
    public function show_employee_by_id($id){
        $query = "SELECT * FROM NhanVien WHERE MSNV='$id'";
        $result = $this->db->select($query);
        return $result;
    }
}

?>