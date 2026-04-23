<!DOCTYPE html>
<html lang="en">
    <head>
        <title>PRAK201</title>
    </head>
    <body>
        <form method="POST" action="">
            <label>Nama: 1 <input type="text" name="name1" required></label>
            <br>
            <label>Nama: 2 <input type="text" name="name2" required></label>
            <br>
            <label>Nama: 3 <input type="text" name="name3" required></label>
            <br>
            <button type="submit" name="submit">Urutkan</button>
        </form>
        <br>

        <?php
        if (isset($_POST['submit'])) {
            $name1 = $_POST['name1'];
            $name2 = $_POST['name2'];
            $name3 = $_POST['name3'];

            if ($name1 < $name2 && $name1 < $name3) {
                if ($name2 < $name3) { 
                    $result = [$name1, $name2, $name3];
                    }
                else { 
                    $result = [$name1, $name3, $name2];
                    }
                }
            elseif ($name2 < $name1 && $name2 < $name3) {
                if ($name1 < $name3) { 
                    $result = [$name2, $name1, $name3];
                    }
                else { 
                    $result = [$name2, $name3, $name1];
                    }
                }
            else {
                if ($name1 < $name2) {
                    $result = [$name3, $name1, $name2];
                    }
                else {
                    $result = [$name3, $name2, $name1];
                    }
            }
    
            echo "<b>Output:</b> <br>";
            foreach ($result as $name) {
                echo htmlspecialchars($name) . "<br>";
            }
        }
        ?>
    </body>
</html>
