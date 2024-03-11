<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operazioni Logiche</title>
</head>
<body>
    <h1>Operazioni Logiche</h1>
    
    <form method="post" action="">
        <label for="numero1">Inserisci il primo numero:</label>
        <input type="text" name="numero1" id="numero1">
        
        <label for="numero2"><br><br>Inserisci il secondo numero:</label>
        <input type="text" name="numero2" id="numero2">
        
        <p>Scegli un'operazione logica:</p>
        <input type="radio" name="operazione" value="and" id="and">
        <label for="and">AND</label>
        
        <input type="radio" name="operazione" value="or" id="or">
        <label for="or">OR</label>
        
        <input type="radio" name="operazione" value="xor" id="xor">
        <label for="xor">XOR</label>
        
        <input type="submit" value="Calcola">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero1 = $_POST["numero1"];
        $numero2 = $_POST["numero2"];
        $operazione = $_POST["operazione"];
        
        // Converte i numeri in binario
        $numero1Binario = decbin($numero1);
        $numero2Binario = decbin($numero2);
        
        // Esegue l'operazione logica selezionata
        switch ($operazione) {
            case "and":
                $risultatoBinario = decbin($numero1 & $numero2);
                break;
            case "or":
                $risultatoBinario = decbin($numero1 | $numero2);
                break;
            case "xor":
                $risultato = $numero1 ^ $numero2;
                $risultatoBinario = decbin($risultato);
                break;
            default:
                $risultatoBinario = "Seleziona un'operazione valida";
                break;
        }
        
        echo "<p>Risultato in binario: $risultatoBinario</p>";
    }
    ?>
</body>
</html>
