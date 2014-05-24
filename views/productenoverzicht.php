<?php

if (empty($_SESSION['cart']))
{
    $_SESSION['cart'] = array();
}

if (isset($_GET['item']))
{
    array_push($_SESSION['cart'], $_GET['item']);
    if (isset($_GET['categorie']))
    {
        header("Location:" . $_SERVER['PHP_SELF'] . '?page=' . $_GET['page'] . '&categorie=' . $_GET['categorie']);
        exit();
    }
    else
    {
        header("Location:" . $_SERVER['PHP_SELF'] . '?page=' . $_GET['page']);
        exit();
    }
}
?>

<div id="content" class="productenoverzicht">
<div class="po-kolom">
<form>
    <input type="search" placeholder="zoek..." value="" />
    <input type="submit" value="Zoek">
</form>
<select id="categorie">
    <option value="">selecteer een categorie...</option>
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
    if (!isset($_GET['categorie']))
    {
        $retrieveAllBooks->execute();
        while ($row = $retrieveAllBooks->fetch())
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
                <a href="<?php echo $_SERVER['REQUEST_URI'] . '&item=' . $row['TITEL']; ?>"><i class="fa fa-shopping-cart fa-2x"></i></a>
            </button>
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
                <a href="<?php echo $_SERVER['REQUEST_URI'] . '&item=' . $row['TITEL']; ?>"><i class="fa fa-shopping-cart fa-2x"></i></a>
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

