<?php

$config = array(
    'dsn' => 'mysql:host=localhost;dbname=webshop',
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

// Register user
// gebruikersnaam, voornaam, tussenvoegsel, achteraam, straatnaam, huisnummer, postcode, woonplaats, email, sexe, wachtwoord

$registerUser = $db->prepare("insert into gebruiker (gebruikersnaam ,voornaam, tussenvoegsel, achternaam, straatnaam, huisnummer, postcode,
    woonplaats, email, sexe, wachtwoord, telefoon) values (:gebruikersnaam ,:voornaam, :tussenvoegsel, :achternaam, :straatnaam, :huisnummer, :postcode,
    :woonplaats, :email, :sexe, :wachtwoord, :telefoon)");


//Register user old db
//$registerUserOld = $db->prepare("insert into users (voornaam, achternaam, wachtwoord, straatnaam, huisnummer, postcode,
//    woonplaats, telefoon, aanhef, tussenvoegsel, gebruikersnaam, email, created) values (:voornaam, :achternaam, :wachtwoord, :straatnaam,
//    :huisnummer, :postcode, :woonplaats, :telefoon, :aanhef, :tussenvoegsel, :gebruikersnaam, :email, now())");

// Prepared statements to check for a username or email that is already in use
$checkUsername = $db->prepare("select * from gebruiker where gebruikersnaam = ?");
$checkEmail = $db->prepare("select * from gebruiker where email = ?");

// Login
$hashedPassword = $db->prepare("select wachtwoord from gebruiker where gebruikersnaam = ?");

// Retrieve name user
//$userFirstAndLastName = $db->prepare("select voornaam, tussenvoegsel, achternaam from users where gebruikersnaam = ? ");

?>

