<?php
// Makes sure the querystring contains a recordLimit.
if (!isset($_GET['recordLimit']))
{
    if (isset($_SESSION['recordLimit']))
    {
        $recordLimit = $_SESSION['recordLimit'];
    }
    else
    {
        $recordLimit = 16;
    }
    header("Location:" . $_SERVER['REQUEST_URI'] . '&recordLimit=' . $recordLimit);
    exit();
}
// Makes sure the querystring contains a pageNumber.
if (!isset($_GET['pageNumber']))
{
    header("Location:" . $_SERVER['REQUEST_URI'] . '&pageNumber=1');
    exit();
}
if (isset($_GET['recordLimit']))
{
    $recordLimit = $_GET['recordLimit'];
    $_SESSION['recordLimit'] = $recordLimit;
}
?>

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
            // Builds the dropdown menu where a categorie can be selected.
            $retrieveAllCategories->execute();
            while ($row = $retrieveAllCategories->fetch())
            {
                $categorie = $row['CATEGORIENAAM'];
                if (isset($_GET['categorie']) && $_GET['categorie'] == $categorie)
                {
                    echo "<option selected value='{$categorie}'>{$categorie}</option>";
                }
                else
                {
                    echo "<option value='{$categorie}'>{$categorie}</option>";
                }
            }

            ?>

        </select>
<span>
    <?php
    // Checks howmany items in the database there are and displays this to the user.
    $retrieveAllBooksWihtoutLimit->execute();
    $booksInDatabase = $retrieveAllBooksWihtoutLimit->rowCount();
    echo "{$booksInDatabase} producten | ";

    // Builds the dropdownlist were the user can select howmany items should be displayed
    // for each page.
    echo '<select id="numberOfItemsPerPage">';
    for ($i = 4; $i < 17; $i+=4)
    {
        if ($i == $_SESSION['recordLimit']) echo "<option selected value='{$i}'>{$i}</option>";
        else echo "<option value='{$i}'>{$i}</option>";
    }
    echo '</select>';
    ?>
    per pagina
</span>
        <div class="product-row">
            <?php
            // Sets the page number and offset for the pagination.
            if (isset($_GET['pageNumber']))
            {
                $pageNumber = $_GET['pageNumber'];
                $offset = $_SESSION['recordLimit'] * ($pageNumber - 1);
            }

            // Handles search request. Can find a book on writer or titel.
            if (isset($_GET['search']))
            {
                $searchString = $_GET['search'];
                $searchBookOnTitelOrWriter->bindValue(":titel", $searchString);
                $searchBookOnTitelOrWriter->bindValue(":writer", $searchString);
                $searchBookOnTitelOrWriter->execute();

                $total = $searchBookOnTitelOrWriter->rowCount();
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
                $retrieveAllBooksInCategorieWithoutLimit->bindValue(":categorie", $_GET['categorie']);
                $retrieveAllBooksInCategorieWithoutLimit->execute();
                $totalBooks = $retrieveAllBooksInCategorieWithoutLimit->rowCount();

                $retrieveAllBooksInCategorie->bindValue(":categorie", $_GET['categorie']);
                $retrieveAllBooksInCategorie->bindValue(":offset", $offset);
                $retrieveAllBooksInCategorie->bindValue(":recordLimit", $_SESSION['recordLimit']);
                $retrieveAllBooksInCategorie->execute();
                renderBooks($retrieveAllBooksInCategorie);
            }
            // Renders all books in the database.
            else
            {
                $retrieveAllBooksWihtoutLimit->execute();
                $totalBooks = $retrieveAllBooksWihtoutLimit->rowCount();

                $retrieveAllBooks->bindValue(":offset", $offset);
                $retrieveAllBooks->bindValue(":recordLimit", $_SESSION['recordLimit']);
                $retrieveAllBooks->execute();
                renderBooks($retrieveAllBooks);
            }
            ?>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="pagination">

        <?php
        // Sets the links for the pagination.
        if (!isset($_GET['search']))
        {
            $baseUrl = $_SERVER['PHP_SELF'] . "?page=productenoverzicht" . "&recordLimit="
                . $_SESSION['recordLimit'];
            if (isset($_GET['categorie']))
            {
                $previous = $baseUrl . "&pageNumber=" . ($_GET['pageNumber'] - 1) . "&categorie=" . $_GET['categorie'];
                $next = $baseUrl . "&pageNumber=" . ($_GET['pageNumber'] + 1) . "&categorie=" . $_GET['categorie'];
            }
            else
            {
                $previous = $baseUrl . "&pageNumber=" . ($_GET['pageNumber'] - 1);
                $next = $baseUrl . "&pageNumber=" . ($_GET['pageNumber'] + 1);
            }


            // Renders previous and next buttons for pagination.
            $pageNumber = $_GET['pageNumber'];
            $recordLimit = $_SESSION['recordLimit'];
            $booksLeft = $totalBooks - ($pageNumber * $recordLimit);
            if ($pageNumber > 1 && $booksLeft > 0)
            {
                echo "<a class='previous' href='{$previous}'>Vorige</a>";
                echo "<a class='next' href='{$next}'>Volgende</a>";
            }
            else if ($pageNumber == 1 && $booksLeft > 0)
            {
                echo "<a class='next' href='{$next}'>Volgende</a>";
            }
            else if ($pageNumber > 1 && $booksLeft <= 0)
            {
                echo "<a class='previous' href='{$previous}'>Vorige</a>";
            }
        }
        ?>
    </div>
    <div class="clearfix"></div>
</div>

