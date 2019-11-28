<?php
class DBConnection{
    //ket noi void db
    protected $con = NULL;
    protected $coni = NULL;
    public function __construct(){}
    public function getDB(){
        if (!isset($this->con)){
            $this->con = new PDO('mysql:host=localhost;dbname=asshop;charset=utf8','root', '');
        }
        return $this->con;
    }

    public function getDBSQLi()
    {
        if (!isset($this->coni)){
            $this->coni = new mysqli('localhost','root', '', 'asshop');
            $this->coni->set_charset("utf8");
        }
        return $this->coni;
    }
}
?>