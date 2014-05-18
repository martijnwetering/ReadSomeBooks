<?php
require('../connect/Database.php');

// Checks if the registration form was posted
$registratie_verstuurd = (isset($_POST['registratie_verstuurd']));

$errors = array();
$registrationInfo = array();

if ($registratie_verstuurd)
{
    if (!filledInForm($_POST))
    {
        $errors[] = 'Alle velden met een * zijn verplicht';
    }
    else {
        if ($_POST['wachtwoord'] !== $_POST['herhaal_wachtwoord'])
        {
            $errors[] = 'Wachtwoorden zijn niet gelijk';
        }
    }

    if (empty($errors) === true)
    {
        // Add all info about the user to an array that will be send to the database
        foreach ($_POST as $key => $value)
        {
            if ($key !== 'registratie_verstuurd' && $key !== 'herhaal_wachtwoord')
            {
                $registrationInfo[$key] = $value;
            }
        }

        // Sends the data to the database by making use of a prepared statement
        try
        {
            $registerUser->execute($registrationInfo);
        }
        catch(PDOException $e)
        {
            $pdoexception = $e;
            echo $e->getMessage();
        }

        header('Location: registreren.php?succes');
        exit();
    }
}

// Checks if the registration form was filled in
function filledInForm($post)
{
    foreach($post as $key => $value)
    {
        if ($key !== 'tussenvoegsel' && isNullOrWhiteSpace($value))
        {
            return false;
        }
        else
        {
            return true;
        }
    }
}

// Checks if a variable contains null or whiteSpace
function isNullOrWhiteSpace($value)
{
    return (!isset($value) || trim($value) === '');
}


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
    echo '<div class="content"><p>';
    echo 'Registratie voltooid';
    echo '</p></div>';
}
?>

