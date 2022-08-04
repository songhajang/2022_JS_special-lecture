<?php
    $DB_HOST = '127.0.0.1';
    $DB_NAME = 'conference';
    $DB_PORT = '3306';
    $DB_USERNAME = 'root';
    $DB_USERWORD = '';
    $DB_LINK = "mysql:host={$DB_HOST};port={$DB_PORT};dbname={$DB_NAME}";


    // mysql_query(); 인제션 공격에 약함
    // mysqli_query();
    // new PDO();

    $db = new PDO($DB_LINK, $DB_USERNAME, $DB_USERWORD);
    // 연결안됬을때의 예외처리
    // $db->setAttribute(PDO::ATTR_EMULATE_PREAPARES, false);
    // $db->setAttribute(PDO::ARRT_ERRMODE, PDO::ERRMODE_EXCEPTION);


    
?>