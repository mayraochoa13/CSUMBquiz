<?php

function getDBConnection() {
    
    // mysql://b56b91f9386172:408becd7@us-cdbr-iron-east-04.cleardb.net/heroku_d6bc2076e946382?reconnect=true
    //C9 db info
    $host = "us-cdbr-iron-east-04.cleardb.net";
    $dbName = "heroku_d6bc2076e946382";
    $username = "b56b91f9386172";
    $password = "408becd7";
    
    //when connecting from Heroku
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = $url["host"];
        $dbName = substr($url["path"], 1);
        $username = $url["user"];
        $password = $url["pass"];
    } 
    
    try {
        //Creates a database connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
    
        // Setting Errorhandling to Exception
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }
    catch (PDOException $e) {
       echo "Problems connecting to database!";
       exit();
    }
    
    
    return $dbConn;
}

?>