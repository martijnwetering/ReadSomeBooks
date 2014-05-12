<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Boekenshop</title>
    <meta name="description" content="Op ReadSomeBooks kunnen de nieuwste boeken besteld worden."/>
    <link rel="stylesheet" href="../css/font-awesome.css"/>
    <link href="../css/normalize.css" rel="stylesheet"/>
    <link href="../css/style.css" rel="stylesheet"/>
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
        <div id="content" class="winkelwagen">
            <button class="verder-winkelen">Verder winkelen</button>
            <h1>Winkelwagen</h1>

            <table class="tabel-1">
                <thead>
                <tr>
                    <th></th>
                    <th>Productnaam</th>
                    <th>Prijs</th>
                    <th>Aantal</th>
                    <th>Subtotaal</th>
                    <th>Verwijderen</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><img src="../img/covers_small/wall_street_thumbnail.jpg" alt="product"/></td>
                    <td>Wall Street</td>
                    <td>&euro; 25,00</td>
                    <td>
                        <select name="aantal">
                            <option value="option1">1</option>
                            <option value="option2">2</option>
                            <option value="option3">3</option>
                            <option value="option4">4</option>
                            <option value="option5">5</option>
                        </select>
                    </td>
                    <td>&euro; 75,00</td>
                    <td><i class="fa fa-times verwijder"></i></td>
                </tr>
                <tr>
                    <td><img src="../img/covers_small/steppenwolf_thumbnail.jpg" alt="product"/></td>
                    <td>Steppenwolf</td>
                    <td>&euro; 80,00</td>
                    <td>
                        <select name="aantal">
                            <option value="option1">1</option>
                            <option value="option2">2</option>
                            <option value="option3">3</option>
                            <option value="option4">4</option>
                            <option value="option5">5</option>
                        </select>
                    </td>
                    <td>&euro; 80,00</td>
                    <td><i class="fa fa-times verwijder"></i></td>
                </tr>
                </tbody>
            </table>

            <table class="tabel-2">
                <tbody>
                <tr>
                    <td>Eindtotaal:</td>
                    <td>&euro; 109,00</td>
                </tr>
                </tbody>
            </table>
            <button class="herbereken">Herbereken bedrag</button>
            <button class="afrekenen">Afrekenen</button>
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
</div>
</body>
</html>
