<?php 
    class UserController extends BaseController {
        public static function login() {
            $username = Common::getPOST("txtUsername");
            $pass = Common::getPOST("txtPassword");

            if($username == null || $pass == null) {
                return "Lỗi 1";
            }

            $user = new Users();
            $checkUser = $user->get_Login_User($username, $pass);
            
            if($checkUser) {
                $_SESSION["email"] = $checkUser["email"];
                $_SESSION["role"] = $checkUser["role_id"];
            } else {
                return 0;
            }
            BaseController::getMessage("Đăng nhập thành công!");
            BaseController::getTypeAlert("success");
            return 1;
        }



    }
?>