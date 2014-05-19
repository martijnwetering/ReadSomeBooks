<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8" />
    <title>Boekenshop</title>
    <meta name="description" content="Op ReadSomeBooks kunnen de nieuwste boeken besteld worden."/>
    <link rel="stylesheet" href="../css/font-awesome.css"/>
    <link href="../css/normalize.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Scripts -->
    <script src="//localhost:35729/livereload.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
</head>
<body>



<div id="container" class="over-ons">
    <div id="kolom-1">
        <div id="header">
            <?php
            include('partials/header.php');
            ?>
            <div class="clearfix"></div>
        </div>

        <?php

        if (isset($_GET['page']))
        {
            require($_GET['page'] . '.php');
        }
        else
        {
            // Ensures navigation highlighting works
            header('Location: shell.php?page=over-ons');
            exit();
        }

        ?>

        <footer>
            <span>&copy; Read Some Books | 2014</span>
        </footer>
    </div>
    <div id="kolom-2">
        <a href="http://www.facebook.com">
            <img class="facebook" src="../img/banners/facebookBanner.jpg" alt="facebook"/>
        </a>
        <a href="http://www.twitter.com">
            <img class="twitter" src="../img/banners/twitterBanner.jpg" alt="twitter"/>
        </a>
    </div>
    <div class="clearfix"></div>
</div>

<script type="text/javascript" src="../scripts/jquery.js"></script>
<script type="text/javascript" src="../scripts/navigationHighlight.js"></script>

</body>
</html>
