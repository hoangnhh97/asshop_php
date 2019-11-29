<?php 
    class Controller {
        public function model($model) {
            require_once "./mvc/models/".$model.".php";
            return new $model;
        }

        public function view($view, $data=[]) {
            if(isset($_POST["btnLogin"])) {
                $this->Login();
            }
            require_once "./mvc/views/".$view.".php";
        }

        public function setAlert($message, $type) {
            if($type == "success") {
                $type = "alert-success";
            } else if($type == "error"){
                $type = "alert-danger";
            } else if($type == "warning"){
                $type = "alert-warning";
            }


            $_POST["messageAlert"] = '<div id="alert-box" class="alert '.$type.' alert-dismissable" id="flash-msg">
                    <h4>'.$message.'</h4></div>';   


            return $_POST["messageAlert"];
        }


        public function Login() {
            $username = Common::getPOST("txtUsername");
            $pass = Common::getPOST("txtPassword");
    
            if($username == null || $pass == null) {
                $this->setAlert("Đăng nhập thất bại!", "error");
            }
    
            $user = new Users();
            $checkUser = $user->get_Login_User($username, $pass);
            if(count($checkUser) > 0) {
                $_SESSION["email"] = $checkUser["email"];
                $_SESSION["role"] = $checkUser["role_id"];
                $this->setAlert("Đăng nhập thành công!", "success");
            } else {
                $this->setAlert("Đăng nhập thất bại!", "error");
            }
            
            
        }

        
    }
?>