<?php

$config = array(
    'dsn' => 'mysql:host=localhost;dbname=readsomebooks',
    'gebruikersnaam' => 'root',
    'wachtwoord' => '',
);

$db = new PDO($config['dsn'], $config['gebruikersnaam'], $config['wachtwoord']);

// Prepared statemants
$registerUser = $db->prepare("insert into users (voornaam, achternaam, wachtwoord, straatnaam, huisnummer, postcode,
    woonplaats, telefoon, aanhef, tussenvoegsel, gebruikersnaam, email) values (:voornaam, :achternaam, :wachtwoord, :straatnaam,
    :huisnummer, :postcode, :woonplaats, :telefoon, :aanhef, :tussenvoegsel, :gebruikersnaam, :email)");


?>

