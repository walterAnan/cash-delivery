<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Client::class;

    public function definition()
    {
        return [
            'numeroClient'=> $this->faker->randomDigitNotNull,
            'addresseClient'=>$this->faker->randomDigitNotNull,
            'lat'=>$this->faker->randomDigitNotNull,
            'lng'=>$this->faker->randomDigitNotNull,
        ];
    }
}
