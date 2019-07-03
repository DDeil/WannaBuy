<?php

    require_once ('classes.php');


/**
 *Variables
 */
    const HOST = 'localhost';
    const USER = 'root';
    const PASSWORD = '';
    const DATA_BASE = 'testsite2';

    $publication = array();
/**
 *
 */

    $connectionToDB = mysqli_connect(
        HOST,
        USER,
        PASSWORD,
        DATA_BASE) or die ('Fail connection to data base');

    $result = $connectionToDB->query("SELECT * FROM publication");

    while ($row = mysqli_fetch_assoc($result))
        $publication[] = new $row['type']($row);

