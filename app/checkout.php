<?php
include('../connect/Database.php');
session_start();

// Checks if the user is logged in.
if (isset($_SESSION['login']) && $_SESSION['login'] === true)
{
    // Updates the stock in the database for each item purchased.
    foreach($_SESSION['cart'] as $productId => $quantity)
    {
        try
        {
            $updateStock->bindValue(":quantity", $quantity);
            $updateStock->bindValue(":productId", $productId);
            $updateStock->execute();
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    // Send a json response telling the client the purchase is completed succesfully.
    echo json_encode(array('success' => true));
}
?>