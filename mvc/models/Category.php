<?php 

    class Category extends DBConnection{
        protected $con;

        public function __construct()
        {
            
        }

        public function insert_Category($cate_name, $desc, $filename) {
            try {
                $con = $this->GetDB();
                $query = "INSERT INTO category(category_id, cate_name, description, image)
                         VALUES (null, :catename, :catedesc, :cateimage)";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":catename", $cate_name);
                $stmt->bindParam(":catedesc", $desc);
                $stmt->bindParam(":cateimage", $filename);
                $result = $stmt->execute();

                $con = null;
                return $result;
            } catch(PDOException $e) {
                return 0;
            }
        }

        public function update_Category($cate_id, $cate_name, $desc, $filename) {
            try {
                $con = $this->GetDB();
                $query = "UPDATE category SET cate_name=:catename, description=:catedesc, image=:cateimage
                         WHERE category_id=:cateid";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":cateid", $cate_id);
                $stmt->bindParam(":catename", $cate_name);
                $stmt->bindParam(":catedesc", $desc);
                $stmt->bindParam(":cateimage", $filename);
                $result = $stmt->execute();

                $con = null;
                return $result;
            } catch(PDOException $e) {
                return 0;
            }
        }

        public function delete_Category($cate_id) {
            try {
                $con = $this->GetDB();
                $query = "DELETE FROM category WHERE category_id=:cateid";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":cateid", $cate_id);
                $result = $stmt->execute();

                $con = null;
                return $result;
            } catch(PDOException $e) {
                return 0;
            }
        }

        public function get_Single_Cate($cate_id) {
            try {
                $con = $this->GetDB();
                $query = "SELECT * FROM category WHERE category_id=:cateid";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":cateid", $cate_id);
                $stmt->execute();

                $result = $stmt->fetch();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
        }

        public function get_All_Category() {
            try {
                $con = $this->GetDB();
                $query = "SELECT * FROM category";
                $stmt = $con->prepare($query);
                $stmt->execute();

                $result = $stmt->fetchAll();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
        }

        public function get_Category_by_Product_Id($product_id) {
            try {
                $con = $this->GetDB();
                $query = "SELECT * FROM product_with_cate WHERE product_id=:product_id";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":product_id", $product_id);
                $stmt->execute();

                $result = $stmt->fetchAll();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
        }


        public function getCategoryId($product_id) {
            try {
                $con = $this->GetDB();
                $query = "SELECT DISTINCT * FROM product_with_cate WHERE product_id=:product_id";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":product_id", $product_id);
                $stmt->execute();

                $result = $stmt->fetch();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
        }


        public function getSingleCateById($cate_id) {
            try {
                $con = $this->GetDB();
                $query = "SELECT * FROM category WHERE category_id=:category_id";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":category_id", $cate_id);
                $stmt->execute();

                $result = $stmt->fetch();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
        }


        public function getAllCategoryByProductId($product_id) {
            try {
                $con = $this->GetDB();
                $query = "SELECT * FROM product_with_cate pwc, category c 
                        WHERE pwc.category_id = c.category_id
                         AND product_id=:product_id";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":product_id", $product_id);
                $stmt->execute();

                $result = $stmt->fetchAll();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
        }


    }


?>