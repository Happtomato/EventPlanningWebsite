<?php

class dbcontroller
{
    private $host = "sql312.epizy.com"; 
    private $user = "epiz_31355529";
    private $password = "SNPTvMpdRl";
    private $database = "epiz_31355529_";
    private $conn;

    function connectDB() {
        $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        return $conn;
    }

    function runStatementReturn($query){
        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if (!empty($resultset))
            return $resultset;
        }
   
    function runStatementNoReturn($query){
        connectDB()->query($query);
    }
}
?>