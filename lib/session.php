<?php
/**
 *Session Class
 **/
class Session{
    // ham khoi tao session
    public static function init(){
        /*phpversion tra ve version hien tai cua php*/
        /*version_compar ham nay se tra ve 3 gia tri 0 1 -1 neu doi so1 nho hon doi so2 tra ve -1 neu bang nhau tra ve 0 va neu lon hon tra ve 1
         * nhung neu co tham so thu 3 thi ham se tra ve 2 gia tri true va false
         * ham session_id tra ve key cua session hien tai
         * ham session_start khoi tao session
         *  */
        if (version_compare(phpversion(), '5.4.0', '<')) {
            if (session_id() == '') {
                session_start();
            }
        } else {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }
    }
    
    public static function set($key, $val){
        $_SESSION[$key] = $val;
    }
    
    public static function get($key){
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }
    /*tu khoa self dung de goi cac phuong thuc tinh va ham tinh trong php*/
    public static function checkSessionAdmin(){
        self::init();
        if (self::get("adminlogin")== false) {
            self::destroy();
            header("Location:login.php");
        }
    }
    public static function checkSessionEmployee(){
        self::init();
                if (self::get("employeelogin")== false) {
                    self::destroy();
                    header("Location:login.php");
                }
    }
    
    public static function checkLogin(){
        self::init();
        if (self::get("adminlogin")== true) {
            header("Location:index.php");
        }elseif (self::get("employeelogin")== true) {
            header("Location:indexnv.php");
        }
    }

    
    public static function destroy(){
        session_destroy();
        header("Location:login.php");
    }
}
?>

