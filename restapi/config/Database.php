<?php

 class Database {

    private $host = "localhost";
    private $dbname = "myblog";
    private $username = "root";
    private $password = "";
    private $conn;

    function DBConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Error in Connetion:".$e->getMessage();
        }

        return $this->conn;
    }

 }
 
?>