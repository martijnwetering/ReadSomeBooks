<?php
require('../app/helperFunctions.php');
require('../connect/Database.php');

session_start();

if (isset($_GET['logout']))
{
    session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF'] . '?page=' . $_GET['page'] );
    exit();
}

$loginVerstuurd = (isset($_POST['login_verstuurd']));

if ($loginVerstuurd)
{
    $password = trim($_POST['wachtwoord']);
    $userName = trim($_POST['gebruikersnaam']);

    // Fetches the hashed password from the database.
    $hashedPassword->execute(array($userName));
    $hash = $hashedPassword->fetch();

    // Checks if the hashed password is equal to the posted password. If the password
    // doensn't match it sets an error on $loginError.
    if (password_verify($password, $hash['wachtwoord']))
    {
        $_SESSION['login'] = true;
        $_SESSION['userName'] = $userName;

        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    }
    else
    {
        $loginError = 'Gebruikersnaam en/of wachtwoord is niet juist';
    }
}
?>

<div id="login">
    <?php
    if (!isset($_SESSION['userName']))
    {
    ?>
    <form id="form-login" action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
        <div class="input-groep">
            <label for="wachtwoord"><i class="fa fa-lock"></i> WACHTWOORD</label>
            <input type="password" placeholder="wachtwoord" id="wachtwoord" name="wachtwoord"/>

            <div>
                <a href="#">Vergeten?</a>
                <a href="<?php echo $_SERVER['PHP_SELF'] . '?page=registreren' ?>" class="float-left">Registreer</a>
            </div>
        </div>
        <div class="input-groep">
            <label for="gebruikersnaam"><i class="fa fa-user"></i> GEBRUIKERSNAAM</label>
            <input type="text" placeholder="gebruikersnaam" id="gebruikersnaam" name="gebruikersnaam"/>

            <div>
                <input id="rememberme" name="rememberme" value="remember" type="checkbox"/><span>&nbsp;Onthouden</span>
            </div>
        </div>
        <input type="hidden" name="login_verstuurd" value="ja">
        <div class="clearfix" id="form-bottom">
            <input type="submit" value="Login">
        </div>
    </form>
    <?php
    }

    // Checks if there is an error set on $loginError, and if so it will display
    // this to the user.
    if (isset($loginError))
    {
        echo "<span class='login-error'>";
        echo $loginError;
        echo '</span>';
    }

    // If the user is logd in his username will be displayed along with the ability
    // to log out.
    if (isset($_SESSION['login']))
    {
        echo "<div class='user-welcome'>";
        echo 'Welkom ' . '<span>' . $_SESSION['userName'] . '</span>';
        echo "<a href='" . $_SERVER['REQUEST_URI'] . "&logout=true'>" . " | logout" . "</a>";
        echo '</div>';
    }
    ?>

</div>