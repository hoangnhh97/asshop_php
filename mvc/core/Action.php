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
                return;
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





        //Products Management
         public function CreateNewProduct() {
            $name = Common::getPOST("txtName");
            $desc = Common::getPOST("txtDesc");

            $short_desc = Common::getPOST("txtShortDesc");
            $price = Common::getPOST("txtPrice");
            $new_price = Common::getPOST("txtNewPrice");
            $brand = Common::getPOST("txtBrand");
            $model = Common::getPOST("txtModel");
            $type = Common::getPOST("ddlType");
            $status = Common::getPOST("ddlStatus");
            $fileName = "";

            

            if(empty($name) || empty($price) || empty($type)) {
                $this->setAlert("Thêm thất bại. Vui lòng nhập đầy đủ thông tin!", "error");
                return;
            }

            if(empty($status)) {
                $status = "1";
            }

            //Upload image
            if(!empty($_FILES["fUpload"]["name"])) {
                $date = new DateTime();
                $timeStamp =  $date->getTimestamp();
                $fName = strtolower(pathinfo($_FILES["fUpload"]["name"],PATHINFO_FILENAME));
                $imageFileType = strtolower(pathinfo($_FILES["fUpload"]["name"],PATHINFO_EXTENSION));
                $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/asshop/assets/images/products/";
                $target_file = $target_dir . $fName . '_' . $timeStamp . '.' . $imageFileType;
                $uploadOk = 1;
                
                
                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["fUpload"]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    $this->setAlert("File không phải là hình ảnh!", "error");
                    $uploadOk = 0;
                }
                


                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    $this->setAlert("Chỉ chấp nhận các định dạng ảnh JPG, JPEG, PNG & GIF!", "error");
                    $uploadOk = 0;
                }


                if ($uploadOk == 0) {
                    return;
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fUpload"]["tmp_name"], $target_file)) {
                        
                        $fileName = $fName . '_' . $timeStamp . '.' . $imageFileType;
                    } else {
                        $this->setAlert("Đã xảy ra lỗi khi upload file. Vui lòng thử lại!", "error");
                        return;
                    }
                }
            } else {
                $fileName = "";
            }
            
            $product = new Products();
            $result = $product->insert_Product($name, $desc, $short_desc, $price, $new_price, $brand, $model, $fileName, $type, $status);
            
            //Add Categories
            $categories = explode(",", $_POST["arrCategories"]);
            $checkAddCate = true;
            for($i =0; $i < count($categories); $i++) {
                $cate = new Products();
                $resultCate = $cate->insert_Category_to_Product($result, $categories[$i]);
                if($resultCate == false) {
                    $checkAddCate = false;
                }
                
            }
            if(!$checkAddCate) {
                $this->setAlert("Vui lòng chọn danh mục cho sản phẩm!", "error");
                return;
            }

            if($result != 0) {
                $this->setAlert("Thêm mới thành công!", "success");
            } else {
                $this->setAlert("Thêm mới thất bại. Vui lòng kiểm tra lại thông tin!", "error");
            }
        }



        public function EditProduct($product_id) {
            $name = Common::getPOST("txtName");
            $desc = Common::getPOST("txtDesc");

            $short_desc = Common::getPOST("txtShortDesc");
            $price = Common::getPOST("txtPrice");
            $new_price = Common::getPOST("txtNewPrice");
            $brand = Common::getPOST("txtBrand");
            $model = Common::getPOST("txtModel");
            $type = Common::getPOST("ddlType");
            $status = Common::getPOST("ddlStatus");
            $fileName = "";

            

            if(empty($name) || empty($price) || empty($type)) {
                $this->setAlert("Thêm thất bại. Vui lòng nhập đầy đủ thông tin!", "error");
                return;
            }

            if(empty($status)) {
                $status = "1";
            }
            //Upload image
            if(!empty($_FILES["fUpload"]["name"])) {
                $date = new DateTime();
                $timeStamp =  $date->getTimestamp();
                $fName = strtolower(pathinfo($_FILES["fUpload"]["name"],PATHINFO_FILENAME));
                $imageFileType = strtolower(pathinfo($_FILES["fUpload"]["name"],PATHINFO_EXTENSION));
                $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/asshop/assets/images/products/";
                $target_file = $target_dir . $fName . '_' . $timeStamp . '.' . $imageFileType;
                $uploadOk = 1;
                
                
                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["fUpload"]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    $this->setAlert("File không phải là hình ảnh!", "error");
                    $uploadOk = 0;
                }
                


                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    $this->setAlert("Chỉ chấp nhận các định dạng ảnh JPG, JPEG, PNG & GIF!", "error");
                    $uploadOk = 0;
                }


                if ($uploadOk == 0) {
                    return;
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fUpload"]["tmp_name"], $target_file)) {
                        
                        $fileName = $fName . '_' . $timeStamp . '.' . $imageFileType;
                    } else {
                        $this->setAlert("Đã xảy ra lỗi khi upload file. Vui lòng thử lại!", "error");
                        return;
                    }
                }
            } else {
                $fileName = Common::getPOST("hdImage");
            }
            
            $product = new Products();
            $result = $product->update_Product($product_id, $name, $desc, $short_desc, $price, $new_price, $brand, $model, $fileName, $type, $status);
            
            //Add Categories
            $categories = explode(",", $_POST["arrCategories"]);
            $product_by_id = $product->get_Product_By_Id_Without_UNIQUE($product_id);
            
            $checkAddCate = true;
            
            foreach($product_by_id as $values) {
                $same = false;
                for($i = 0; $i < count($categories); $i++) {
                    if($values["category_id"] == $categories[$i]) {
                        $same = true;
                        break;
                    } 
                    $index = $i;
                }
                if($same==false) {
                    $delCate = new Products();
                    $delCate->delete_Cate_of_Product_by_Cateid($product_id, $values["category_id"]);
                }

            }
            


            for($i = 0; $i < count($categories); $i++) {
                $same = false;
                foreach($product_by_id as $values) {
                    if($values["category_id"] == $categories[$i]) {
                        $same = true;
                        break;
                    } 

                }

                if($same==false) {
                    $cate = new Products();
                    $resultCate = $cate->insert_Category_to_Product($product_id, $categories[$i]);
                    if($resultCate == false) {
                        $checkAddCate = false;
                    }
                }
            }

            if(!$checkAddCate) {
                $this->setAlert("Vui lòng chọn danh mục cho sản phẩm!", "error");
                return;
            }

            if($result != 0) {
                $this->setAlert("Cập nhật thành công!", "success");
            } else {
                $this->setAlert("Cập nhật thất bại. Vui lòng kiểm tra lại thông tin!", "error");
            }
        }

        public function DeleteProduct($product_id) {
            if(empty($product_id)) {
                $this->setAlert("Xóa bại. Vui lòng nhập đầy đủ thông tin!", "error");
            }

            $product = new Products();
            $product->delete_all_cate_of_product($product_id);
            $result = $product->delete_Product($product_id);

            if($result) {
                $this->setAlert("Xóa thành công!", "success");
            } else {
                $this->setAlert("Xóa thất bại. Vui lòng kiểm tra lại thông tin!", "error");
            }
        }



        //Categories Management
        public function CreateNewCategory() {
            $cate_name = Common::getPOST("txtCateName");
            $desc_name = Common::getPOST("txtDesc");

            if(empty($cate_name) || empty($desc_name)) {
                $this->setAlert("Thêm thất bại. Vui lòng nhập đầy đủ thông tin!", "error");
                return;
            }
            if(!empty($_FILES["fUpload"]["name"])) {
                $date = new DateTime();
                $timeStamp =  $date->getTimestamp();
                $fName = strtolower(pathinfo($_FILES["fUpload"]["name"],PATHINFO_FILENAME));
                $imageFileType = strtolower(pathinfo($_FILES["fUpload"]["name"],PATHINFO_EXTENSION));
                $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/asshop/assets/images/";
                $target_file = $target_dir . $fName . '_' . $timeStamp . '.' . $imageFileType;
                $uploadOk = 1;
                
                
                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["fUpload"]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    $this->setAlert("File không phải là hình ảnh!", "error");
                    $uploadOk = 0;
                }
                


                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                    $this->setAlert("Chỉ chấp nhận các định dạng ảnh JPG, JPEG, PNG & GIF!", "error");
                    $uploadOk = 0;
                }


                if ($uploadOk == 0) {
                    return;
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fUpload"]["tmp_name"], $target_file)) {
                        
                        $fileName = $fName . '_' . $timeStamp . '.' . $imageFileType;
                    } else {
                        $this->setAlert("Đã xảy ra lỗi khi upload file. Vui lòng thử lại!", "error");
                        return;
                    }
                }
            } else {
                $fileName = "";
            }


            $cate = new Category();
            $result = $cate->insert_Category($cate_name, $desc_name, $fileName);
            if($result) {
                $this->setAlert("Thêm mới thành công!", "success");
            } else {
                $this->setAlert("Thêm mới thất bại. Vui lòng kiểm tra lại thông tin!", "error");
            }
        }



        public function EditCategory($id) {
            $cate_name = Common::getPOST("txtCateName");
            $desc_name = Common::getPOST("txtDesc");

            if(empty($cate_name) || empty($desc_name)) {
                $this->setAlert("Cập nhật thất bại. Vui lòng nhập đầy đủ thông tin!", "error");
                return;
            }
            if(!empty($_FILES["fUpload"]["name"])) {
                $date = new DateTime();
                $timeStamp =  $date->getTimestamp();
                $fName = strtolower(pathinfo($_FILES["fUpload"]["name"],PATHINFO_FILENAME));
                $imageFileType = strtolower(pathinfo($_FILES["fUpload"]["name"],PATHINFO_EXTENSION));
                $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/asshop/assets/images/";
                $target_file = $target_dir . $fName . '_' . $timeStamp . '.' . $imageFileType;
                $uploadOk = 1;
                
                
                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["fUpload"]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    $this->setAlert("File không phải là hình ảnh!", "error");
                    $uploadOk = 0;
                }
                


                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                    $this->setAlert("Chỉ chấp nhận các định dạng ảnh JPG, JPEG, PNG & GIF!", "error");
                    $uploadOk = 0;
                }


                if ($uploadOk == 0) {
                    return;
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fUpload"]["tmp_name"], $target_file)) {
                        
                        $fileName = $fName . '_' . $timeStamp . '.' . $imageFileType;
                    } else {
                        $this->setAlert("Đã xảy ra lỗi khi upload file. Vui lòng thử lại!", "error");
                        return;
                    }
                }
            } else {
                $fileName = "";
            }


            $cate = new Category();
            $result = $cate->update_Category($id, $cate_name, $desc_name, $fileName);
            if($result) {
                $this->setAlert("Cập nhật thành công!", "success");
            } else {
                $this->setAlert("Cập nhật thất bại. Vui lòng kiểm tra lại thông tin!", "error");
            }
        }

        public function DeleteCategory($category_id) {
            if(empty($category_id)) {
                $this->setAlert("Xóa bại. Vui lòng nhập đầy đủ thông tin!", "error");
            }

            $cate = new Category();
            $result = $cate->delete_Category($category_id);
            if($result) {
                $this->setAlert("Xóa thành công!", "success");
            } else {
                $this->setAlert("Xóa thất bại. Vui lòng kiểm tra lại thông tin!", "error");
            }
        }




         //Roles Management
         public function CreateNewRole() {
            $role_name = Common::getPOST("txtName");
            $role_desc = Common::getPOST("txtDesc");
            if(empty($role_name) || empty($role_desc)) {
                $this->setAlert("Thêm thất bại. Vui lòng nhập đầy đủ thông tin!", "error");
                return;
            }
           

            $role = new Roles();
            $result = $role->insert_Role($role_name, $role_desc);
            
            if($result) {
                $this->setAlert("Thêm mới thành công!", "success");
            } else {
                $this->setAlert("Thêm mới thất bại. Vui lòng kiểm tra lại thông tin!", "error");
            }
        }



        public function EditRole($role_id) {
            $role_name = Common::getPOST("txtName");
            $role_desc = Common::getPOST("txtDesc");

            if(empty($role_name) || empty($role_desc)) {
                $this->setAlert("Thêm thất bại. Vui lòng nhập đầy đủ thông tin!", "error");
                return;
            }

            $role = new Roles();
            $result = $role->update_Role($role_id, $role_name, $role_desc);
            if($result) {
                $this->setAlert("Cập nhật thành công!", "success");
            } else {
                $this->setAlert("Cập nhật thất bại. Vui lòng kiểm tra lại thông tin!", "error");
            }
        }

        public function DeleteRole($role_id) {
            if(empty($role_id)) {
                $this->setAlert("Xóa bại. Vui lòng nhập đầy đủ thông tin!", "error");
            }

            $roles = new Roles();
            $result = $roles->delete_Role($role_id);
            if($result) {
                $this->setAlert("Xóa thành công!", "success");
            } else {
                $this->setAlert("Xóa thất bại. Vui lòng kiểm tra lại thông tin!", "error");
            }
        }




        
         //Order Management
         public function CreateNewOrder() {
            $name = Common::getPOST("txtName");
            $email = Common::getPOST("txtEmail");
            $phone = Common::getPOST("txtPhone");
            $address = Common::getPOST("txtAddress");
            $shipping_date = Common::getPOST("txtShippingDate");
            $status = Common::getPOST("ddlStatus");
            $payment = Common::getPOST("ddlPaymentMethod");
            $notes = Common::getPOST("txtNotes");
            $user_id = "";
            if(isset($_SESSION["userid"])) {
                $user_id = $_SESSION["userid"];
            }
            if(empty($name) || empty($email) || empty($phone)) {
                $this->setAlert("Thêm thất bại. Vui lòng nhập đầy đủ thông tin!", "error");
                return;
            }
           

            $orders = new Orders();
            $result = $orders->insert_Order($user_id, $name, $email, $phone, $address, $notes,
            $shipping_date, $status, $payment);
            
            if($result) {
                $this->setAlert("Thêm mới thành công!", "success");
            } else {
                $this->setAlert("Thêm mới thất bại. Vui lòng kiểm tra lại thông tin!", "error");
            }
        }



        public function EditOrder($order_id) {
            $name = Common::getPOST("txtName");
            $email = Common::getPOST("txtEmail");
            $phone = Common::getPOST("txtPhone");
            $address = Common::getPOST("txtAddress");
            $shipping_date = Common::getPOST("txtShippingDate");
            $status = Common::getPOST("ddlStatus");
            $payment = Common::getPOST("ddlPaymentMethod");
            $notes = Common::getPOST("txtNotes");
            $user_id = "";
            if(isset($_SESSION["userid"])) {
                $user_id = $_SESSION["userid"];
            }
            if(empty($name) || empty($email) || empty($phone)) {
                $this->setAlert("Thêm thất bại. Vui lòng nhập đầy đủ thông tin!", "error");
                return;
            }
           

            $orders = new Orders();
            $result = $orders->update_Order($order_id, $user_id, $name, $email, $phone, $address, $notes,
            $shipping_date, $status, $payment);
            if($result) {
                $this->setAlert("Cập nhật thành công!", "success");
            } else {
                $this->setAlert("Cập nhật thất bại. Vui lòng kiểm tra lại thông tin!", "error");
            }
        }

        public function DeleteOrder($order_id) {
            if(empty($order_id)) {
                $this->setAlert("Xóa bại. Vui lòng nhập đầy đủ thông tin!", "error");
            }

            $orders = new Orders();
            $result = $orders->delete_Order($order_id);
            if($result) {
                $this->setAlert("Xóa thành công!", "success");
            } else {
                $this->setAlert("Xóa thất bại. Vui lòng kiểm tra lại thông tin!", "error");
            }
        }

    }

?>