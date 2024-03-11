<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operazioni Bit a Bit</title>
</head>
<body>
    <h1>Operazioni Bit a Bit</h1>
    
    <form method="post" action="">
        <label for="numero">Inserisci un numero:</label>
        <input type="text" name="numero" id="numero">
        
        <p>Scegli un'operazione:</p>
        <input type="radio" name="operazione" value="shift-destro" id="shift-destro">
        <label for="shift-destro">Shift Destro</label>
        
        <input type="radio" name="operazione" value="shift-sinistro" id="shift-sinistro">
        <label for="shift-sinistro">Shift Sinistro</label>
        
        <input type="radio" name="operazione" value="not" id="not">
        <label for="not">NOT<br><br><br></label>
        
        <input type="submit" value="Calcola">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = $_POST["numero"];
        $operazione = $_POST["operazione"];
        
        // Converte il numero in binario
        $numeroBinario = decbin($numero);
        
        // Esegue l'operazione bit a bit
        switch ($operazione) {
            case "shift-destro":
                $risultato = $numero >> 1;
                break;
            case "shift-sinistro":
                $risultato = $numero << 1;
                break;
            case "not":
                $risultato = ~$numero;
                break;
            default:
                $risultato = "Seleziona un'operazione valida";
                break;
        }
        
        // Converte il risultato in binario
        $risultatoBinario = decbin($risultato);
        
        echo "<p>Risultato in binario: $risultatoBinario</p>";
    }
    ?>
</body>
</html>
