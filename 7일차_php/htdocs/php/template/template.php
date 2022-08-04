<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php page_title(); ?> | <?php site_name(); ?></title>
    <link href="<?php site_url(); ?>/template/style.css" rel="stylesheet" type="text/css" /> 
    <link href="<?php site_url(); ?>/template/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> 
</head>
<body>
    <?php include('components/Navbar.php') ?>
    <div class="wrap">
        <header>
            <h1><?php site_name(); ?></h1>
            <nav class="menu">
                <?php nav_menu(); ?>
            </nav>
        </header>

        <article>
            <h2><?php page_title(); ?></h2>
            <?php page_content(); ?>
        </article>

        <footer>
            <small>&copy;<?php echo date('Y'); ?> <?php site_name(); ?>.<br><?php site_version(); ?></small>
        </footer>

    </div>
    <?php include('components/Footer.php') ?>
</body>
</html>