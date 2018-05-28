<?php

use Faker\Generator as Faker;

$factory->define(App\Proveedore::class, function (Faker $faker) {
    return [
      'fiscalid' => $faker->regexify('[0-9]{1}-[0-9]{3}-[0-9]{3}'),
      'nombre' => $faker->company,
      'direccion' => $faker->address,
      'telefonos' => $faker->phoneNumber,
      'email' => $faker->companyEmail,
      'website' => $faker->domainName,
      'credito' => $faker->biasedNumberBetween($min = 0, $max = 30)
    ];
});
