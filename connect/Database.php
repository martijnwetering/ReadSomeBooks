<?php

$config = array(
    'dsn' => 'mysql:host=localhost;dbname=readsomebooks',
    'gebruikersnaam' => 'root',
    'wachtwoord' => '',
);

try
{
    $db = new PDO($config['dsn'], $config['gebruikersnaam'], $config['wachtwoord']);
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
// Prepared statemants
$registerUser = $db->prepare("insert into users (voornaam, achternaam, wachtwoord, straatnaam, huisnummer, postcode,
    woonplaats, telefoon, aanhef, tussenvoegsel, gebruikersnaam, email, created) values (:voornaam, :achternaam, :wachtwoord, :straatnaam,
    :huisnummer, :postcode, :woonplaats, :telefoon, :aanhef, :tussenvoegsel, :gebruikersnaam, :email, now())");

// Prepared statements to check for a username or email that is already in use
$checkUsername = $db->prepare("select * from users where gebruikersnaam = ?");
$checkEmail = $db->prepare("select * from users where email = ?");

// Login
$hashedPassword = $db->prepare("select wachtwoord from users where gebruikersnaam = ?");

// Retrieve name user
//$userFirstAndLastName = $db->prepare("select voornaam, tussenvoegsel, achternaam from users where gebruikersnaam = ? ");

?>

