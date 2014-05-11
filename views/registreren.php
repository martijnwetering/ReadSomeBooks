<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Boekenshop</title>
    <meta name="description" content="Op ReadSomeBooks kunnen de nieuwste boeken besteld worden."/>
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="../css/normalize.css" rel="stylesheet"/>
    <link href="../css/style.css" rel="stylesheet"/>
    <script src="//localhost:35729/livereload.js"></script>
</head>
<body>
<div id="container">
    <div id="kolom-1">
        <div id="header">
            <?php
                include('partials/header.php');
            ?>
            <div class="clearfix"></div>
        </div>
        <div id="content" class="registreren">
            <h1>Registreren</h1>
            <h4>Vul uw gegevens in</h4>

            <form class="registreer-form">
                <fieldset>
                    <legend>Accountgegevens</legend>
                    <div class="input-groep clear-left">
                        <label for="gebruikersnaam-account">Gebruikersnaam*</label>
                        <input type="text" name="gebruikersnaam-account" id="gebruikersnaam-account"/>
                    </div>
                    <div class="input-groep clear-left">
                        <label for="wachtwoord-account">Wachtwoord*</label>
                        <input type="password" name="wachtwoord-account" id="wachtwoord-account"/>
                    </div>
                    <div class="input-groep clear-left">
                        <label for="herhaal-wachtwoord-account">Herhaal wachtwoord*</label>
                        <input type="text" name="herhaal-wachtwoord-account" id="herhaal-wachtwoord-account"/>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Factuuradres</legend>
                    <div class="input-groep">
                        <label for="aanhef">Aanhef*</label>
                        <select name="aanhef" id="aanhef">
                            <option value="dhr">dhr</option>
                            <option value="mevr">mevr</option>
                        </select>
                    </div>
                    <div class="input-groep">
                        <label for="voornaam">Voornaam*</label>
                        <input type="text" name="voornaam" id="voornaam"/>
                    </div>
                    <div class="input-groep">
                        <label for="tussenvoegsel">Tussenv.</label>
                        <input type="text" name="tussenvoegsel" id="tussenvoegsel"/>
                    </div>

                    <div class="input-groep">
                        <label for="achternaam">Achternaam*</label>
                        <input type="text" name="achternaam" id="achternaam"/>
                    </div>
                    <div class="input-groep clear-left">
                        <label for="email">Emailadres*</label>
                        <input type="email" name="email" id="email"/>
                    </div>
                    <div class="input-groep clear-left">
                        <label for="straatnaam">Straatnaam*</label>
                        <input type="text" name="straatnaam" id="straatnaam"/>
                    </div>
                    <div class="input-groep">
                        <label for="huisnummer">Huisnummer*</label>
                        <input type="number" name="huisnummer" id="huisnummer"/>
                    </div>
                    <div class="input-groep clear-left">
                        <label for="postcode">Postcode*</label>
                        <input type="text" name="postcode" id="postcode"/>
                    </div>
                    <div class="input-groep">
                        <label for="plaatsnaam">Plaatsnaam*</label>
                        <input type="text" name="plaatsnaam" id="plaatsnaam"/>
                    </div>
                    <div class="input-groep clear-left">
                        <label for="telefoon">Telefoon*</label>
                        <input type="number" name="telefoon" id="telefoon"/>
                    </div>
                </fieldset>
                <input type="submit" value="Opslaan">
                <div class="clearfix"></div>
            </form>
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
