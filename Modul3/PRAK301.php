<!DOCTYPE html>
<html lang="in">
    <head>
        <title>PRAK301</title>
    </head>
    <body>
        <form action="" method="POST">
            Jumlah Peserta: <input type="number" name="jumlah" min="1" required>
            <br>
            <button type="submit">Cetak</button>
        </form>

        <?php 
        if(isset($_POST['submit'])) {
            $jumlah = $_POST['jumlah'];
            $i = 1;

            while($i <= $jumlah) {
                echo "Peserta ke-" . $i . "<br>";
                $i++;
            }
        }
        ?>
    </body>
</html>