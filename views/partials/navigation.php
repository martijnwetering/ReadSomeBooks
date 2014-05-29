<div id="menu">
    <ul class="nav">
        <li class="nieuws"><a href="#">Nieuws</a></li>
        <li class="Acties"><a href="#">Acties</a></li>
        <li class="over-ons"><a href="<?php echo $_SERVER['PHP_SELF'] . '?page=over-ons' ?>">Over ons</a></li>
        <li class="Vacatures"><a href="#">Vacatures</a></li>
        <li class="webshop">
            <a href="#">Webshop</a>
            <ul>
                <li><a href="<?php echo $_SERVER['PHP_SELF'] . '?page=productenoverzicht' ?>">Producten</a></li>
                <li><a href="<?php echo $_SERVER['PHP_SELF'] . '?page=winkelwagen' ?>">Winkelwagen</a></li>
                <li><a href="<?php echo $_SERVER['PHP_SELF'] . '?page=afrekenen' ?>">Afrekenen</a></li>
            </ul>
        </li>
    </ul>
</div>
<div id="error">
    <span id="error-message"></span>
    <span id="afsluiten"><i class="fa fa-times"></i></span>
</div>