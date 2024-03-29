<?php 
    class App {

        protected $controller="Home";
        protected $action="Index";
        protected $params=[];
        public function __construct()
        {
            $arr = $this->UrlProcess();
            
            //Controllers
            if(file_exists("./mvc/controllers/".$arr[0]."Controller.php")) {
                $this->controller = $arr[0];
                unset($arr[0]);
                
            }
            require_once("./mvc/controllers/".$this->controller."Controller.php");
            $resultController = $this->controller."Controller";
            $this->controller = new $resultController;


            //Action
            if(isset($arr[1])) {
                if(method_exists($this->controller,$arr[1])) {
                    $this->action = $arr[1];
                }
                unset($arr[1]);
            }

            //Params
            $this->params = $arr?array_values($arr):[];
            
            call_user_func_array([$this->controller, $this->action], $this->params);


        }


        function UrlProcess(){
            if(isset($_GET["url"])) {
                return explode("/", filter_var(trim($_GET["url"],"/")));
            }
        }
    }
?>