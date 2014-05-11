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
            <div id="content" class="over-ons">
                <div class="koptekst">
                    <h1>Over Ons</h1>
                </div>
                <div class="info">
                    <h2>Wie zijn wij</h2>
                    <img src=../img/ReadSomeBooksStore.jpg alt="Read Some Books Store" />
                    <p>
                        Read Some Books is een geweldig leuke nieuwe boekenwinkel in hartje
                        Anrhem. Wij hebben een groot aanbod boeken in allerlei categorie&euml;n.
                        Zo kun je bij ons terecht voor de allerlaatse thrillers, fanatsy, drama
                        en aktie boeken. Ook organiseren wij elke maand een evenement waarbij
                        een bekende auteur aanwezig is. Maar aangezien iedereen tegenwoordig
                        steeds drukker is focussen wij ook veel van onze aandacht op onze
                        webshop. Alle boeken uit de winkel plus nog vele andere zijn te
                        bestellen via onze webshop. Als je op werkdagen <b>voor 09.00 uur</b>
                        besteld dan wordt je bestelling de volgende dag al bezorgd.
                    </p>
                    <div class="clearfix"></div>
                </div>
                <div class="info">
                    <h2 class="content-h2">Routebeschrijving</h2>
                    <div id="map-canvas"></div>
                    <p>
                        Read Some books is gevestigd in hartje Arnhem. Wij zijn geopend op alle
                        werkdagen en zaterdag van 09.00 tot 18.00 uur. Op donderdag zijn wij zelfs
                        geopend tot 21.00 uur. De winkel is gemakkelijk te bereiken met het openbaar
                        vervoer, zo'n 5 minuten lopen vanaf het centraal station in Arnhem. Tevens
                        is er veel pakkeergelegenheid in de binnenstad van Arnhem mocht je met de
                        auto komen.
                    </p>
                    <div class="clearfix"></div>
                </div>
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

    <script>
        function initialize() {
            var mapCanvas = document.getElementById('map-canvas');
            var mapOptions = {
                center: new google.maps.LatLng(51.9826908,5.9064607),
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(mapCanvas, mapOptions);
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</body>
</html>
