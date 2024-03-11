<!DOCTYPE html>
<html>
<head>
    <title>Calcolo MCD e MCM</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }

        h1 {
            background-color: #333;
            color: #fff;
            padding: 20px;
            margin: 0;
        }

        .container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        p {
            font-size: 18px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Calcolo MCD e MCM</h1>

    <div class="container">
        <form method="post" action="">
            <label for="numero1">Inserisci il primo numero intero:</label>
            <input type="text" name="numero1" required>
            <br>
            <label for="numero2">Inserisci il secondo numero intero:</label>
            <input type="text" name="numero2" required>
            <br>
            <button type="submit" name="calcola">Calcola MCD e MCM</button>
        </form>

        <?php
        if (isset($_POST['calcola'])) {

            $numero1 = intval($_POST['numero1']);
            $numero2 = intval($_POST['numero2']);

            if($numero2 != $numero1) {
        
                    function mcd($a, $b) {
                        while ($b != 0) {
                            $temp = $b;
                            $b = $a % $b;
                            $a = $temp;
                        }
                        return $a;
                    }
        
                    $mcd = mcd($numero1, $numero2);
                    $mcm = ($numero1 * $numero2) / $mcd;
        
                    echo "<p>Il Massimo Comune Divisore (MCD) di $numero1 e $numero2 e': $mcd</p>";
                    echo "<p>Il Minimo Comune Multiplo (MCM) di $numero1 e $numero2 e': $mcm</p>";
                } else  {
                    echo "<p>Devi inserire due numeri diversi</p>";
                }
            } 
        ?>
    </div>
</body>
</html>
