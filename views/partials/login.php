<div id="login">

<?php
//        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//            echo '<p>';
//            foreach ($_POST as $key => $value) {
//                echo $value;
//            }
//            echo '</p>';
//
////            $link = mysql_connect('localhost', 'root', '') or die('Verbinding mislukt');
////            $db = mysql_select_db('readsomebooks', $link) or die('Database niet beschikbaar');
////            $sql = 'select email from users where ID = 1';
////            $result = mysql_query($sql) or die('Fout bij uitvoeren query');
////            $email = mysql_fetch_row($result);
//
////            $db = new mysqli('localhost', 'root', '', 'readsomebooks');
////            $sql = 'select email from users where ID = 1';
////            $result = $db->query($sql);
////            $row = $result->fetch_assoc();
//
//            echo '<p>';
////            echo $row['email'];
//            echo '</p>';
//        }
//        else {
?>


    <form id="form-login" action="over-ons.php" method="post">
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
        <div class="clearfix" id="form-bottom">
            <input type="submit" value="Login">
        </div>
    </form>




</div>