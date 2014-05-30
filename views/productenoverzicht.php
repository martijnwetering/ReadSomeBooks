
<div id="content" class="productenoverzicht">
<div class="po-kolom">
    <div class="search">
        <input id="searchString" type="search" placeholder="zoek..." value="" />
        <input id="submitSearch" type="submit" value="Zoek">
    </div>
    <select id="categorie">
        <option value="">selecteer een categorie...</option>
        <option value="alle-producten">Alle producten</option>
    <?php
    $retrieveAllCategories->execute();
    while ($row = $retrieveAllCategories->fetch())
    {
    ?>
    <option value="<?php echo $row['CATEGORIENAAM'] ?>">
        <?php echo $row['CATEGORIENAAM'] ?>
    </option>
    <?php
    }
    ?>
</select>
<span>
    1367 producten | Toon
    <select>
        <option value="4">4</option>
        <option value="8">8</option>
        <option value="12">12</option>
        <option value="16" selected>16</option>
    </select>
    per pagina
</span>
<div class="product-row">
    <?php
    if (isset($_GET['search']))
    {
        $searchString = $_GET['search'];
        $searchBookOnTitelOrWriter->bindValue(":searchstring", $searchString);
        $searchBookOnTitelOrWriter->execute();

        // Checks if the search returned result(s). If no result it
        // will inform the user, else it will display the results.
        if ($searchBookOnTitelOrWriter->rowCount() == 0)
        {
            echo '<p>';
            echo 'Sorry, geen resultaten gevonden voor ' . $searchString;
            echo '</p>';
        }
        else
        {
            while ($row = $searchBookOnTitelOrWriter->fetch())
            {
                $inShoppingCart = isset($_SESSION['cart'][$row['PRODUCTNUMMER']]);
                ?>
                <div class="product-klein">
                    <a href="<?php echo $_SERVER['PHP_SELF'] . '?page=product-detail&productId=' . $row['PRODUCTNUMMER']; ?>">
                        <img src="<?php echo $row['AFBEELDING_KLEIN']; ?>" alt="" />
                        <div class="product-info">
                            <span class="po-naam"><?php echo $row['TITEL']; ?></span>
                            <span class="po-autheur"><em><?php echo $row['SCHRIJVER']; ?></em></span>
                        </div>
                    </a>
                    <span class="po-prijs"><?php echo $row['PRIJS']; ?></span>
                    <button class="addToShoppingCart <?php if ($inShoppingCart) {echo 'in-winkelwagen';} ?>">
                        <i class="fa fa-shopping-cart fa-2x"></i>
                    </button>
                    <input type="hidden" value="<?php echo $row['PRODUCTNUMMER']; ?>" />
                    <div class="clearfix"></div>
                </div>
            <?php
            }
        }
    }
    else if (!isset($_GET['categorie']))
    {
        $retrieveAllBooks->execute();
        while ($row = $retrieveAllBooks->fetch())
        {
            // Ckecks if an item is already in the shopping cart
            $inShoppingCart = isset($_SESSION['cart'][$row['PRODUCTNUMMER']]);
        ?>
        <div class="product-klein">
            <a href="<?php echo $_SERVER['PHP_SELF'] . '?page=product-detail&productId=' . $row['PRODUCTNUMMER']; ?>">
                <img src="<?php echo $row['AFBEELDING_KLEIN']; ?>" alt="" />
                <div class="product-info">
                    <span class="po-naam"><?php echo $row['TITEL']; ?></span>
                    <span class="po-autheur"><em><?php echo $row['SCHRIJVER']; ?></em></span>
                </div>
            </a>
            <span class="po-prijs"><?php echo $row['PRIJS']; ?></span>
            <button class="addToShoppingCart <?php if ($inShoppingCart) {echo 'in-winkelwagen';} ?>">
                <i class="fa fa-shopping-cart fa-2x"></i>
            </button>
            <input type="hidden" value="<?php echo $row['PRODUCTNUMMER']; ?>" />
            <div class="clearfix"></div>
        </div>
    <?php
        }
    }
    else
    {
        $retrieveAllBooksInCategorie->execute(array($_GET['categorie']));
        while ($row = $retrieveAllBooksInCategorie->fetch())
        {
     ?>
        <div class="product-klein">
            <a href="<?php echo $_SERVER['PHP_SELF'] . '?page=product-detail' ?>">
                <img src="<?php echo $row['AFBEELDING_KLEIN']; ?>" alt="" />
                <div class="product-info">
                    <span class="po-naam"><?php echo $row['TITEL']; ?></span>
                    <span class="po-autheur"><em><?php echo $row['SCHRIJVER']; ?></em></span>
                </div>
            </a>
            <span class="po-prijs"><?php echo $row['PRIJS']; ?></span>
            <button id="addToShoppingCart">
                <a href="<?php echo $_SERVER['REQUEST_URI'] . '&item=' . $row['PRODUCTNUMMER']; ?>"><i class="fa fa-shopping-cart fa-2x"></i></a>
            </button>
            <div class="clearfix"></div>
        </div>
    <?php
        }
    }
    ?>
</div>
<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
</div>

