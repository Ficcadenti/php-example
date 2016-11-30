<?php
include 'adodb.inc.php';

function test_adodb() {
    $authdb = ADONewConnection('oci8po');
    $authdb->debug = true;

    $authdb->Connect('', 'system', 'oracle', '//localhost:1521/XE', true);
    $authdb->SetFetchMode(ADODB_FETCH_ASSOC);

    $rs = $authdb->Execute('SELECT * from user_tables');

    if ($rs) {
        $fields = $rs->GetArray();
        $rs->close();
    }

    $authdb->Close();
}

$tests = 10;
while ($tests > 0) {
    test_adodb();
    $tests--;
}
