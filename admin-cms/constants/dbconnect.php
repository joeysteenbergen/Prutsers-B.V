<?php

function db_connect()
{
    // Static variabele zorgt ervoor dat er maar 1x een connectie gemaakt kan worden
    static $connection;

    if(isset($connection))
    {
        // Laden configuratiebestand buiten root als array
        $config = parse_ini_file('../../../../webshop/config.ini');

        // Verbinding maken met de database
        $connection = mysqli_connect('localhost', $config['username'], $config['password'], $config['dbname']);
    }

    // Foutafhandeling
    if($connection === false)
    {
        return mysqli_connect_error();
    }

    return $connection;
}

function db_query($query)
{
    // Verbinden met de database
    $connection = db_connect();

    // Query naar database
    $result = mysqli_query($connection, $query);
    return $result;
}

function db_select($query) {
    $rows = array();
    $result = db_query($query);
    // If query failed, return `false`
    if($result === false) {
        return false;
    }
    // If query was successful, retrieve all the rows into an array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
/**
 * Ophalen laatste database error
 *
 * Return string met de error
 */
function db_error() {
    $connection = db_connect();
    return mysqli_error($connection);
}
/**
 * Escapen van de query string
 */
function db_quote($value) {
    $connection = db_connect();
    return "'" . mysqli_real_escape_string($connection,$value) . "'";
}
