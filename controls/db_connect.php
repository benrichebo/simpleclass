<?php 
try {
    //connect to the database
$dsn = 'mysql:host=localhost;dbname=simpleclass';

$connection = new PDO($dsn, 'Richard', 'rFSBtpxiM44WL0ja');
    $errorInfo = $connection->errorInfo();
    if(isset($errorInfo[2])){
        $error = $errorInfo[2];
    }
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>