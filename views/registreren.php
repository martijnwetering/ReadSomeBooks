<?php
require('../connect/Database.php');

// Checks if the registration form was posted
$registratie_verstuurd = (isset($_POST['registratie_verstuurd']));

$errors = array();
$registrationInfo = array();

if ($registratie_verstuurd)
{
    /*#######################################
    * Guard clauses register form
    *#######################################*/

    // Checks if all required fields were filled in.
    if (!filledInForm($_POST))
    {
        $errors[] = 'Alle velden met een * zijn verplicht';
    }
    else {
        foreach ($_POST as $key => $value)
        {
            $value = trim($value);
        }
        if ($_POST['wachtwoord'] !== $_POST['herhaal_wachtwoord'])
        {
            $errors[] = 'Wachtwoorden zijn niet gelijk';
        }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            $errors[] = 'Geen geldig e-mail adres is opgegeven ';
        }
        if (!is_numeric($_POST['huisnummer']))
        {
            $errors[] = 'Geen geldig huisnummer opgegeven';
        }
        if (!is_numeric($_POST['telefoon']))
        {
            $errors[] = 'Geen geldig telefoonnummer opgegeven';
        }
        if (!checkPasswordStrength($_POST['wachtwoord']))
        {
            $errors[] = 'Wachtwoord moet minstens 6 en maximaal 20 karakters bevatten waarvan'
                . ' 1 number, 1 letter en 1 hoofdletter';
        }
        if (duplicateUsername($_POST['gebruikersnaam'], $checkUsername))
        {
            $errors[] = 'Gebruikersnaam bestaat al';
        }
        if (duplicateEmail($_POST['email'], $checkEmail))
        {
            $errors[] = 'E-mail al in gebruik';
        }
    }

    if (empty($errors) === true)
    {
        // Hashes the password before saving it to the database
        $_POST['wachtwoord'] = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);

        // Add all info about the user to an array that will be send to the database
        foreach ($_POST as $key => $value)
        {
            if ($key !== 'registratie_verstuurd' && $key !== 'herhaal_wachtwoord')
            {
                if ($key === 'aanhef')
                {
                    if ($value === 'dhr')
                    {
                        $registrationInfo['sexe'] = 'M';
                    }
                    if ($value === 'mevr')
                    {
                        $registrationInfo['sexe'] = 'V';
                    }
                }
                else if ($key === 'tussenvoegsel')
                {
                    if (isNullOrWhiteSpace($value))
                    {
                        $registrationInfo['tussenvoegsel'] = null;
                    }
                    else
                    {
                        $registrationInfo['tussenvoegsel'] = $value;
                    }
                }
                else
                {
                    $registrationInfo[$key] = $value;
                }
            }
        }

        // Saves the user to the database.
        try
        {
            $registerUser->execute($registrationInfo);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }

        header('Location: shell.php?succes&page=registreren');
        exit();
    }
}

if (!isset($_GET['succes']))
{
?>
    <div id="content" class="registreren">
        <h1>Registreren</h1>
        <h4>Vul uw gegevens in</h4>

        <form class="registreer-form" action="<?php echo $_SERVER['PHP_SELF'] . '?page=registreren'; ?>" method="POST">
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
        <?php
        if (!empty($errors))
        {
            echo '<div class="form-errors">';
            foreach ($errors as $error)
            {
                echo $error;
                echo '<br />';
            }
            echo '</div>';
        }
        ?>
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

