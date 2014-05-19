<?php

$config = array(
    'dsn' => 'mysql:host=localhost;dbname=readsomebooks',
    'gebruikersnaam' => 'root',
    'wachtwoord' => '',
);

$db = new PDO($config['dsn'], $config['gebruikersnaam'], $config['wachtwoord']);

// Prepared statemants
$registerUser = $db->prepare("insert into users (voornaam, achternaam, wachtwoord, straatnaam, huisnummer, postcode,
    woonplaats, telefoon, aanhef, tussenvoegsel, gebruikersnaam, email, created) values (:voornaam, :achternaam, :wachtwoord, :straatnaam,
    :huisnummer, :postcode, :woonplaats, :telefoon, :aanhef, :tussenvoegsel, :gebruikersnaam, :email, now())");

// Prepared statements to check for a username or email that is already in use
$checkUsername = $db->prepare("select * from users where gebruikersnaam = ?");
$checkEmail = $db->prepare("select * from users where email = ?");

?>

