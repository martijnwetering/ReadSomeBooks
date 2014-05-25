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

// Prepared statements to check for a username or email that is already in use
$checkUsername = $db->prepare("select * from gebruiker where gebruikersnaam = ?");
$checkEmail = $db->prepare("select * from gebruiker where email = ?");

// Login
$hashedPassword = $db->prepare("select wachtwoord from gebruiker where gebruikersnaam = ?");

// Retrieve all books from the database
$retrieveAllBooks = $db->prepare("select * from product");

// Retrieve all books in a certain categorie
$retrieveAllBooksInCategorie = $db->prepare("select * from product where categorie = ?");

// Retrieve book by product number
$retrieveBookByProductNumber = $db->prepare("select * from product where productnummer = ?");

// Retrieve all categories
$retrieveAllCategories = $db->prepare("select * from categorie");


// Retrieve name user
//$userFirstAndLastName = $db->prepare("select voornaam, tussenvoegsel, achternaam from users where gebruikersnaam = ? ");

?>

