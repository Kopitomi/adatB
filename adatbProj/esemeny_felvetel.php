<?php
include_once("fuggvenyek.php");

$v_alkalom_nev = $_POST['alkalom_neve'];
$v_dátum = $_POST['dátum'];



if(isset($v_alkalom_nev) && isset($v_dátum)) {
	esemeny_beszur($v_alkalom_nev, $v_dátum);
	header("Location: felvetel.html");
} else {
	error_log("Nincs beállítva valamely érték");
}
?>