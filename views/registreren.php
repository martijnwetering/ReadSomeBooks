<?php
require '../classes/User.php';
require '../connect/Database.php';

    $registratie_verstuurd = (isset($_POST['registratie_verstuurd']));

    $errors = array();

    if ($registratie_verstuurd)
    {
        if (empty($_POST['gebruikersnaam']) || empty($_POST['wachtwoord']) || empty($_POST['wachtwoord_herhaal']) || empty($_POST['aanhef'])
            || empty($_POST['voornaam']) || empty($_POST['achternaam']) || empty($_POST['email']) || empty($_POST['straatnaam'])
            || empty($_POST['huisnummer']) || empty($_POST['huisnummer']) || empty($_POST['postcode']) || empty($_POST['woonplaats'] ) || empty($_POST['$telefoon']))
        {
            $errors[] = 'Alle velden zijn verplicht';
        }
        else {
            if ($wachtwoord !== $wachtwoord_herhaal)
            {
                $errors = 'Wachtwoorden zijn niet gelijk';
            }
        }

        if (empty($errors) === true)
        {
            $user = new User($_POST);
            $user->registreer($db);

            header('Location: registreren.php?succes');
            exit();
        }
    }

//        $db = new mysqli('localhost', 'root', '', 'readsomebooks');
//        if(mysqli_connect_errno())
//        {
//            trigger_error('Fout bij verbinding: '.$db->error);
//        }
//
//        $sql = "insert into users (gebruikersnaam, wachtwoord, aanhef, voornaam,
//        achternaam, email, straatnaam, huisnummer, postcode, woonplaats, telefoon, tussenvoegsel)
//            values ('$gebruikersnaam', '$wachtwoord', '$aanhef', '$voornaam', '$achternaam', '$email',
//                '$straatnaam', '$huisnummer', '$postcode', '$woonplaats', '$telefoon', '$tussenvoegsel')";
//
//        $db->query($sql);
//        $db->close();
?>

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
<div id="container">
    <div id="kolom-1">
        <div id="header">
            <?php
                include('partials/header.php');
            ?>
            <div class="clearfix"></div>
        </div>
        <?php
            if (!isset($_GET['succes']))
            {
        ?>
        <div id="content" class="registreren">
            <h1>Registreren</h1>
            <h4>Vul uw gegevens in</h4>

            <form class="registreer-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <fieldset>
                    <legend>Accountgegevens</legend>
                    <div class="input-groep clear-left">
                        <label for="gebruikersnaam">Gebruikersnaam*</label>
                        <input type="text" name="gebruikersnaam" id="gebruikersnaam"/>
                    </div>
                    <div class="input-groep clear-left">
                        <label for="wachtwoord">Wachtwoord*</label>
                        <input type="password" name="wachtwoord" id="wachtwoord"/>
                    </div>
                    <div class="input-groep clear-left">
                        <label for="herhaal_wachtwoord-account">Herhaal wachtwoord*</label>
                        <input type="password" name="herhaal_wachtwoord" id="herhaal_wachtwoord"/>
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
                        <label for="woonplaats">Plaatsnaam*</label>
                        <input type="text" name="woonplaats" id="woonplaats"/>
                    </div>
                    <div class="input-groep clear-left">
                        <label for="telefoon">Telefoon*</label>
                        <input type="number" name="telefoon" id="telefoon"/>
                    </div>
                </fieldset>
                <input type="hidden" name="registratie_verstuurd" value="ja">
                <input type="submit" value="Verstuur">
                <div class="clearfix"></div>
            </form>
        </div>
        <?php
            }
            if (isset($_GET['succes']))
            {
                echo 'Registratie voltooid';
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
</body>
</html>
