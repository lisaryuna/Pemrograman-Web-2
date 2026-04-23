<!DOCTYPE html>
<html lang="en">
    <head>
        <title>PRAK203</title>
    </head>
    <body>
        <?php
        $value = $from = $to = $result = "";

        if (isset($_POST['submit'])) {
            $value = (float)$_POST['value'];
            $from = $_POST['from'];
            $to = $_POST['to'];

            $celcius = $value;
            if ($from == "Fahrenheit") {
                $celcius = ($value - 32) * 5 / 9;
            } elseif ($from == "Reamur") {
                $celcius = $value * 5 / 4;
            } elseif ($from == "Kelvin") {
                $celcius = $value - 273.15;
            }

            if ($to == "Celcius") {
                $result = $celcius; $degree = "&deg;C";
            } elseif ($to == "Fahrenheit") {
                $result = ($celcius * 9 / 5) + 32; $degree = "&deg;F";
            } elseif ($to == "Reamur") {
                $result = $celcius * 4 / 5; $degree = "&deg;R";
            } elseif ($to == "Kelvin") {
                $result = $celcius + 273.15; $degree = "K";
            }
        }
        ?>

        <form method="POST" action="">
            <label>Nilai: <input type="number" step="any" name="value" value="<?= $value ?>" required></label><br><br>

            Dari:<br>
            <input type="radio" name="from" value="Celcius" <?= ($from == "Celcius") ? "checked" : "" ?> required> Celcius<br>
            <input type="radio" name="from" value="Fahrenheit" <?= ($from == "Fahrenheit") ? "checked" : "" ?>> Fahrenheit<br>
            <input type="radio" name="from" value="Reamur" <?= ($from == "Reamur") ? "checked" : "" ?>> Reamur<br>
            <input type="radio" name="from" value="Kelvin" <?= ($from == "Kelvin") ? "checked" : "" ?>> Kelvin<br><br>

            Ke:<br>
            <input type="radio" name="to" value="Celcius" <?= ($to == "Celcius") ? "checked" : "" ?> required> Celcius<br>
            <input type="radio" name="to" value="Fahrenheit" <?= ($to == "Fahrenheit") ? "checked" : "" ?>> Fahrenheit<br>
            <input type="radio" name="to" value="Reamur" <?= ($to == "Reamur") ? "checked" : "" ?>> Reamur<br>
            <input type="radio" name="to" value="Kelvin" <?= ($to == "Kelvin") ? "checked" : "" ?>> Kelvin<br><br>

            <button type="submit" name="submit">Konversi</button>
        </form>

        <?php if ($result !== ""): ?>
            <h3>Hasil Konversi: <?= number_format($result, 1)?> <?= $degree ?></h3>
        <?php endif; ?>
    </body>
</html>
