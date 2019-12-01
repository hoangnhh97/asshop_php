<?php 

    class Action extends Admin {
        //Users Management
        public function CreateNewUser() {
            $first_name = Common::getPOST("txtFirstName");
            $last_name = Common::getPOST("txtLastName");

            $email = Common::getPOST("txtEmail");
            $phone = Common::getPOST("txtPhoneNumber");
            $pass = Common::getPOST("txtPass");
            $address = Common::getPOST("txtAddress");
            $type = Common::getPOST("ddlType");
            $role = Common::getPOST("ddlRole");
            if(empty($first_name) || empty($last_name) || empty($email) || empty($pass) || empty($phone)) {
                $this->setAlert("Thêm thất bại. Vui lòng nhập đầy đủ thông tin!", "error");
            }

            $user = new Users();
            $result = $user->insert_User($first_name, $last_name, $email, $pass, $phone, $address, $type, $role);
            if($result) {
                $this->setAlert("Thêm mới thành công!", "success");
            } else {
                $this->setAlert("Thêm mới thất bại. Vui lòng kiểm tra lại thông tin!", "error");
            }
        }



        public function EditUser($id) {
            $user_id = $id;
            $first_name = Common::getPOST("txtFirstName");
            $last_name = Common::getPOST("txtLastName");

            $email = Common::getPOST("txtEmail");
            $phone = Common::getPOST("txtPhoneNumber");
            $pass = Common::getPOST("txtPass");
            $address = Common::getPOST("txtAddress");
            $type = Common::getPOST("ddlType");
            $role = Common::getPOST("ddlRole");
            if(empty($first_name) || empty($last_name) || empty($email) || empty($pass) || empty($phone)) {
                $this->setAlert("Cập nhật bại. Vui lòng nhập đầy đủ thông tin!", "error");
            }

            $user = new Users();
            $result = $user->update_User($user_id, $first_name, $last_name, $email, $pass, $phone, $address, $type, $role);
            if($result) {
                $this->setAlert("Cập nhật thành công!", "success");
            } else {
                $this->setAlert("Cập nhật thất bại. Vui lòng kiểm tra lại thông tin!", "error");
            }
        }

        public function DeleteUser($id) {
            $user_id = $id;
            if(empty($user_id)) {
                $this->setAlert("Xóa bại. Vui lòng nhập đầy đủ thông tin!", "error");
            }

            $user = new Users();
            $result = $user->delete_User($user_id);
            if($result) {
                $this->setAlert("Xóa thành công!", "success");
            } else {
                $this->setAlert("Xóa thất bại. Vui lòng kiểm tra lại thông tin!", "error");
            }
        }
    }

?>