<div id="content">
    <table class="tabel-afrekenen">
        <thead>
        <tr>
            <th>Productnaam</th>
            <th>Aantal</th>
            <th>Subtotaal</th>
        </tr>
        </thead>
        <tbody>
        <?php

        if (isset($_SESSION['login']))
        {
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
                        <td><?php echo $product['TITEL']; ?></td>
                        <td><?php echo $quantity; ?></td>
                        <td class="subtotaal">&euro; <?php echo number_format($product['PRIJS'] * $quantity, 2); ?></td>
                    </tr>
                <?php
                }
            }
            else
            {
                echo '<td colspan="3">';
                echo 'Geen items om af te rekenen';
                echo '</td>';
            }
        }
        else
        {
            echo '<td colspan="3">';
            echo 'U moet eerst inloggen voordat u kunt afrekenen';
            echo '</td>';
        }
        ?>

        <table class="tabel-eindtotaal">
            <tbody>
            <tr>
                <td><strong>Eindtotaal: </strong></td>
                <td>&euro; <?php echo isset($totalPrice) ? number_format($totalPrice, 2) : "0,00"; ?></td>
            </tr>
            </tbody>
        </table>
        <button class="betaal">Betaal</button>

        </tbody>
    </table>
</div>

<div id="overlay"></div>

<div id="betaal-bevestiging">
    <div class="betaal-informatie">
        <h2>Betaalbevestiging</h2>
        <p>Als u op bevestig druk wordt er <strong>&euro;<?php echo number_format($totalPrice, 2) ?></strong> van u rekening afgeschreven.</p>
        <button id="bevestig">Bevestig</button>
        <button id="annuleer">Annuleer</button>
    </div>
</div>
