<?php
include('../connect/Database.php');
session_start();

if (isset($_SESSION['login']) && $_SESSION['login'] === true)
{
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

    echo json_encode(array('success' => true));
}
?>