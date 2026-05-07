<!DOCTYPE html>
<html lang="in">
    <head>
        <title>PRAK302</title>
    </head>
    <body>
        <form action="" method="POST">
            Tinggi: <input type="number" name="tinggi" required><br>
            Alamat Gambar: <input type="url" name="alamat" required><br>
            <button type="submit">Cetak</button>
        </form>
        <?php
        if(isset($_POST['submit'])) {
            $tinggi = $_POST['tinggi'];
            $alamat = $_POST['alamat'];
            $i = 0;

            while($i <= $tinggi) {
                $j = 0;

                while($j < $i) {
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    $j++;
                }

                $k = 0;
                while($k < ($tinggi - $i)) {
                    echo "<img src='" . $alamat . "' width='20px' height='20px'>";
                    $k++;
                }
                echo "<br>";
                $i++;
            }
        }
        ?>
    </body>
</html>