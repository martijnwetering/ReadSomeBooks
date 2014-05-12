<?php

class User
{
    private $gebruikersnaam, $wachtwoord, $wachtwoord_herhaal, $aanhef, $voornaam, $tussenvoegsel,
        $achternaam, $email, $straatnaam, $huisnummer, $postcode, $woonplaats, $telefoon, $post;

    function __construct($post)
    {
        $this->post = $post;
        $this->gebruikersnaam = $post['gebruikersnaam'];
        $this->wachtwoord = $post['wachtwoord'];
        $this->wachtwoord_herhaal = $post['wachtwoord-herhaal'];
        $this->aanhef = $post['aanhef'];
        $this->voornaam = $post['voornaam'];
        $this->tussenvoegsel = $post['tussenvoegsel'];
        $this->achternaam = $post['achternaam'];
        $this->email = $post['email'];
        $this->straatnaam = $post['straatnaam'];
        $this->huisnummer = $post['huisnummer'];
        $this->postcode = $post['postcode'];
        $this->woonplaats = $post['woonplaats'];
        $this->telefoon = $post['telefoon'];
    }

    function registreer($db)
    {
        $sql = "insert into users (gebruikersnaam, wachtwoord, aanhef, voornaam,
            achternaam, email, straatnaam, huisnummer, postcode, woonplaats, telefoon, tussenvoegsel)
            values ('$this->gebruikersnaam', '$this->wachtwoord', '$this->aanhef', '$this->voornaam', '$this->achternaam', '$this->email',
            '$this->straatnaam', '$this->huisnummer', '$this->postcode', '$this->woonplaats', '$this->telefoon', '$this->tussenvoegsel')";
        $db->query($sql);
        $db->close();

    }

}