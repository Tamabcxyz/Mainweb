<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../format/format.php');
?>
<?php
class Customer{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_customer($data){
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $adress = mysqli_real_escape_string($this->db->link, $data['adress']);
        $numphone = mysqli_real_escape_string($this->db->link, $data['numphone']);
        $mail = mysqli_real_escape_string($this->db->link, $data['mail']);
        $pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));
        if($name==""||$adress==""||$numphone==""||$mail==""||$pass==""){
            $alert = "<span class='error'>Tên danh mục không được trống</span>";
            return $alert;
        }else{
            $checkmail ="SELECT * FROM KhachHang WHERE email='$mail' LIMIT 1";
            $resultcheckmail = $this->db->select($checkmail);
            $checkphone ="SELECT * FROM KhachHang WHERE SoDienThoai='$numphone' LIMIT 1";
            $resultcheckphone =$this->db->select($checkphone);
            if($resultcheckmail==TRUE||$resultcheckphone==TRUE){
                $alert = "<span class='error'>Số điện thoại hoặc mail đã tồn tại</span>";
                return $alert;
            }else{
                $query = "INSERT INTO KhachHang(HoTenKH, DiaChi, SoDienThoai, email, pass) VALUES('$name','$adress','$numphone','$mail','$pass')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Quý khách hàng có thể đăng nhập!</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Tạo thất bại</span>";
                    return $alert;
                }
            }
        }
    }
    public function login_customer($data){
        $numphone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));
        if($numphone==""||$pass==""){
            $alert = "<span class='error'>Các trường không được trống</span>";
            return $alert;
        }else{
            $check ="SELECT * FROM KhachHang WHERE SoDienThoai='$numphone' AND pass='$pass'";
            $resultcheck = $this->db->select($check);
            if($resultcheck!=FALSE){
                // khach hang da nhap dung so dien thoai va pass
                $value = $resultcheck->fetch_assoc();
                Session::set('customer_login', true);
                Session::set('customer_id', $value['MSKH']);
                Session::set('customer_name', $value['HoTenKH']);
                Session::set('phone',$value['SoDienThoai']);
                header('Location:mycart.php');// luc truoc o day la order.php
            }else{
                $alert = "<span class='error'>Số điện thoại hoặc mật khẩu không đúng</span>";
                return $alert;
            }
            
        }
    }
    public function show_customer($id){
        $query = "SELECT * FROM KhachHang WHERE MSKH='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_listcustomer(){
        $query = "SELECT * FROM KhachHang";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_customer($data,$id){
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $adress = mysqli_real_escape_string($this->db->link, $data['adress']);
        $numphone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $mail = mysqli_real_escape_string($this->db->link, $data['mail']);
        if($name==""||$adress==""||$numphone==""||$mail==""){
            $alert = "<span class='error'>Tên danh mục không được trống</span>";
            return $alert;
        }else{
            $query = "UPDATE KhachHang SET HoTenKH='$name', DiaChi='$adress', SoDienThoai='$numphone', email='$mail' WHERE MSKH='$id'";
            $result = $this->db->update($query);
            if($result){
                 $alert = "<span class='success'>Cập nhật thành công</span>";
                   return $alert;
            }else{
                  $alert = "<span class='error'> Cập nhật thất bại</span>";
                  return $alert;
           }
        }
    }
}
?>