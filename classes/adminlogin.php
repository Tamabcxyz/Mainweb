<?php 
$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../lib/session.php');
Session::checkLogin();
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../format/format.php');
?>
<?php 
class adminlogin{
    private $db;
    private $fm;
    
    public function __construct(){
        $this->db = new Database();// goi ham khoi tao cua Database
        $this->fm = new Format();
    }
    public  function login_admin($AdminUser,$AdminPass){
        $AdminUser = $this->fm->validation($AdminUser);// kiem tra xem no co chua cac ki tu dat biet \ hay ko?
        $AdminPass = $this->fm->validation($AdminPass);
        $AdminUser = mysqli_real_escape_string($this->db->link, $AdminUser);// nham de loai bo cac ki tu xau gay sql enjection
        $AdminPass = mysqli_real_escape_string($this->db->link, $AdminPass);
        if(empty($AdminUser)||empty($AdminPass)){
            $alert ="<span class='error'>Tên đăng nhập và mật khẩu không được trống!</span>";
            return $alert;
        }else{
            $queryadmin="SELECT * FROM admin WHERE AdminUser='$AdminUser' AND AdminPass='$AdminPass' LIMIT 1";
            
            $queryemployee ="SELECT * FROM NhanVien WHERE HoTenNV='$AdminUser' AND pass='$AdminPass' LIMIT 1";
            
            $result = $this->db->select($queryadmin);
            $result1 = $this->db->select($queryemployee);
            if($result != false){
                $value = $result->fetch_assoc();
                Session::set('adminlogin', true);// neu day la adminlogin thi ham checkLogin() trong file Session cung phai la adminlogin
                Session::set('adminID', $value['AdminID']);
                Session::set('adminName', $value['AdminName']);
                Session::set('adminUser', $value['AdminUser']);
                header("Location:index.php");
            }elseif($result1 != false ){
                $value1 = $result1->fetch_assoc();
                Session::set('employeelogin', true);
                Session::set('employeeID', $value1['MSNV']);
                Session::set('employeeUser', $value1['HoTenNV']);
                Session::set('employeeposition', $value1['ChucVu']);
                header("Location:indexnv.php");
            }else{
                $alert ="<span class='error'>Tên đăng nhập hoặc mật khẩu không đúng thử lại!<span>";
                return $alert;
            }
        }
    }
}
?>
