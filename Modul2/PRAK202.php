<!DOCTYPE html>
<html lang="en">
    <head>
        <title>PRAK202</title>
        <style>
            .error {
                color: red;
            }
        </style>
    </head>
    <body>
        <?php
        $messageName = $messageNim = $MessageGender = "";
        $name = $nim = $gender = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $messageName = "Nama tidak boleh kosong";
            } else {
                $name = $_POST["name"];
            }

            if (empty($_POST["nim"])) {
                $messageNim = "NIM tidak boleh kosong";
            } else {
                $nim = $_POST["nim"];
            }

            if (empty($_POST["gender"])) {
                $MessageGender = "Jenis kelamin tidak boleh kosong";
            } else {
                $gender = $_POST["gender"];
            }
        }
        ?>

        <form method="POST" action="">
            <label>Nama: <input type="text" name="name" value="<?= htmlspecialchars($name) ?>"></label>
            <span class="error">* <?= $messageName ?></span> <br>

            <label>NIM: <input type="text" name="nim" value="<?= htmlspecialchars($nim) ?>"></label>
            <span class="error">* <?= $messageNim ?></span> <br>

            <label>Jenis Kelamin: <span class="error">* <?= $MessageGender ?></span></label><br>
            <label><input type="radio" name="gender" value="Laki-laki" <?= ($gender == "Laki-laki") ? "checked" : "" ?>> Laki-laki</label><br>
            <label><input type="radio" name="gender" value="Perempuan" <?= ($gender == "Perempuan") ? "checked" : "" ?>> Perempuan</label><br>

            <button type="submit">Submit</button>
        </form>
        <br>

        <?php
        if (!empty($name) && !empty($nim) && !empty($gender)) {
            echo "<b>Output:</b><br>";
            echo htmlspecialchars($name) . "<br>";
            echo htmlspecialchars($nim) . "<br>";
            echo htmlspecialchars($gender) . "<br>";
        }
        ?>
    </body>
</html>