<?php 
    include 'config/DBconnection.php';
    include 'config/router.php';
    include 'config/functions.php';


    $queryString = getenv('QUERY_STRING');
    $path = explode("?",$_SERVER['REQUEST_URI']);
    $resource = explode('/', $path[0]);
    
    // 페이지 모듈 지정
    $currentPage = 'views/home.php';
    // $resource = explode('/', $page);

    switch($path[0]){
        // PAGE
        case "/":
            $currentPage =  'views/home.php';
            break;
        case "/meeting_room":
            $currentPage = 'views/meeting_room.php';
            break;
        case "/meeting_room_detail":
            $currentPage = 'views/meeting_room_detail.php';
            break;
            // API 
        case "/api/building":
            $currentPage =  'controller/building.php';
            break;
        case "/api/meeting_room":
            $currentPage =  'controller/meeting_room.php';
            break;
        case "/api/meeting_room/detail":
            $currentPage =  'controller/meeting_room_detail.php';
            break;
        default:
        $currentPage = 'views/notFound.php';
            break;
    }
    
    if($resource[1] == 'api'){
        include $currentPage;
    }else{
        include 'views/template.php';
    }
?>

