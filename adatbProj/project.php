<?php
    echo '<h1>Családfa</h1>';

    $conn = mysqli_connect('localhost', 'root','') or die("Hibás csatlakozás!");

    mysqli_query($conn, 'SET NAMES UTF-8');
    mysqli_query($conn, "SET character_set_results=utf8");
    mysqli_set_charset($conn, 'utf8');
         
    if ( mysqli_select_db($conn, 'családfa') ) {

        echo '1.Lekérdezés';
        echo '<br>';
        $sql = "SELECT anyja.név, COUNT(anyja.anyja_szig_szám)
        FROM személy, anyja
        WHERE személy.anyja_szig_szama = anyja.anyja_szig_szám
        GROUP BY anyja_szig_szama";
        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!');

        echo '<table border=1>';
        echo '<tr>';
        echo '<th>Anyja neve</th>';
        echo '<th>Gyerekeinek száma</th>';
        echo '</tr>';


        while ( ($current_row = mysqli_fetch_assoc($res))!= null) {
            echo '<tr>';
            echo '<td>' . $current_row["név"] . '</td>';
            echo '<td>' . $current_row["COUNT(anyja.anyja_szig_szám)"] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '<br>';

        echo '2.Lekérdezés';
        echo '<br>';
        $sql = "SELECT név, város, utca, házszám, ir_szám FROM lakik, személy, lakás WHERE lakik.lako_szig_szám = személy.szig_szám AND lakik.lid = lakás.lid"; // ez csak egy string, még nem hajtódik végre
        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!');

        echo '<table border=1>';
        echo '<tr>';
        echo '<th>Név</th>';
        echo '<th>Irányító száma</th>';
        echo '<th>Város</th>';
        echo '<th>Utca</th>';
        echo '<th>Házszám</th>';
        echo '</tr>';

        while ( ($current_row = mysqli_fetch_assoc($res))!= null) {
            echo '<tr>';
            echo '<td>' . $current_row["név"] . '</td>';
            echo '<td>' . $current_row["ir_szám"] . '</td>';
            echo '<td>' . $current_row["város"] . '</td>';
            echo '<td>' . $current_row["utca"] . '</td>';
            echo '<td>' . $current_row["házszám"] . '</td>';
            echo '</tr>';
        }
        echo '</table>';

        echo '<br>';
        echo '3.Lekérdezés';
        echo '<br>';
        $sql ="SELECT esemény.alkalom_neve, esemény.dátum
        FROM személy, részt_vesz, esemény
        WHERE részt_vesz.alkalom_neve = esemény.alkalom_neve
        AND részt_vesz.személy_szig_szám = személy.szig_szám
        /*AND esemény.alkalom_neve = 'Karácsony'*/
        AND szig_szám = (SELECT szig_szám FROM személy WHERE szuletesi_datum = '1967-01-12')";
        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!');

        echo '<table border=1>';
        echo '<tr>';
        echo '<th>Név</th>';
         echo '<th>Dátuma</th>';
        echo '</tr>';

        while ( ($current_row = mysqli_fetch_assoc($res))!= null) {
            echo '<tr>';
            echo '<td>' . $current_row["alkalom_neve"] . '</td>';
            echo '<td>' . $current_row["dátum"] . '</td>';
            echo '</tr>';
        }
        echo '</table>';


        echo '<br>';


            echo 'Személy tábla';
            echo '<br>';
            $sql = "SELECT * FROM személy";
            $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!');

            echo '<table border=1>';
            echo '<tr>';
            echo '<th>Név</th>';
            echo '<th>Szig szám</th>';
            echo '<th>Anyja Szig száma</th>';
            echo '<th>Apja Szig száma</th>';
            echo '<th>Születési dátum</th>';
            echo '</tr>';

            while ( ($current_row = mysqli_fetch_assoc($res))!= null) {
                echo '<tr>';
                echo '<td>' . $current_row["név"] . '</td>';
                echo '<td>' . $current_row["szig_szám"] . '</td>';
                echo '<td>' . $current_row["anyja_szig_szama"] . '</td>';
                echo '<td>' . $current_row["apja_szig_szama"] . '</td>';
                echo '<td>' . $current_row["szuletesi_datum"] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
            echo '<br>';

        echo 'Esemény tábla';
                    echo '<br>';
                    $sql = "SELECT * FROM esemény";
                    $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!');

                    echo '<table border=1>';
                    echo '<tr>';
                    echo '<th>Dátum</th>';
                    echo '<th>Alkalom Neve</th>';

                    echo '</tr>';

                    while ( ($current_row = mysqli_fetch_assoc($res))!= null) {
                        echo '<tr>';
                        echo '<td>' . $current_row["dátum"] . '</td>';
                        echo '<td>' . $current_row["alkalom_neve"] . '</td>';

                        echo '</tr>';
                    }
                    echo '</table>';
                    echo '<br>';

        echo 'Lakás tábla';
                    echo '<br>';
                    $sql = "SELECT * FROM lakás";
                    $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!');

                    echo '<table border=1>';
                    echo '<tr>';
                    echo '<th>Irányító szám</th>';
                    echo '<th>Város</th>';
                    echo '<th>utca</th>';
                    echo '<th>házszám</th>';
                    echo '<th>Lakás Id</th>';
                    echo '</tr>';

                    while ( ($current_row = mysqli_fetch_assoc($res))!= null) {
                        echo '<tr>';
                        echo '<td>' . $current_row["ir_szám"] . '</td>';
                        echo '<td>' . $current_row["város"] . '</td>';
                        echo '<td>' . $current_row["utca"] . '</td>';
                        echo '<td>' . $current_row["házszám"] . '</td>';
                        echo '<td>' . $current_row["lid"] . '</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                    echo '<br>';

            mysqli_free_result($res);
    } else {
        die('Nem sikerült csatlakozni az adatbázishoz.');
    }
    echo '<br>';
    echo 'Részt vesz tábla';
                        echo '<br>';
                        $sql = "SELECT név, esemény.alkalom_neve FROM személy, részt_vesz, esemény WHERE személy.szig_szám = részt_vesz.személy_szig_szám AND esemény.alkalom_neve = részt_vesz.alkalom_neve";
                        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!');

                        echo '<table border=1>';
                        echo '<tr>';
                        echo '<th>Alkalom Neve</th>';
                        echo '<th>Résztvevő</th>';
                        echo '</tr>';

                        while ( ($current_row = mysqli_fetch_assoc($res))!= null) {
                            echo '<tr>';
                            echo '<td>' . $current_row["alkalom_neve"] . '</td>';
                            echo '<td>' . $current_row["név"] . '</td>';

                            echo '</tr>';
                        }
                        echo '</table>';
                        echo '<br>';
 
    mysqli_close($conn);
 
?>
