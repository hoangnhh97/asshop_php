<?php 

    class Products extends DBConnection {
        protected $con;
        public function __construct()
        {
            
        }

        public function insert_Category_to_Product($product_id, $cate_id) {
            try {
                $con = $this->GetDB();
                $query = "INSERT INTO product_with_cate(productwithcateid, product_id, category_id)
                        VALUES (null, :productid, :cateid)";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":productid", $product_id);
                $stmt->bindParam(":cateid", $cate_id);
                $result = $stmt->execute();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return 0;
            }
        }

        public function get_All_Products() {
            try {
                $con = $this->GetDB();
                $query = "SELECT * FROM products";
                $stmt = $con->prepare($query);
                $stmt->execute();
                $result = $stmt->fetchAll();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
        }

        public function insert_Product($name, $desc, $short_desc, $price, $new_price, $brand, $model, $image, $type, $status) {
            try {
                $con = $this->GetDB();
                $query = "INSERT INTO products
                        VALUES (null, :productname, :productdesc, :shortdesc, :price, 
                        :newprice, :brand, :model, :productimage, :producttype,
                        :createdat, :productstatus)";
                $stmt = $con->prepare($query);
                
                $createdat = date("Y-d-m", time());
                $stmt->bindParam(":productname", $name);
                $stmt->bindParam(":productdesc", $desc);
                $stmt->bindParam(":shortdesc", $short_desc);
                $stmt->bindParam(":price", $price);
                $stmt->bindParam(":newprice", $new_price);
                $stmt->bindParam(":brand", $brand);
                $stmt->bindParam(":model", $model);
                $stmt->bindParam(":productimage", $image);
                $stmt->bindParam(":producttype", $type);
                $stmt->bindParam(":createdat", $createdat);
                $stmt->bindParam(":productstatus", $status);
                
                $result = $stmt->execute();
                $product_id = 0;
                if($result == true) {
                    $product_id = $con->lastInsertId();
                }
                $con = null;
                return $product_id;
            } catch(PDOException $e) {
                return 0;
            }
        }


        public function update_Product($product_id, $name, $desc, $short_desc, $price, $new_price, $brand, $model, $image, $type, 
                                        $status) {
            try {
                $con = $this->GetDB();
                $query = "UPDATE products
                        SET name=:productname, description=:productdesc, short_desc=:shortdesc, price=:price, 
                        new_price=:newprice, brand=:brand, model=:model, image=:productimage, type=:producttype,
                        status=:productstatus
                        WHERE product_id=:productid";
                $stmt = $con->prepare($query);
                
                $stmt->bindParam(":productid", $product_id);
                $stmt->bindParam(":productname", $name);
                $stmt->bindParam(":productdesc", $desc);
                $stmt->bindParam(":shortdesc", $short_desc);
                $stmt->bindParam(":price", $price);
                $stmt->bindParam(":newprice", $new_price);
                $stmt->bindParam(":brand", $brand);
                $stmt->bindParam(":model", $model);
                $stmt->bindParam(":productimage", $image);
                $stmt->bindParam(":producttype", $type);
                $stmt->bindParam(":productstatus", $status);
                
                
                $result = $stmt->execute();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return $e;
            }
        }

        public function delete_Product($product_id) {
            try {
                $con = $this->GetDB();
                $query = "DELETE FROM products WHERE product_id=:productid";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":productid", $product_id);
                $result = $stmt->execute();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return $e;
            }
        }


        public function delete_all_cate_of_product($product_id) {
            try {
                $con = $this->GetDB();
                $query = "DELETE FROM product_with_cate WHERE product_id=:productid";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":productid", $product_id);
                $result = $stmt->execute();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return 0;
            }
        }

        public function delete_Cate_of_Product_by_Cateid($product_id, $cate_id) {
            try {
                $con = $this->GetDB();
                $query = "DELETE FROM product_with_cate WHERE product_id=:productid  AND category_id=:cateid";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":productid", $product_id);
                $stmt->bindParam(":cateid", $cate_id);
                $result = $stmt->execute();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return 0;
            }
        }



        public function get_Product_By_Id_Without_UNIQUE($product_id) {
            try {
                $con = $this->GetDB();
                $query = "SELECT * FROM product_with_cate WHERE
                        product_id = :productid";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":productid", $product_id);
                
                $stmt->execute();

                $result = $stmt->fetchAll();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
        }


        public function getAllProductAoLastest() {
            try {
                $con = $this->GetDBSQLi();
                $query = "SELECT DISTINCT * FROM product_with_cate pwc, category c, products p 
                        WHERE pwc.category_id=c.category_id AND pwc.product_id = p.product_id
                        AND pwc.category_id = 1 ORDER BY p.created_at LIMIT 5";
                $result = mysqli_query($con, $query);
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
        }

        public function getAllProductLastestById($id) {
            try {
                $con = $this->getDB();
                $query = "SELECT DISTINCT * FROM product_with_cate pwc, category c, products p 
                        WHERE pwc.category_id=c.category_id AND pwc.product_id = p.product_id
                        AND pwc.category_id = :cateid ORDER BY p.created_at LIMIT 5";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":cateid", $id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
        }

        //Get Limit 4 products
        public function getAllProductByCate($cate_id) {
            try {
                $con = $this->GetDB();
                $query = "SELECT DISTINCT * FROM product_with_cate pwc, category c, products p 
                        WHERE pwc.category_id=c.category_id AND pwc.product_id = p.product_id
                        AND pwc.category_id =:cateid ORDER BY p.created_at LIMIT 4";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":cateid", $cate_id);
                $stmt->execute();

                $result = $stmt->fetchAll();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
        }

        public function getSingleProduct($product_id) {
            try {
                $con = $this->GetDB();
                $query = "SELECT * FROM products WHERE product_id=:product_id";
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


        public function get_All_Product_By_CateId($cate_id) {
            try {
                $con = $this->GetDB();
                $query = "SELECT DISTINCT * FROM product_with_cate pwc, products p 
                        WHERE pwc.product_id = p.product_id
                        AND pwc.category_id =:cateid GROUP BY p.name ORDER BY p.created_at";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":cateid", $cate_id);
                $stmt->execute();

                $result = $stmt->fetchAll();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
        }



        public function get_All_Product_By_TagId($tag_id) {
            try {
                $con = $this->GetDB();
                $query = "SELECT DISTINCT * FROM tags t, products p 
                        WHERE t.product_id = p.product_id
                        AND t.tag_id=:tagid GROUP BY p.name ORDER BY p.created_at";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":tagid", $tag_id);
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