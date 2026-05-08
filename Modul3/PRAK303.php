<!DOCTYPE html>
<html lang="in">
    <head>
        <title>PRAK303</title>
    </head>
    <body>
        <form action="" method="POST">
            Batas Bawah: <input type="number" name="bawah" required><br>
            Batas Atas: <input type="number" name="atas" required><br>
            <button type="submit" name="submit">Cetak</button>
        </form>

        <?php 
        if(isset($_POST['submit'])) {
            $bawah = $_POST['bawah'];
            $atas = $_POST['atas'];
            $star_url = "star.png";

            do {
                if(($bawah + 7) % 5 == 0) {
                    echo "<img src='" . $star_url . "' width='15px' height='15px'>";
                } else {
                    echo $bawah . " ";
                }
                $bawah++;
            } while($bawah <= $atas);
        }
        ?>
    </body>
</html>