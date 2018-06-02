<?php

$phrase = $_GET["texte"] ?? "";

$phrase_en_minuscule = strtolower($phrase);
$caracteres = str_split($phrase_en_minuscule);
$stats = [];
foreach ($caracteres as $lettre) {
    if(array_key_exists($lettre, $stats)) {
        // incrementation
        $stats[$lettre] += 1;
    } else {
        // ajout de la clé avec 1 en valeur
        $stats[$lettre] = 1;
    }
}

ksort($stats); // voir les autres fonctions de tri

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stats</title>
</head>
<body>
    <h2>Version fonction utilisateur</h2>
    <pre>
    <?php print_r($stats) ?>
    </pre>
    <h2>Version fonction interne php</h2>
    <pre>
    <?php
    print_r(count_chars($phrase, 1));
    ?>
    </pre>
    <?php
    foreach (count_chars(strtolower($phrase), 1) as $key => $value) {
        echo chr($key) . " : " . $value . "<br>";
    }
    ?>
</body>
</html>