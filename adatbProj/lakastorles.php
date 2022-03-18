<?php
	$conn = mysqli_connect('localhost', 'root','') or die("Hibás csatlakozás!");

	mysqli_query($conn, 'SET NAMES UTF-8');
    mysqli_query($conn, "SET character_set_results=utf8");
    mysqli_set_charset($conn, 'utf-8');

    echo '<h2>Lakás tábla adatainak törlése:</h2>';

    if(mysqli_select_db($conn, 'családfa')) {
            if(isset($_POST['hidden'])) {

                $stmt = "DELETE FROM `lakás` WHERE `lakás`.`lid` = '$_POST[hidden]'";
                mysqli_query($conn, $stmt);
            }

        	$sql = "SELECT ir_szám, város, utca, házszám, lid FROM lakás";
        	$res = mysqli_query($conn, $sql) or die ('Hibás utasítás!');

            echo '<table border=1>';
            echo '<tr>';            // táblázat fejléce
            echo '<th>Irányító szám</th>';
            echo '<th>Város</th>';
            echo '<th>utca</th>';
            echo '<th>házszám</th>';
            echo '<th>Lakás id</th>';

            echo '</tr>';

        	while(($current_row = mysqli_fetch_assoc($res))!=null) {
                echo '<tr>';
                echo '<td>' . $current_row['ir_szám'] . ' </td>';
                echo '<td>' . $current_row['város'] . ' </td>';
                echo '<td>' . $current_row['utca'] . ' </td>';
                echo '<td>' . $current_row['házszám'] . ' </td>';
                echo '<td>' . $current_row['lid'] . ' </td>';
                echo '<td>
                <form method="POST" action="lakastorles.php">
                            <input type="hidden" name="hidden" value="'.$current_row['lid'].'"/>
                            <input type="submit" name="torles" value="lakás törlése" />
                </form></td>';
                echo '</tr>';
        	}
            echo '</table>';

        	mysqli_free_result($res);
        } else {
        	die('Nem sikerült csatlakozni az adatábzishoz');
        }
         mysqli_close($conn);
?>