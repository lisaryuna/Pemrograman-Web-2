<!DOCTYPE html>
<html lang="in">
    <head>
        <title>PRAK305</title>
    </head>
    <body>
        <form action="" method="POST">
            <input type="number" name="string" required><br>
            <button type="submit" name="submit">Submit</button>
        </form>
        <?php 
        if(isset($_POST['submit'])) {
            $string = $_POST['string'];
            $panjang = strlen($string);

            echo "<h3>Input: </h3>";
            echo "$string";
            echo "<h3>Output: </h3>";

            for ($i = 0; $i < $panjang; $i++) {
                $char = $string[$i];

                for ($j = 0; $j < $panjang; $j++) {
                    if ($j == 0) {
                        echo strtoupper($char);
                    } else {
                        echo strtolower($char);
                    }
                }
            }
        }
        ?>
    </body>
</html>