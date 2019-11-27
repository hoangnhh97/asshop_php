<?php 
    class Common {
        public function __construct()
        {
            
        }


        public static function getGET($name) {

            isset($_GET[$name])?$_GET[$name]:null;

            return $_GET[$name];
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

        public static function generateSlug ($string, $space = "-", $dot = null)
        {
            if (function_exists('iconv')) {
                $string = @iconv('UTF-8', 'ASCII//TRANSLIT', $string);
            }
        
            if (! $dot) {
                $string = preg_replace("/[^a-zA-Z0-9 -]/", "", $string);
            } else {
                $string = preg_replace("/[^a-zA-Z0-9 -.]/", "", $string);
            }
        
            $string = trim(preg_replace("/s+/", " ", $string));
            $string = strtolower($string);
            $string = str_replace(" ", $space, $string);
        
            return $string;
        }
    }
?>