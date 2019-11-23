<?php 
    include_once("routes/Routes.php");
    function __autoload($className) {
        if(file_exists("./models/".$className.".php")) {
            require_once("./models/".$className.".php");
        } else if(file_exists("./controllers/".$className.".php")){
            require_once("./controllers/".$className.".php");
        }
    }
?>