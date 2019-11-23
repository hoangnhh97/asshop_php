

<?php 
    class DBConnection {
        public static $db = NULL;
        private static $servername = "localhost";
        private static $dbname = "asshop";
        private static $username = "root";
        private static $password = "";

        public function __constructor() { }

        public static function GetDB() {
            if(!isset(self::$db)) {
                try {
                    $strCon = "mysql:host=".self::$servername.";dbname=".self::$dbname.";charset=utf8";
                    self::$db = new PDO($strCon, self::$username, self::$password);
                } catch(PDOException $e) {
                    echo $e->getMessage();
                }
            }
            return self::$db;
        }

        public static function GetDBSQLi() {
            if(!isset(self::$db)) {
                self::$db = mysqli_connect(self::$servername, self::$username, self::$password, self::$dbname);
                
                if(!self::$db) 
                    die("Connection failed: " . self::$db->connect_error);
            }
            return self::$mDb;
        }
    }
?>