<?php
    $conn = "";
    
    try {
        $servername = "localhost";
        $dbname = "furniture shop data";
        $username = "HK222LTWUser";
        $password = "123456";
    
        $conn = new PDO(
            "mysql:host=$servername; dbname=$dbname",
            $username, $password
        );
        
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
    } catch(PDOException $e) {
        echo "Connection failed: "
            . $e->getMessage();
    }
 
?>