<?php

try{
    $DB_HOST = '127.0.0.1';
    $DB_PORT = '3306';
    $DB_NAME = "conference";
    $DB_USERNAME = "root";
    $DB_PASSWORD = "";
    $DB_DSN = "mysql:host={$DB_HOST};port={$DB_PORT};dbname={$DB_NAME}";

    $db = new PDO($DB_DSN, $DB_USERNAME, $DB_PASSWORD);         //PDO 선생님이 출제

    
}catch(PDOException $pdo_error){
    // echo $pdo_error->getMessage();
    echo "DB 접속을 못했습니다.";
}

?>