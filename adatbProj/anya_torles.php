<?php
	$conn = mysqli_connect('localhost', 'root','') or die("Hibás csatlakozás!");

	mysqli_query($conn, 'SET NAMES UTF-8');
    mysqli_query($conn, "SET character_set_results=utf8");
    mysqli_set_charset($conn, 'utf-8');

    echo '<h2>Anyja tábla adatai törlése:</h2>';

    if(mysqli_select_db($conn, 'családfa')) {
        if(isset($_POST['hidden'])) {

            $stmt = "DELETE FROM `anyja` WHERE `anyja`.`anyja_szig_szám` = '$_POST[hidden]'";
            mysqli_query($conn, $stmt);
        }

    	$sql = "SELECT név, anyja_szig_szám FROM anyja";
    	$res = mysqli_query($conn, $sql) or die ('Hibás utasítás!');

        echo '<table border=1>';
        echo '<tr>';
        echo '<th>Név</th>';
        echo '<th>Anyja Szig. száma</th>';
        echo '</tr>';

    	while(($current_row = mysqli_fetch_assoc($res))!=null) {
            echo '<tr>';
            echo '<td>' . $current_row['név'] . ' </td>';
            echo '<td>' . $current_row["anyja_szig_szám"] . ' </td>';
            echo '<td>
            <form method="POST" action="anya_torles.php">
                        <input type="hidden" name="hidden" value="'.$current_row["anyja_szig_szám"].'"/>
                        <input type="submit" name="torles" value="Anya törlése" />
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