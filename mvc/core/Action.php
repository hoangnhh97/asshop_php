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
            if(isset($_FILES["fUpload"])) {
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
            
            for($j = 0; $j < count($categories); $j++) {
                $product = new Products();
                $product_by_pro_and_cate = $product->get_Product_By_PrId_And_CateId_Without_UNIQUE($product, $categories[$j]);
                foreach($product_by_pro_and_cate as $values) {
                    if($values["category_id"] == $categories[$j]) {
                        
                    } 

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
                    $resultCate = $cate->insert_Category_to_Product($result, $categories[$i]);
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

        public function DeleteProduct($id) {
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