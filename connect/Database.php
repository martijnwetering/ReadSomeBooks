<?php

$config = array(
    'host' => 'localhost',
    'gebruikersnaam' => 'root',
    'wachtwoord' => '',
    'dbnaam' => 'readsomebooks'
);

$db = new mysqli($config['host'], $config['gebruikersnaam'], $config['wachtwoord'], $config['dbnaam']);

?>