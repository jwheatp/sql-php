<?php

// ceci est un exemple de comment on peut lancer une requête SQL
// depuis un script PHP et en extraire des données.
// à vous de vous en inspirer pour l'utiliser si besoin dans votre projet

function read_query($dbconn) {
    // j'écris ma requête
    $query = "SELECT * FROM person LIMIT 5";

    // j'exécute la requête
    $result = pg_query($dbconn, $query) or die('Query failed: ' . pg_last_error());

    // je récupère les données
    $data = pg_fetch_all($result);

    // pour chaque ligne dans mon tableau data
    foreach($data as $line) {
        // j'affiche chaque ligne de résultat
        // la fonction implode permet de d'afficher le tableau $line
        // sous forme de texte où les éléments sont séparés
        // par des virgules

        echo implode( ", ", $line );
        echo "\n"; // retour à la ligne
    }

    // je peux faire ce que je veux ensuite : 
    // faire un traitement, exporter en csv etc.
}

?>