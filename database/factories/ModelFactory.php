<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ItemPedido;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
 */

$factory->define(ItemPedido::class, function (Faker $faker) {
	return [
		'item_nro' => $faker->numberBetween(0, 10),
		'pedido_id' => $faker->numberBetween(1, 10),
		'producto_id' => $faker->numberBetween(1, 10),
		'cantidad' => $faker->numberBetween(1, 10),
	];
});
