<?php
include('adodb.inc.php');
include('adodb-xmlschema03.inc.php');

$db = ADONewConnection('mysqli');
$db->connect('localhost', 'root', 'C0yote71', 'apecove');
$xml = new adoSchema($db);
print $xml->extractSchema();

