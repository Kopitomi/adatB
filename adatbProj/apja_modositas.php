<?php
	$conn = mysqli_connect('localhost', 'root','') or die("Hibás csatlakozás!");

	mysqli_query($conn, 'SET NAMES UTF-8');
    mysqli_query($conn, "SET character_set_results=utf8");
    mysqli_set_charset($conn, 'utf-8');

    if(mysqli_select_db($conn, 'családfa')) {
        if(isset($_POST['update'])) {
            $v_név = $_POST['név'];
            $v_apja_szig_szám = $_POST['apja_szig_szám'];
            $hidden = $_POST['hidden'];

            $stmt = "UPDATE `apja` SET `név` = '$v_név', `apja_szig_szám` = '$v_apja_szig_szám' WHERE `apja`.`apja_szig_szám` = '$_POST[hidden]';";
            mysqli_query($conn, $stmt);
        }

    	$sql = "SELECT név, apja_szig_szám FROM apja";
    	$res = mysqli_query($conn, $sql) or die ('Hibás utasítás!');

        echo '<table border=1>';
        echo '<tr>';            // táblázat fejléce
        echo '<th>Név</th>';
        echo '<th>Apja Szig. száma</th>';
        echo '</tr>';

    	while(($current_row = mysqli_fetch_assoc($res))!=null) {
            echo '<form method="POST" action="apja_modositas.php">';
    		echo '<tr>';
            echo '<td>' . '<input type="text" name="név" value="' . $current_row['név'] . '" </td>';
            echo '<td>' . '<input type=text name="apja_szig_szám" value=' . $current_row["apja_szig_szám"] . ' </td>';
            echo '<td> <input type=hidden name=hidden value=' . $current_row["apja_szig_szám"] . ' />
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