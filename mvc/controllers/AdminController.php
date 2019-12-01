<?php 
    class AdminController extends Admin {

        private $action;

        public function __construct()
        {
            $this->action = new Action(); 
        }


        public function Index() {

            $this->view("admin/views_admin/v_dashboard", []);
        }
        

        public function QuanLyNguoiDung($param = null, $id = null) {
            $redirect_root = Common::template_directory() . "/Admin/QuanLyNguoiDung";
            $action=0;
            $modelUsers = $this->model("Users");
            $modelRoles = $this->model("Roles");
            if(!empty($id)) {
                if($param == "Sua") {
                    $action = 2;
                } else if($param == "Xoa") {
                    $action = 3;
                    $this->action->DeleteUser($id);
                    header("Location:$redirect_root");
                } 
            } else {
                if($param == "Them" && empty($id)) {
                    $action = 1;
                }
            } 
            

            if(isset($_POST["btnThem"])) {
                $this->action->CreateNewUser();
            }

            if(isset($_POST["btnSua"])) {
                $this->action->EditUser($id);
            }

            
            

            $this->view("admin/views_admin/v_quan_ly_nguoi_dung", [
                "userid"=>$id,
                "action"=>$action,
                "listRole"=>$modelRoles->get_All_Role(),
                "listUser"=>$modelUsers->get_All_Users(),
                "singleUser"=>$modelUsers->get_Single_User($id),
            ]);
        }
        



       
    }
?>