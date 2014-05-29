<?php
if (isset($_GET['productId']))
{
    $productId = $_GET['productId'];
    $retrieveBookByProductNumber->execute(array($productId));
    $book = $retrieveBookByProductNumber->fetch();

    $getAllRelatedProductIds->execute(array($productId));

    $inShoppingCart = isset($_SESSION['cart'][$book['PRODUCTNUMMER']]);

    // Check to see if a book is on stock
    $retrieveAmountInStock->execute(array($book['PRODUCTNUMMER']));
    $amountInStock = $retrieveAmountInStock->fetch();
    $inStock = ($amountInStock['voorraad'] != null && $amountInStock['voorraad'] > 0);
}
?>


<div id="content">

    <button class="btn-terug terug-productenoverzicht">Terug</button>

    <div id="detail-product">
        <div class="sub-kolom-1">
            <img src="<?php echo $book['AFBEELDING_GROOT']; ?>" alt="" />
            <div class="clearfix"></div>
        </div>
        <div class="sub-kolom-2">
            <h2><?php echo $book['TITEL']; ?></h2>
            <h3><?php echo $book['SCHRIJVER']; ?></h3>
            <div class="product-info clearfix">
                <p>
                    <?php echo $book['OMSCHRIJVING']; ?>
                </p>
                <span class="<?php if ($inStock) {echo 'op-voorraad';} else {echo 'niet-op-voorraad';} ?>">
                    Op voorraad: <span><?php if ($inStock) {echo 'ja';} else {echo 'nee';} ?></span>
                </span>
                <div class="clearfix"></div>
            </div>
            <div class="detail-product-footer">
                <button id="bestelHoofdItem" class="bestelling <?php if ($inShoppingCart) {echo 'in-winkelwagen';} ?>">Toevoegen aan winkelwagen</button>
                <input class="bestelling" value="1" id="aantalHoofdItem" name="aantal" size="3" type="text" />
                <label class="bestelling" for="aantalHoofdItem">Aantal: </label>
                <span class="prijs">&euro; <?php echo $book['PRIJS']; ?></span>
                <input type="hidden" id="productId" value="<?php echo $productId ?>"/>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="row product-panel">

        <?php
        while ($relatedProduct = $getAllRelatedProductIds->fetch())
        {
            $retrieveBookByProductNumber->execute(array($relatedProduct['PRODUCTNUMMER_GERELATEERD_PRODUCT']));
            $relatedBook = $retrieveBookByProductNumber->fetch();

            $inShoppingCart = isset($_SESSION['cart'][$relatedBook['PRODUCTNUMMER']]);
        ?>
            <div class="gerelateerd-product">
                <a href="<?php echo $_SERVER['PHP_SELF'] . '?page=product-detail&productId=' . $relatedBook['PRODUCTNUMMER']; ?>">
                    <img src="<?php echo $relatedBook['AFBEELDING_KLEIN'] ?>" alt="" />
                </a>
                <span class="naam"><?php echo $relatedBook['TITEL'] ?></span>
                <span class="prijs-klein">&euro; <?php echo $relatedBook['PRIJS'] ?></span>
                <button class="addToShoppingCart <?php if ($inShoppingCart) {echo 'in-winkelwagen';} ?>">In winkelwagen</button>
                <input type="hidden" value="<?php echo $relatedBook['PRODUCTNUMMER']; ?>"/>
            </div>

        <?php
        }
        ?>

        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>

