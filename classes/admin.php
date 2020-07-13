<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../format/format.php');
?>
<?php
class Admin{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function show_admin_by_id($id){
        $query = "SELECT * FROM admin WHERE AdminID='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function select_oldpass($id){
        $query = "SELECT AdminPass FROM admin WHERE AdminID='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_pass($newpass,$id){
        $newpass = $this->fm->validation($newpass);
        $newpass = mysqli_real_escape_string($this->db->link,$newpass);
        if(empty($newpass)){
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
    public function update_admin_pass($data,$id){
        $oldpass = mysqli_real_escape_string($this->db->link,$data['oldpass']);
        $newpass = mysqli_real_escape_string($this->db->link,$data['newpass']);
        if(empty($oldpass)||empty($newpass)){
            $alert = "<span class='error'>Tên danh mục không được trống</span>";
            return $alert;
        }else{
            $oldpass=md5($oldpass);
            $newpass=md5($newpass);
            $checkoldpass ="SELECT AdminPass FROM admin WHERE AdminID='$id' LIMIT 1";
            $resultchecoldpass = $this->db->select($checkoldpass);
            $check= $resultchecoldpass->fetch_assoc();
            if($check['AdminPass']==$oldpass){
                $query = "UPDATE admin SET AdminPass='$newpass' WHERE AdminID='$id'";
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
    
}
?>