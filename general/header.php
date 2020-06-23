<HTML>
<?php $title = 'The Inside Story'; ?>

<head>
    <title><?php echo $title?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css" type="text/css" />
    <link rel="stylesheet" href="css/navbar.css" type="text/css" />
    <link rel="stylesheet" href="css/browse.css" type="text/css" />
    <link rel="stylesheet" href="css/books.css" type="text/css" />
    <link rel="stylesheet" href="css/forms.css" type="text/css" />
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/jquery.slick/1.3.7/slick.css" type="text/css" />
</head>

<header>
    <nav class="navbar">
        <div class="logo-and-title">
            <div class="img-cropper"><img class="logo" src="img/hand-to-hand.jpg"></div>
            <H3 class="nav-title"><a href="index.php"><?php echo $title?></a></H3>
        </div>
        <?php include "menu.php"; ?>
    </nav>
</header>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

<body>