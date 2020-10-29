<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MensajeSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		App\Models\Mensaje::factory()
			->times(50)
			->create();
	}
}
