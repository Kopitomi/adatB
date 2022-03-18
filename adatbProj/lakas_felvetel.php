<?php
include_once("fuggvenyek.php");

$v_ir_szám = $_POST['ir_szám'];
$v_város = $_POST['város'];
$v_utca = $_POST['utca'];
$v_házszám = $_POST['házszám'];
$v_lid = $_POST['lid'];

if(isset($v_ir_szám) && isset($v_város) && isset($v_utca) && isset($v_házszám) && isset($v_lid)) {
	lakas_beszur($v_ir_szám, $v_város, $v_utca, $v_házszám, $v_lid);
	header("Location: felvetel.html");
} else {
	error_log("Nincs beállítva valamely érték");
}
?>