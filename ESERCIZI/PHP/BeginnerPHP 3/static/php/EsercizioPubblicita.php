<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Messaggio Pubblicitario Casuale</title>
</head>
<body>
    <div id="ad-container">
        <?php
        // Array di messaggi pubblicitari con URL delle pagine HTML
        $ads = [
            ['type' => 'html', 'content' => '../../EsercizioPubblicita/milan.html'],
            ['type' => 'html', 'content' => '../../EsercizioPubblicita/cambridge.html'],
            ['type' => 'html', 'content' => '../../EsercizioPubblicita/bari.html'],
            ['type' => 'text', 'content' => '<marquee behavior="scroll" direction="left">SALVE SIGNOR MIZZI, UN CALOROSO BENVENUTO DA MARCO PITEO</marquee>'],

        ];

        // Funzione per generare un numero casuale tra min e max
        function getRandomNumber($min, $max) {
            return rand($min, $max);
        }

        // Seleziona un messaggio pubblicitario casuale
        $randomIndex = getRandomNumber(0, count($ads) - 1);
        $randomAd = $ads[$randomIndex];

        if ($randomAd['type'] === 'html') {
            include($randomAd['content']);
        } else if ($randomAd['type'] === 'text') {
            echo '<p>' . $randomAd['content'] . '</p>';
        }
        ?>
    </div>
</body>
</html>
