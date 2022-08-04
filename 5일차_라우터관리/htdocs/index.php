<?php 
$path = explode('/',$_SERVER['REQUEST_URI']);
// echo $path[1];
//예외처리
if($path[1] == ''){
    echo "예외";
}else{
    // 라우터
    // if($path[2] == ''){
    //     echo "홈입니다";
    // }
    // else if ($path[2] == 'board'){
    //     echo "게시판페이지 입니다";
    // }else{
    //     echo "404";
    // }


    switch($path[2]){
        case "": {
            include('views/Home.php');
            break;
        }
        case "board": {
            include('views/board.php');
            break;
        }
        case "Blog": {
            include('views/Blog.php');
            break;
        }
        default: {
           include('views/Notfound.php');
           break;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="/index.php">홈</a>
    <a href="/index.php/board">게시판</a>
    <a href="/index.php/Blog">블로그</a>
    <a href="/index.php/Notfound">404</a>
</body>
</html>