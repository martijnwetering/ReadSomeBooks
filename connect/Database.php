<?php

$config = array(
    'dsn' => 'mysql:host=localhost;dbname=webshop',
    'gebruikersnaam' => 'root',
    'wachtwoord' => '',
);

try
{
    $db = new PDO($config['dsn'], $config['gebruikersnaam'], $config['wachtwoord']);
    $db->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
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
$retrieveAllBooksWihtoutLimit = $db->prepare("select * from product");
$retrieveAllBooks = $db->prepare("select * from product LIMIT :offset, :recordLimit");

// Retrieve all books in a certain categorie
$retrieveAllBooksInCategorieWithoutLimit = $db->prepare("select * from product where categorie = :categorie");
$retrieveAllBooksInCategorie = $db->prepare("select * from product where categorie = :categorie LIMIT :offset, :recordLimit");

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
$searchBookOnTitelOrWriter = $db->prepare("select * from product where titel like :titel or schrijver like :writer");

$selectBook = $db->prepare("select * from product where schrijver like :someValue");

?>

