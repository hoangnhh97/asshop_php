<?php 
    class Controller {
        public function model($model) {
            require_once "./mvc/models/".$model.".php";
            return new $model;
        }

        public function view($view, $data=[]) {
            $this->model("Users");
            if(isset($_POST["btnLogin"])) {
                $this->Login();
            }


            if(isset($_POST["btnRegister"])) {
                $this->Register();
            }
            $this->model("Category");
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
                    <p>'.$message.'</p></div>';   


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
                $_SESSION["userid"] = $checkUser["user_id"];
                $_SESSION["email"] = $checkUser["email"];
                $_SESSION["role"] = $checkUser["role_id"];
                $this->setAlert("Đăng nhập thành công!", "success");
            } else {
                $this->setAlert("Đăng nhập thất bại!", "error");
            }
            
            
        }


        public function Register() {
            $first_name = Common::getPOST("txtTen");
            $last_name = Common::getPOST("txtHo");

            $email = Common::getPOST("txtUsername");
            $phone = Common::getPOST("txtPhoneNumber");
            $pass = Common::getPOST("txtPassword");
            $repass = Common::getPOST("txtRePass");
            if(empty($first_name) || empty($last_name) || empty($email) || empty($pass) || empty($phone)) {
                $this->setAlert("Đăng ký thất bại. Vui lòng nhập đầy đủ thông tin!", "error");
            }

            if($pass != $repass) {
                $this->setAlert("Đăng ký thất bại. Mật khẩu không trùng khớp!", "error");
            }
    
            $user = new Users();
            $address = "";
            $type = "1";
            $roleid = "2";
            $createUser = $user->insert_User($first_name, $last_name, $email, $pass, $phone, $address, $type, $roleid);
            var_dump($createUser);
            if($createUser) {
                $this->setAlert("Đăng ký thành công!", "success");
            } else {
                $this->setAlert("Đăng ký thất bại. Vui lòng kiểm tra lại thông tin!", "error");
            }
            
        }


        

        
    }
?>