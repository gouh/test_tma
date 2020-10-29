<?php

namespace Database\Factories;

use App\Models\Mensaje;
use Illuminate\Database\Eloquent\Factories\Factory;

class MensajeFactory extends Factory {
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Mensaje::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition() {
		return [
			'nombre' => $this->faker->name,
			'email' => $this->faker->unique()->safeEmail,
			'telefono' => $this->faker->tollFreePhoneNumber,
			'asunto' => $this->faker->words(3, true),
			'mensaje' => $this->faker->sentence(10, true)
		];
	}
}
