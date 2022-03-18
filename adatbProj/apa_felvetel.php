<?php
include_once("fuggvenyek.php");

$v_név = $_POST['név'];
$v_apja_szig_szám = $_POST['apja_szig_szám'];


if(isset($v_név) && isset($v_apja_szig_szám)) {
	apuka_beszur($v_név, $v_apja_szig_szám);
	header("Location: felvetel.html");
} else {
	error_log("Nincs beállítva valamely érték");
}
?>