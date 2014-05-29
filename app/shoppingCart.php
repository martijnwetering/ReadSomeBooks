<?php
include('../connect/Database.php');

session_start();

if (empty($_SESSION['cart']))
{
    $_SESSION['cart'] = array();
}

if (isset($_POST['item']))
{
    // Check to see if a book is on stock. If its not the user
    // will receive an error message.
    $retrieveAmountInStock->execute(array($_POST['item']));
    $amountInStock = $retrieveAmountInStock->fetch();
    $inStock = ($amountInStock['voorraad'] != null && $amountInStock['voorraad'] > 0);
    if (!$inStock)
    {
        echo json_encode(array('success' => false, 'message' => 'Helaas is dit boek niet meer op voorraad.'));
        exit();
    }
    // Checks if the body of the post request contains a quantity property.
    // If it does it checks if it is numeric and if its bigger than 0;
    // Post requests that don't have a quantity property are send from the
    // productenoverzicht page and there quantity is automatically set to 1.
    $quantity = 1;
    if (isset($_POST['quantity']))
    {
        if (!is_numeric($_POST['quantity']))
        {
            echo json_encode(array('success' => false, 'message' => 'Vul A.U.B. een cijfer in als aantal.'));
            exit();
        }
        // Checks if the quantity is not greater then the amount on stock.
        if ($_POST['quantity'] > $amountInStock['voorraad'])
        {
            echo json_encode(array('success' => false, 'message' => "Helaas zijn er nog maar {$amountInStock['voorraad']} exemplaren van dit boek op voorraad."));
            exit();
        }
        else
        {
            $quantity = $_POST['quantity'] > 0 ? $_POST['quantity'] : 1;
        }
    }

    $productId = $_POST['item'];
    $_SESSION['cart'][$productId] = $quantity;

    $returnObj = array('success' => true, 'message' => 'item added');
    echo json_encode($returnObj);
}
?>