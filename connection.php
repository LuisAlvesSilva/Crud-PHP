<?php
    class Crud{
        private static $srv = "localhost";
        private static $connectionInfo = array("Database"=>"CRUD", "UID"=>"sa", "PWD"=>"databit@2024");

        private static function connect(){
            $conn = sqlsrv_connect(self::$srv,self::$connectionInfo);
            if ($conn === false) {
                die(print_r(sqlsrv_errors(), true));
            }
            return $conn;
        }

        public static function getConnection() {
            return self::connect();
        }
    }
?>