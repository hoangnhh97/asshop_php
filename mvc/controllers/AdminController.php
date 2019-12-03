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
        


        public function QuanLySanPham($param = null, $id = null) {
            $redirect_root = Common::template_directory() . "/Admin/QuanLySanPham";
            $action=0;
            $modelProduct = $this->model("Products");
            $modelCate = $this->model("Category");
            if(!empty($id)) {
                if($param == "Sua") {
                    $action = 2;
                } else if($param == "Xoa") {
                    $action = 3;
                    $this->action->DeleteProduct($id);
                    header("Location:$redirect_root");
                } 
            } else {
                if($param == "Them" && empty($id)) {
                    $action = 1;
                }
            } 
            

            if(isset($_POST["btnThem"])) {
                $this->action->CreateNewProduct();
            }

            if(isset($_POST["btnSua"])) {
                $this->action->EditProduct($id);
            }
            $this->view("admin/views_admin/v_quan_ly_san_pham", [
                "action"=>$action,
                "categorybyid"=>$modelCate->get_Category_by_Product_Id($id),
                "singleProduct"=>$modelProduct->getSingleProduct($id),
                "categories"=>$modelCate->get_All_Category(),
                "products"=>$modelProduct->get_All_Products(),
            ]);
        }


        public function QuanLyDanhMuc($param = null, $id = null) {
            $redirect_root = Common::template_directory() . "/Admin/QuanLyDanhMuc";
            $action=0;
            $modelCate = $this->model("Category");
            if(!empty($id)) {
                if($param == "Sua") {
                    $action = 2;
                } else if($param == "Xoa") {
                    $action = 3;
                    $this->action->DeleteCategory($id);
                    header("Location:$redirect_root");
                } 
            } else {
                if($param == "Them" && empty($id)) {
                    $action = 1;
                }
            } 
            

            if(isset($_POST["btnThem"])) {
                $this->action->CreateNewCategory();
            }

            if(isset($_POST["btnSua"])) {
                $this->action->EditCategory($id);
            }
            $this->view("admin/views_admin/v_quan_ly_danh_muc", [
                "action"=>$action,
                "singleCategory"=>$modelCate->get_Single_Cate($id),
                "categories"=>$modelCate->get_All_Category(),
            ]);
        }

        public function QuanLyQuyen($param = null, $id = null) {
            $redirect_root = Common::template_directory() . "/Admin/QuanLyQuyen";
            $action=0;
            $modelRole = $this->model("Roles");
            if(!empty($id)) {
                if($param == "Sua") {
                    $action = 2;
                } else if($param == "Xoa") {
                    $action = 3;
                    $this->action->DeleteRole($id);
                    header("Location:$redirect_root");
                } 
            } else {
                if($param == "Them" && empty($id)) {
                    $action = 1;
                }
            } 
            

            if(isset($_POST["btnThem"])) {
                $this->action->CreateNewRole();
                var_dump($this->action->CreateNewRole());
            }

            if(isset($_POST["btnSua"])) {
                $this->action->EditRole($id);
            }
            $this->view("admin/views_admin/v_quan_ly_quyen", [
                "action"=>$action,
                "singleRole"=>$modelRole->get_Single_Role($id),
                "roles"=>$modelRole->get_All_Role(),
            ]);
        }



        public function QuanLyDonHang($param = null, $id = null) {
            $redirect_root = Common::template_directory() . "/Admin/QuanLyDonHang";
            $action=0;
            $modelOrders = $this->model("Orders");
            $modelOrderDetails = $this->model("OrderDetails");
            if(!empty($id)) {
                if($param == "Sua") {
                    $action = 2;
                } else if($param == "Xoa") {
                    $action = 3;
                    $this->action->DeleteOrder($id);
                    header("Location:$redirect_root");
                } 
            } else {
                if($param == "Them" && empty($id)) {
                    $action = 1;
                }
            } 
            

            if(isset($_POST["btnThem"])) {
                $this->action->CreateNewOrder();
                var_dump($this->action->CreateNewOrder());
            }

            if(isset($_POST["btnSua"])) {
                $this->action->EditOrder($id);
            }
            $this->view("admin/views_admin/v_quan_ly_don_hang", [
                "action"=>$action,
                "singleOrder"=>$modelOrders->get_Single_Order($id),
                "orders"=>$modelOrders->get_All_Orders(),
            ]);
        }


       
    }
?>