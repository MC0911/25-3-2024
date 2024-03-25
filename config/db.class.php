<?php // IDEA;
class Db{
    protected static $connection;
    public function connect (){
        if(!isset(self::$connection)){
            $config = parse_ini_file("config.ini");
            self::$connection = new mysqli("localhost",$config["username"], $config["password"], $config["databasename"]);
        }
        
        if (self::$connection->connect_errno) {
            echo "Failed to connect to MySQL: " . self::$connection->connect_error;
            exit();
        }
        
        return self::$connection;
    }
    public function query_excute($queryString){
        $connection = $this->connect();
        $result = $connection->query($queryString);
        // $connection->close();
        return $result;
    }

    public function select_to_array($queryString){
        $rows = array();
        $result = $this->query_excute($queryString);
        if($result==false) return false;

        while($item = $result->fetch_assoc()){
            $rows[] = $item;
        }
        return $rows;
    }
}

?>
