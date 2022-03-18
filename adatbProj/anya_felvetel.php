<?php
include_once("fuggvenyek.php");

$v_név = $_POST['név'];
$v_anyja_szig_szám = $_POST['anyja_szig_szám'];


if(isset($v_név) && isset($v_anyja_szig_szám)) {
	anyuka_beszur($v_név, $v_anyja_szig_szám);
	header("Location: felvetel.html");
} else {
	error_log("Nincs beállítva valamely érték");
}
?>