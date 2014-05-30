<?php
function duplicateUsername($username, $checkUsername)
{
    $checkUsername->execute(array($username));
    $count = $checkUsername->rowCount();
    if ($count > 0)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function duplicateEmail($email, $checkEmail)
{
    $checkEmail->execute(array($email));
    $count = $checkEmail->rowCount();
    if ($count > 0)
    {
        return true;
    }
    else
    {
        return false;
    }
}

// Checks if all required field in the registration form were filled in
function filledInForm($post)
{
    foreach($post as $key => $value)
    {
        if ($key !== 'tussenvoegsel' && isNullOrWhiteSpace($value))
        {
            return false;
        }
        else
        {
            return true;
        }
    }
}

// Checks if a variable contains null or whiteSpace
function isNullOrWhiteSpace($value)
{
    return (!isset($value) || trim($value) === '');
}

// Checks if the strength of the password is sufficient
function checkPasswordStrength($password)
{
    if( strlen($password) < 6 || strlen($password) > 20 || !preg_match("#[0-9]+#", $password)
        || !preg_match("#[a-z]+#", $password) || !preg_match("#[A-Z]+#", $password))
    {
        return false;
    }
    else
    {
        return true;
    }
}

// Receives an pdo [$result] and renders the books.
function renderBooks($result)
{
    while ($row = $result->fetch())
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
?>