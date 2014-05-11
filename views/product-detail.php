<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Boekenshop</title>
    <meta name="description" content="Op ReadSomeBooks kunnen de nieuwste boeken besteld worden."/>
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="../css/normalize.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />
    <script src="//localhost:35729/livereload.js"></script>
</head>
<body>
    <div id="container" class="webshop">
        <div id="kolom-1">
            <div id="header">
                <?php
                    include('partials/header.php');
                ?>
                <div class="clearfix"></div>
            </div>
            <div id="content">
                <button class="btn-terug">Terug</button>
                <div id="detail-product">
                    <div class="sub-kolom-1">
                        <img src="../img/covers_large/wall_street.large.jpg" alt="" />
                    </div>
                    <div class="sub-kolom-2">
                        <h2>Wall Street</h2>
                        <h3>Steve Fraser</h3>
                        <div class="product-info clearfix">
                            <p>
                                Steve Fraser's epic book is a passionate, critical history of
                                the most powerful financial district in the world. It can also
                                be read as the story of capitalism in America, and of the great
                                turning points in American history, but it is much more than a
                                narrative of politics and economics.
                            </p>
                            <span class="op-voorraad">
                                Op voorraad: <span>Ja</span>
                            </span>
                            <div class="clearfix"></div>
                        </div>
                        <div class="detail-product-footer">
                            <button class="bestelling">Toevoegen aan winkelwagen</button>
                            <input class="bestelling" id="aantal" name="aantal" size="3" type="text" />
                            <label class="bestelling" for="aantal">Aantal: </label>
                            <span class="prijs">&euro; 15,00</span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="row product-panel">
                    <div class="gerelateerd-product">
                        <img src="../img/covers_small/in_the_land_of_no_right_angles_thumbnail.jpg" alt="" />
                        <span class="naam">In the Land of No Right Angles</span>
                        <span class="prijs-klein">&euro; 15,00</span>
                        <button>In winkelwagen</button>
                    </div>
                    <div class="gerelateerd-product">
                        <img src="../img/covers_small/send_me.thumbnail.jpg" alt="" />
                        <span class="naam">Send Me</span>
                        <span class="prijs-klein">&euro; 15,00</span>
                        <button>In winkelwagen</button>
                    </div>
                    <div class="gerelateerd-product">
                        <img src="../img/covers_small/wake_up_sir_thumbnail.jpg" alt="" />
                        <span class="naam">Wake Up, Sir!</span>
                        <span class="prijs-klein">&euro; 15,00</span>
                        <button>In winkelwagen</button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
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
</body>
</html>
