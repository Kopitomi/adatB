<?php
include_once("fuggvenyek.php");

$v_lako_szig_szám = $_POST['lako_szig_szám'];
$v_lid = $_POST['lid'];


if(isset($v_lako_szig_szám) && isset($v_lid)) {
	lakik_beszur($v_lako_szig_szám, $v_lid);
	header("Location: felvetel.html");
} else {
	error_log("Nincs beállítva valamely érték");
}
?>