<!-- 레이아웃 담당 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstarp Css only -->
    <!-- cdn = 전적 , 캐쉬 데이터 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>회의실 예약 시스템</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js">
    
</script>
</head>
<body>
    <!-- 상단 네비게이션 바밤바 -->
    <?php include 'views/components/Navbar.php';?>
    <!-- 컨텐츠 -->
<div class="container">
    <?php
        include $currentPage;
    ?>
</div>

</body>

</html>