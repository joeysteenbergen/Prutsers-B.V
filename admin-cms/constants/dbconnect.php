<?php
// Laden configuratiebestand buiten root
$config = parse_ini_file('../../../../webshop/config.ini');

// Verbinding maken met de database
$connection = mysqli_connect('localhost', $config['username'], $config['password'], $config['dbname']);

