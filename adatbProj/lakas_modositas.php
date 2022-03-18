<?php
	$conn = mysqli_connect('localhost', 'root','') or die("Hibás csatlakozás!");

	mysqli_query($conn, 'SET NAMES UTF-8');
    mysqli_query($conn, "SET character_set_results=utf8");
    mysqli_set_charset($conn, 'utf-8');

    if(mysqli_select_db($conn, 'családfa')) {
        if(isset($_POST['update'])) {
            $v_ir_szam = $_POST['ir_szám'];
            $v_város = $_POST['város'];
            $v_utca = $_POST['utca'];
            $v_házszám = $_POST['házszám'];
            $v_lid = $_POST['lid'];
            $hidden = $_POST['hidden'];

            $stmt = "UPDATE `lakás` SET `ir_szám` = '$v_ir_szam', `város` = '$v_város',`utca` = '$v_utca' ,`házszám` = '$v_házszám' ,`lid` = '$v_lid'  WHERE `lakás`.`lid` = '$_POST[hidden]'";
            mysqli_query($conn, $stmt);
        }

    	$sql = "SELECT * FROM lakás";
    	$res = mysqli_query($conn, $sql) or die ('Hibás utasítás!');

        echo '<table border=1>';
        echo '<tr>';
        echo '<th>Ir szám</th>';
        echo '<th>Város</th>';
        echo '<th>Utca</th>';
        echo '<th>Házszám</th>';
        echo '<th>Lakás id</th>';
        echo '</tr>';

    	while(($current_row = mysqli_fetch_assoc($res))!=null) {
            echo '<form method="POST" action="lakas_modositas.php">';
    		echo '<tr>';
            echo '<td>' . '<input type="text" name="ir_szám" value="' . $current_row['ir_szám'] . '" </td>';
            echo '<td>' . '<input type=text name="város" value="' . $current_row['város'] . '" </td>';
            echo '<td>' . '<input type=text name="utca" value="' . $current_row['utca'] . '" </td>';
            echo '<td>' . '<input type=text name="házszám" value=' . $current_row['házszám'] . ' </td>';
            echo '<td>' . '<input type=text name="lid" value=' . $current_row['lid'] . ' </td>';
            echo '<td> <input type=hidden name=hidden value=' . $current_row['lid'] . ' />
            <input type=submit name=update value=update />
            </td>';
            echo '</form>';
            echo '</tr>';
    	}
        echo '</table>';

    	mysqli_free_result($res);
    } else {
    	die('Nem sikerült csatlakozni az adatábzishoz');
    }
    mysqli_close($conn);
?>