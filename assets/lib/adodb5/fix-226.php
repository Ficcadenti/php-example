<?php
require_once( 'adodb.inc.php' );

function test($q, $c = true)
{
    $strHost = 'localhost';
    $strDb = 'mantis_13x';
    $strDSN = "mysql:host=$strHost;dbname=$strDb;charset=utf8";
    $strUser = 'root';
    $strPassword = 'C0yote71';

    echo "magic quotes ", $q ? 'ON' : "OFF - connection: " . ($c ? 'ON' : 'OFF'), "\n";

    $pdo = new PDO($strDSN, $strUser, $strPassword);
    echo "PDO Native:     ", $pdo->quote('backslash\\'), "   ", $pdo->quote('quote\''), "\n";

    $db = ADONewConnection('mysqli');
    if ($c) $db->connect($strHost, $strUser, $strPassword);
    echo "ADODB MySQLi:   ", $db->qstr('backslash\\', $q), "   ", $db->qstr('quote\'', $q), "\n";

    $db = ADONewConnection('pdo');
    if ($c) $db->connect($strDSN, $strUser, $strPassword);
    echo "ADODB PDO:      ", $db->qstr('backslash\\', $q), "   ", $db->qstr('quote\'', $q), "\n";

}

test(true);
test(false);
test(false, false);

