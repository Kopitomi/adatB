<?php
	$conn = mysqli_connect('localhost', 'root','') or die("Hibás csatlakozás!");

	mysqli_query($conn, 'SET NAMES UTF-8');
    mysqli_query($conn, "SET character_set_results=utf8");
    mysqli_set_charset($conn, 'utf-8');

    if(mysqli_select_db($conn, 'családfa')) {
        if(isset($_POST['update'])) {
            $v_dátum = $_POST['dátum'];
            $v_alkalom_neve = $_POST['alkalom_neve'];
            $hidden = $_POST['hidden'];

            $stmt = "UPDATE `esemény` SET `dátum` = '$v_dátum', `alkalom_neve` = '$v_alkalom_neve' WHERE `esemény`.`alkalom_neve` = '$_POST[hidden]'";
            mysqli_query($conn, $stmt);
        }

    	$sql = "SELECT dátum, alkalom_neve FROM esemény";
    	$res = mysqli_query($conn, $sql) or die ('Hibás utasítás!');

        echo '<table border=1>';
        echo '<tr>';
        echo '<th>Dátum</th>';
        echo '<th>alkalom neve</th>';
        echo '</tr>';

    	while(($current_row = mysqli_fetch_assoc($res))!=null) {
            echo '<form method="POST" action="esemeny_modositas.php">';
    		echo '<tr>';
            echo '<td>' . '<input type="text" name="dátum" value="' . $current_row['dátum'] . '" </td>';
            echo '<td>' . '<input type=text name="alkalom_neve"" value="' . $current_row["alkalom_neve"] . '" </td>';
            echo '<td> <input type=hidden name=hidden value=' . $current_row["alkalom_neve"] . ' />
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