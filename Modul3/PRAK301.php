<!DOCTYPE html>
<html lang="in">
    <head>
        <title>PRAK301</title>
    </head>
    <body>
        <form action="" method="POST">
            Jumlah Peserta: <input type="number" name="jumlah" min="1" required>
            <br>
            <button type="submit" name="submit">Cetak</button>
        </form>

        <?php 
        if(isset($_POST['submit'])) {
            $jumlah = $_POST['jumlah'];
            $i = 1;

            while($i <= $jumlah) {
                if ($i % 2 == 1) {
                    $warna = "red";
                } else {
                    $warna = "green";
                }

                echo "<h2 style='color: $warna;'>Peserta ke-$i</h2>";
                $i++;
            }
        }
        ?>
    </body>
</html>