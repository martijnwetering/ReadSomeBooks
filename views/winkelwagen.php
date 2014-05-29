<?php
if (isset($_GET['remove']))
{
    $productNumber = $_GET['remove'];
    unset($_SESSION['cart'][$productNumber]);

    header("Location:" . $_SERVER['PHP_SELF'] . '?page=' . $_GET['page']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if (isset($_POST['productId']) && isset($_POST['quantity']))
    {
        $productId = $_POST['productId'];
        $quantity = $_POST['quantity'];
        $_SESSION['cart'][$productId] = $quantity;
    }
}
?>


<div id="content" class="winkelwagen">
    <button class="terug-productenoverzicht">Verder winkelen</button>
    <h1>Winkelwagen</h1>

    <table class="tabel-1">
        <thead>
        <tr>
            <th></th>
            <th>Productnaam</th>
            <th>Prijs</th>
            <th>Aantal</th>
            <th>Subtotaal</th>
            <th>Verwijderen</th>
        </tr>
        </thead>
        <tbody>
        <?php

        if (!empty($_SESSION['cart']))
        {
            $totalPrice = 0;

            foreach ($_SESSION['cart'] as $productNumber => $quantity)
            {
                $retrieveBookByProductNumber->execute(array($productNumber));
                $product = $retrieveBookByProductNumber->fetch();
                $totalPrice += $product['PRIJS'] * $quantity;
        ?>
                <tr>
                    <td><a href="<?php echo $_SERVER['PHP_SELF'] . '?page=product-detail&productId=' . $productNumber ?>"><img src="<?php echo $product['AFBEELDING_KLEIN']; ?>" alt="product"/></a></td>
                    <td><?php echo $product['TITEL']; ?></td>
                    <td>&euro; <?php echo $product['PRIJS']; ?></td>
                    <td>
                        <select class="aantal">
                            <?php
                            for ($i=1; $i < 21; $i++)
                            {
                                if ($quantity == $i)
                                {
                                    echo "<option selected value='$productNumber'>";
                                }
                                else
                                {
                                    echo "<option value='$productNumber'>";
                                }
                                echo $i;
                                echo "</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td class="subtotaal">&euro; <?php echo number_format($product['PRIJS'] * $quantity, 2); ?></td>
                    <td><a class="remove-item" href="<?php echo $_SERVER['REQUEST_URI'] . '&remove=' . $product['PRODUCTNUMMER']; ?>"><i class="fa fa-times verwijder"></i></a></td>
                </tr>
        <?php
            }
        }
        else
        {
            echo '<tr>';
            echo '<td colspan="6">Geen items in winkelwagen</td>';
            echo '</tr>';
        }
        ?>

        </tbody>
    </table>

    <table class="tabel-2">
        <tbody>
        <tr>
            <td>Eindtotaal:</td>
            <td>&euro; <?php echo isset($totalPrice) ? number_format($totalPrice, 2) : "0,00"; ?></td>
        </tr>
        </tbody>
    </table>
    <button class="herbereken">Herbereken bedrag</button>
    <button class="afrekenen">Afrekenen</button>
    <div class="clearfix"></div>
</div>

