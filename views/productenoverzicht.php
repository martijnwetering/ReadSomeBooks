
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
            renderBooks($searchBookOnTitelOrWriter);
        }
    }
    // If a categorie is set, this will only render the books in that categorie.
    else if (isset($_GET['categorie']))
    {
        $retrieveAllBooksInCategorie->execute(array($_GET['categorie']));
        renderBooks($retrieveAllBooksInCategorie);
    }
    else
    {
        $retrieveAllBooks->execute();
        renderBooks($retrieveAllBooks);
    }
    ?>
</div>
<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
</div>

