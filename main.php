<?php

// ce code vous montre comment exécuter du SQL via du PHP
// pour notamment : 
// - extraire des données d'une base
// - insérer de nouvelles lignes manuellement
// - insérer de nouvelles lignes depuis un .csv
// Mais aussi :
// - générer de fausses données

require_once "vendor/autoload.php";
require_once "read_database.php";
require_once "write_database.php";
require_once "generate_data.php";

// on se connecte à la base PostgreSQL
// penser bien à modifier les infos host/dbname/user/password 
// suivant votre base de données
$dbconn = pg_connect("host=localhost dbname=jwheatp user=jwheatp")
    or die('Could not connect: ' . pg_last_error());

// lire des données
read_query($dbconn);

echo "\n\n";

// générer une personne
echo "Fausse personne : \n";
$person = generate_fake_person();

echo implode(", ", $person);

echo "\n\n";

// générer des cartes de crédit
echo "Fausses cartes de crédit : \n";
for($i = 0; $i < 10 ; $i++) {
    $card = generate_fake_credit_card();
    echo implode(", ", $card);
    echo "\n";
}

// mettre à jour une base de données
// insert_data($dbconn);

// nécessite de créer la table velibs avant, voir velibs.sql
// insert_data_from_csv($dbconn);

// important : fermer la connection
pg_close($dbconn);
?>