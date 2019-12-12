<?php 

    class Tags extends DBConnection{
        protected $con;

        public function __construct()
        {
            
        }

        public function get_All_Tags() {
            try {
                $con = $this->GetDB();
                $query = "SELECT * FROM tags";
                $stmt = $con->prepare($query);
                $stmt->execute();

                $result = $stmt->fetchAll();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
        }



        public function insert_Tag($product_id, $tag_name) {
            try {
                $con = $this->GetDB();
                $query = "INSERT INTO tags(tag_id, product_id, tag_name) VALUES (null, :productid, :tagname)";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":productid", $role_name);
                $stmt->bindParam(":tagname", $role_desc);
                $result = $stmt->execute();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return 0;
            }
        }

       
        public function update_Tag($tag_id, $product_id, $tag_name) {
            try {
                $con = $this->GetDB();
                $query = "UPDATE tags SET product_id=:productid, tag_name=:tagname
                         WHERE tag_id=:tagid";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":tagname", $tag_name);
                $stmt->bindParam(":productid", $product_id);
                $stmt->bindParam(":tagid", $tag_id);
                $result = $stmt->execute();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return 0;
            }
        }


        
        public function delete_Tag($tag_id) {
            try {
                $con = $this->GetDB();
                $query = "DELETE FROM tags WHERE tag_id=:tagid";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":tagid", $tag_id);
                $result = $stmt->execute();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return 0;
            }
        }




        public function getAllTagByProductId($product_id) {
            try {
                $con = $this->GetDB();
                $query = "SELECT * FROM tags t WHERE product_id=:product_id";
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


        public function getSingleTag($tag_id) {
            try {
                $con = $this->GetDB();
                $query = "SELECT * FROM tags WHERE tag_id=:tagid";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":tagid", $tag_id);
                $stmt->execute();

                $result = $stmt->fetch();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
        }

        

    }


?>