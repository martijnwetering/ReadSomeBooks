<div id="login">
    <form id="form-login">
        <div class="input-groep">
            <label for="wachtwoord"><i class="fa fa-lock"></i> WACHTWOORD</label>
            <input type="password" placeholder="wachtwoord" id="wachtwoord"/>

            <div>
                <a href="#">Vergeten?</a>
                <a href="registreren.php" class="float-left">Registreer</a>
            </div>
        </div>
        <div class="input-groep">
            <label for="gebruikersnaam"><i class="fa fa-user"></i> GEBRUIKERSNAAM</label>
            <input type="text" placeholder="gebruikersnaam" id="gebruikersnaam"/>

            <div>
                <input id="rememberme" name="rememberme" value="remember" type="checkbox"/><span>&nbsp;Onthouden</span>
            </div>
        </div>
        <div class="clearfix" id="form-bottom">
            <input type="submit" value="Login">
        </div>
    </form>
</div>