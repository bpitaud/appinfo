<?php 
function connect (){
$servername = "localhost";
$user = "root";
$password = "root";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=APP2",$user,$password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully"; 
        return $conn;
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    return "problème";
}
?>