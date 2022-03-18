<?php
include_once("fuggvenyek.php");

$v_név = $_POST['név'];
$v_szig_szám = $_POST['szig_szám'];
$v_anyja_szig_szám = $_POST['anyja_szig_szama'];
$v_apja_szig_szám = $_POST['apja_szig_szama'];
$v_szuletesi_datum = $_POST['szuletesi_datum'];


if(isset($v_név) && isset($v_szig_szám) && isset($v_anyja_szig_szám) && isset($v_apja_szig_szám) && isset($v_szuletesi_datum)) {
	szemely_beszur($v_név, $v_szig_szám, $v_anyja_szig_szám, $v_apja_szig_szám, $v_szuletesi_datum);
	header("Location: felvetel.html");
} else {
	error_log("Nincs beállítva valamely érték");
}
?>