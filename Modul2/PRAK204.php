<!DOCTYPE html>
<html lang="en">
    <head>
        <title>PRAK204</title>
    </head>
    <body>
        <form method="POST" action="">
            <label>Nilai: <input type="number" name="value" min="0" required></label>
            <br>
            <button type="submit" name="submit">Konversi</button>
        </form>
        <br>

        <?php
        if (isset($_POST['submit'])) {
            $value = (int)$_POST['value'];
            $result = "";

            if ($value == 0) {
                $result = "Nol";
            } elseif ($value > 0 && $value < 10) {
                $result = "Satuan";
            } elseif ($value >= 10 && $value < 20) {
                $result = "Belasan";
            } elseif ($value >= 20 && $value < 100) {
                $result = "Puluhan";
            } elseif ($value == 100) {
                $result = "Anda Menginput Melebihi Limit Bilangan";
            }
            elseif ($value > 100 && $value < 1000) {
                $result = "Ratusan";
            } elseif ($value >= 1000 && $value < 10000) {
                $result = "Ribuan";
            } else {
                $result = "Nilai terlalu besar";
            } 

            echo "<b>Hasil:</b><br>" . $result;
        }
        ?>
    </body>
</html>
