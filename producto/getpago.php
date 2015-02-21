<?php

$texto = "";
foreach ($_POST as $nombre => $valor) {
    $texto.="$nombre : $valor\n";
}
$texto.="********************************\n";
file_put_contents("log.txt", $texto, FILE_APPEND);

$req = 'cmd=_notify-validate';
foreach ($_POST as $clave => $valor) {
    $valor = urlencode(stripslashes($valor));
    $req .= "&$clave=$valor";
}
$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Host: www.sandbox.paypal.com\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
$fp = fsockopen('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);
if (!$fp) {//error de conexión
} else {
    fputs($fp, $header . $req);
    while (!feof($fp)) {
        $res = fgets($fp, 1024);
        if (strcmp($res, "VERIFIED") == 0) { //OK
        } else if (strcmp($res, "INVALID") == 0) { //ERROR
        }
    }
    fclose($fp);
}