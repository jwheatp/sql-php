<?php

function generate_fake_person() {
  // initialiser un Faker, un générateur de fausses données
  $faker = Faker\Factory::create();

  // génère un nom, email et adresse
  // d'autres champs peuvent être ajouter
  // voir : https://github.com/fzaninotto/Faker#basic-usage
  return array($faker->name,
               $faker->email,
               $faker->address);
}

function generate_fake_credit_card() {
  // initialiser un Faker, un générateur de fausses données
  $faker = Faker\Factory::create();

  // génère un nom, email et adresse
  // d'autres champs peuvent être ajouter
  // voir : https://github.com/fzaninotto/Faker#basic-usage
  return array($faker->creditCardType,
               $faker->creditCardNumber,
               $faker->creditCardExpirationDateString);
}

?>