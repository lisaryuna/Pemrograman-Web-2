<!DOCTYPE html>
<html>
    <head>
        <title>PRAK401</title>
    </head>
    <body>
        <?php 
        $panjang = "";
        $lebar = "";
        $nilai = "";

        if(isset($_POST["cetak"]))
        {
            $panjang = $_POST["panjang"];
            $lebar = $_POST["lebar"];
            $nilai = $_POST["nilai"];
        }
        ?>

        <form method="POST">
            Panjang: <input type="number" name="panjang" value="<?= $panjang ?>"><br>
            Lebar: <input type="number" name="lebar" value="<?= $lebar ?>"><br>
            Nilai: <input type="text" name="nilai" value="<?= $nilai ?>"><br>
            <button type="submit" name="cetak">Cetak</button>
        </form>

        <?php 
        if(isset($_POST["cetak"])) {
            $arr_nilai = explode(" ", $nilai);

            if(count($arr_nilai) == ($panjang * $lebar)) {
                echo "<table border='1' cellpadding='5' cellspacing='0'>";
                $index = 0;
                for($i = 0; $i < $panjang; $i++) {
                    echo "<tr>";
                    for($j = 0; $j < $lebar; $j++) {
                        echo "<td>" . $arr_nilai[$index] . "</td>";
                        $index++;
                    }
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "Panjang nilai tidak sesuai dengan ukuran matriks.";
            }
        }
        ?>
    </body>
</html>