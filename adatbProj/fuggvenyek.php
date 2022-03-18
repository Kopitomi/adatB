<?php
function csaladfa_csatlakozas() {
	$conn = mysqli_connect("localhost", "root", "") or die("Csatlakozási hiba");
	if ( false == mysqli_select_db($conn, "családfa" )  ) {
		return null;
	}
	mysqli_query($conn, 'SET NAMES UTF-8');
	mysqli_query($conn, 'SET character_set_results=utf8');
	mysqli_set_charset($conn, 'utf-8');

	return $conn;
}
function anyuka_beszur($név, $anyja_szig_szám) {
	if ( !($conn = csaladfa_csatlakozas()) ) {
		echo "Nem sikerült csatlakozni";
	}
	$stmt = mysqli_prepare($conn, "INSERT INTO anyja(név, anyja_szig_szám) VALUES (?,?)");

	mysqli_stmt_bind_param($stmt, "ss",$név, $anyja_szig_szám);

	$sikeres = mysqli_stmt_execute($stmt);
	mysqli_close($conn);
	return $sikeres;
}
function apuka_beszur($név, $apja_szig_szám) {
	if ( !($conn = csaladfa_csatlakozas()) ) {
		echo "Nem sikerült csatlakozni";
	}
	$stmt = mysqli_prepare($conn, "INSERT INTO apja(név, apja_szig_szám) VALUES (?,?)");

	mysqli_stmt_bind_param($stmt, "ss",$név, $apja_szig_szám);

	$sikeres = mysqli_stmt_execute($stmt);
	mysqli_close($conn);
	return $sikeres;
}
function szemely_beszur($név, $szig_szám, $anyja_szig_szám, $apja_szig_szám, $szuletesi_datum) {
	if ( !($conn = csaladfa_csatlakozas()) ) {
		echo "Nem sikerült csatlakozni";
	}
	$stmt = mysqli_prepare($conn, "INSERT INTO személy(név, szig_szám, anyja_szig_szama, apja_szig_szama, szuletesi_datum) VALUES (?,?,?,?,?)");

	mysqli_stmt_bind_param($stmt, "ssssd",$név, $szig_szám, $anyja_szig_szám, $apja_szig_szám, $szuletesi_datum);

	$sikeres = mysqli_stmt_execute($stmt);
	mysqli_close($conn);
	return $sikeres;
}
function esemeny_beszur($alkalom_nev, $dátum) {
	if ( !($conn = csaladfa_csatlakozas()) ) {
		echo "Nem sikerült csatlakozni";
	}
	$stmt = mysqli_prepare($conn, "INSERT INTO esemény(alkalom_neve, dátum) VALUES (?,?)");

	mysqli_stmt_bind_param($stmt, "ss",$alkalom_nev, $dátum);

	$sikeres = mysqli_stmt_execute($stmt);
	mysqli_close($conn);
	return $sikeres;
}
function lakas_beszur($ir_szám, $város, $utca, $házszám, $lid) {
	if ( !($conn = csaladfa_csatlakozas()) ) {
		echo "Nem sikerült csatlakozni";
	}
	$stmt = mysqli_prepare($conn, "INSERT INTO lakás(ir_szám, város, utca, házszám, lid) VALUES (?,?,?,?,?)");

	mysqli_stmt_bind_param($stmt, "sssss",$ir_szám, $város, $utca, $házszám, $lid);

	$sikeres = mysqli_stmt_execute($stmt);
	mysqli_close($conn);
	return $sikeres;
}
function lakik_beszur($lako_szig_szám, $lid) {
	if ( !($conn = csaladfa_csatlakozas()) ) {
		echo "Nem sikerült csatlakozni";
	}
	$stmt = mysqli_prepare($conn, "INSERT INTO lakik(lako_szig_szám, lid) VALUES (?,?)");

	mysqli_stmt_bind_param($stmt, "ss",$lako_szig_szám, $lid);

	$sikeres = mysqli_stmt_execute($stmt);
	mysqli_close($conn);
	return $sikeres;
}
function reszvetel_beszur($alkalom_neve, $szemely_szig_szám) {
	if ( !($conn = csaladfa_csatlakozas()) ) {
		echo "Nem sikerült csatlakozni";
	}
	$stmt = mysqli_prepare($conn, "INSERT INTO részt_vesz(alkalom_neve, személy_szig_szám) VALUES (?,?)");

	mysqli_stmt_bind_param($stmt, "ss",$alkalom_neve, $szemely_szig_szám);

	$sikeres = mysqli_stmt_execute($stmt);
	mysqli_close($conn);
	return $sikeres;
}
?>