<?php

// comment insérer des données manuellement
function insert_data($dbconn) {
    // on écrit la requête pour insérer une nouvelle ligne
    $query = "INSERT INTO person VALUES(990183, 'Luke Skywalker', 918381, 781, 'Tatooine', 18291)";

    pg_query($dbconn, $query);
}

// comment insérer des données depuis un csv
function insert_data_from_csv($dbconn) {
    // j'ouvre mon csv
    $file = fopen("velibs.csv","r");

    // tant que je ne suis pas arrivé à la fin du fichier
    while ($row = fgetcsv($file)) 
    {
        // je crée un tableau avec les trois colonnes du fichier
        $values = array(
            "station_id" => $row[0],
            "station_name" => $row[1],
            "nb_available_bikes" => $row[2]
        );

        // et je les insères dans ma table 'velibs'
        pg_insert($dbconn, "velibs", $values);
    }
    
    fclose($file);
}

?>