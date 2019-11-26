<?php 
    class Common {
        public function __construct()
        {
            
        }

        public static function checkEmptyStr($data) {
            if(empty($data) || $data == null)
                echo "";
            echo $data;
        }

        public static function checkEmptyImg($img) {
            if(empty($img) || $img == null)
                echo "null";
            echo $img;
        }

        public static function checkEmptyBoolean($data) {
            if(empty($data) || $data == null)
                return false;
            return true;
        }
    }
?>