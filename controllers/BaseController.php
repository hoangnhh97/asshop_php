<?php 
    class BaseController {
        
        public static function CreateView($viewName) {
            require_once("./views/$viewName.php");
        }

        public static function getMessage($message) {
            $_GET["message"] = $message; 
            
            return $_GET["message"];
        }

        public static function getTypeAlert($type) {
            if($type == "success") {
                $type = "alert-success";
            } else if($type == "error"){
                $type = "alert-danger";
            } else if($type == "warning"){
                $type = "alert-warning";
            }

            $_GET["type"] = $type;

            return $_GET["type"];
        }

    }
?>