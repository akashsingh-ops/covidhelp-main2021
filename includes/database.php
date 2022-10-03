<?php
require('dbconfig.php');
class Database
{
    private $connection;
    public function __construct()
    {
        $this->open_db_connection();
    }
    public function open_db_connection()
    {
        try {
            $this->connection = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASS);
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
    }
    public function query($query,$arr=[])
    {
        if(empty($arr))
        {
            $result=$this->connection->query($query);
            return $result;
        }
        else
        {
            $stmt=$this->connection->prepare($query);
            $result=$stmt->execute($arr);
            if(!$result)
            {
                echo "Query failed";
            }
            return $stmt;
            
        }
        
    }
}
$database=new Database();