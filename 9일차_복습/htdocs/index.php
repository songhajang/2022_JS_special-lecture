<?php 
    include 'config/DBconnection.php';
    include 'config/router.php';
    include 'config/functions.php';

    // 경로 파싱
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    // echo $page;
    // 페이지 모듈 지정
    $currentPage = 'views/home.php';

    switch($page){
        case "home":
            $currentPage =  'views/home.php';
            break;
        case "meeting_room":
            $currentPage = 'views/meeting_room.php';
            break;
        default:
        $currentPage = 'views/notFound.php';
            break;
    }
    // 레이아웃 포함
    include 'views/template.php';
?>

