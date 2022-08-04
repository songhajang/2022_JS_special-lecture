<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php page_title(); ?> | <?php site_name(); ?></title>
    <link href="<?php site_url(); ?>/template/style.css" rel="stylesheet" type="text/css" /> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <!-- 헤더 영역 -->
    <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/meeting_room">Meeting room</a>
            </li>
        </div>
    </div>
    </nav>
    <!-- 헤더 영역 끝 -->

    <!-- 컨텐츠 영역 -->
    <div class="wrap">
        <article>
            <h2><?php page_title(); ?></h2>
            <?php page_content(); ?>
        </article>
    </div>
    <!-- 컨텐츠 영역 끝 -->

    <!-- 바닥 영역 -->
    <?php include('components/Footer.php') ?>
    <!-- 바닥 영역 끝 -->
</body>
</html>