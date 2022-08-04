<?php

// $DB_HOST='localhost';
try{
    $DB_HOST='127.0.0.1';
    $DB_PORT='3306';
    $DB_NAME ="conference";
    $DB_USERNAME="root";
    $DB_PASSWORD="";
    $DB_DSN = "mysql:host={$DB_HOST};port={$DB_PORT};dbname={$DB_NAME}";
    $db = new PDO($DB_DSN ,$DB_USERNAME ,$DB_PASSWORD);

    $query = "SELECT * FROM user";
    $stmt = $db->prepare($query);
    $stmt->execute();
    // prepare - 검색 , 검사  || excute -실행
    
    $result = $stmt->fetchAll(PDO::FETCH_NUM);
    // fetchAll -배열형태의 리스트 변환
    $userCount =  count($result);
    echo "<h1>user count : {$userCount}</h1>";


}catch(PDOException $pdo_error){
    echo $pdo_error->getMessage();
    // echo "DB접속을 목했습니다";
}


// Comment these lines to hide errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'includes/config.php';
include 'includes/functions.php';


init();
?>