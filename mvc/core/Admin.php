<?php 
    class Admin {
        

        public function model($model) {
            require_once "./mvc/models/".$model.".php";
            return new $model;
        }

        public function view($view, $data=[]) {
            require_once "./mvc/views/".$view.".php";
        }

        public function setAlert($message, $type) {
            if($type == "success") {
                $type = "alert-success";
            } else if($type == "error"){
                $type = "alert-danger";
            } else if($type == "warning"){
                $type = "alert-warning";
            }


            $_POST["messageAlert"] = '<div id="alert-box" class="alert '.$type.' alert-dismissable" id="flash-msg">
                    <p>'.$message.'</p></div>';   


            return $_POST["messageAlert"];
        }


        

        
    }
?>