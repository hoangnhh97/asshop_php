<?php 
    class UserController extends Controller {

        public function Logout() {
    

            unset($_SESSION["email"]);
            unset($_SESSION["role"]);
            
            $this->setAlert("Đăng xuất thành công!", "success");
            $redirect = Common::template_directory();
            header("Location:$redirect");
        }
    }
?>