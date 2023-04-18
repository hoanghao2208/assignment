<?php
    $conn = "";
    
    try {
        $servername = "localhost";
        $dbname = "furniture_shop_data-3";
        $username = "hoanghao2208";
        $password = "hao0857930604";
    
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