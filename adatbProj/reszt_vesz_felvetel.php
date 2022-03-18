<?php
include_once("fuggvenyek.php");

$v_alkalom_neve = $_POST['alkalom_neve'];
$v_szemely_szig_szám = $_POST['szemely_szig_szám'];


if(isset($v_alkalom_neve) && isset($v_szemely_szig_szám)) {
	reszvetel_beszur($v_alkalom_neve, $v_szemely_szig_szám);
	header("Location: felvetel.html");
} else {
	error_log("Nincs beállítva valamely érték");
}
?>