<?php

// wc (word count) : https://fr.wikipedia.org/wiki/Wc_(Unix)
// créer un script php pour saisir un texte puis
// calculer et afficher le nombre de caractères, de mots, de lignes du texte
// calculer et afficher le nombre d'occurrence de chaque caractère du texte ; trie par valeur et trie par clé 

$texte = $_POST['texte'] ?? '';
$nombre_de_lignes = 0;
$nombre_de_caracteres = 0;
$nombre_de_mots = 0;

$nombre_de_caracteres = strlen(str_replace(array("\n", "\r\n", "\r"), '', $texte));
$nombre_de_mots = str_word_count($texte);

if(empty($texte)) {
    $nombre_de_lignes = 0;
} else {
    $result = explode("\r\n", $texte); // attention ! mettre des "" pour les caractères spéciaux...
    $nombre_de_lignes = count($result);
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>wc</title>
</head>
<body>
    <h1>WC (Word Count)</h1>
    <form action="index.php" method="POST">
        <textarea name="texte" cols="40" rows="4"><?= $texte ?></textarea>
        <input type="submit" value="Calculer">
    </form>
    <p>nombre de caractères : <?= $nombre_de_caracteres ?></p>
    <p>nombre de mots : <?= $nombre_de_mots ?></p>
    <p>nombre de lignes : <?= $nombre_de_lignes ?></p>

    <a href="stats.php?texte=<?= $texte?>">voir les stats du texte</a> 

</body>
</html>
