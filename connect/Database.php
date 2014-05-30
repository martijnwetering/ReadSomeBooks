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

// Related products
$getAllRelatedProductIds = $db->prepare("select * from product_gerelateerd_product where productnummer = ?");

// Retrieve amount in stock
$retrieveAmountInStock = $db->prepare("select voorraad from product where productnummer = ?");

// Update stock
$updateStock = $db->prepare("update product set voorraad = voorraad - :quantity where PRODUCTNUMMER = :productId");

// Search for titel or writer in database
$searchBookOnTitelOrWriter = $db->prepare("select * from product where titel like :searchstring or schrijver like :searchstring");
$searchBookOnWriter = $db->prepare("select & from product where schrijver like :writer");

?>

