<?php

use App\ItemPedido;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		factory(ItemPedido::class, 20)->create();
		// $this->call('UsersTableSeeder');
	}
}
