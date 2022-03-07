<?php
    Class Db{
        protected static $connection;
        public function connect(){
            if (!isset(self::$connection)){
                $config=parse_ini_file("config.ini");
                self::$connection=new mysqli("localhost", $config["username"], $config["password"],$config["databasename"]);
            }
            if (!isset(self::$connection)){
                return false;
            }
            return self::$connection;
        }
        public function query_execute($queryString){
            $connection=$this->connect();
            $result=$connection->query($queryString);
            $connection->close();
            return $result;
        }
        public function select_to_array($queryString){
            $row=array();
            $result=$this->query_execute($queryString);
            if ($result==false) return false;
            while($item=$result->fetch_assoc()){
                $row[]=$item;
            }
            return $row;
        }
    }
?>