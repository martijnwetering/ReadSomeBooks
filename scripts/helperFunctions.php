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

?>