<?php 
    $hostname=$_SERVER["HTTP_HOST"]; //도메인명(호스트)명을 구합니다.
    $uri= $_SERVER['REQUEST_URI']; //uri를 구합니다.
    $query_string=getenv("QUERY_STRING"); // Get값으로 넘어온 값들을 구합니다.
    $phpself=$_SERVER["PHP_SELF"]; //현재 실행되고 있는 페이지의 url을 구합니다.
    $basename=basename($_SERVER["PHP_SELF"]); //현재 실행되고 있는 페이지명만 구합니다.
 
    // echo "http://$hostname"."<br>";
    // echo$uri."<br>";
    // echo$query_string."<br>";
    // echo$phpself."<br>";
    // echo$basename."<br>";
 
?>