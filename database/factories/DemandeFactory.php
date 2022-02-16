<?php

namespace Database\Factories;

use App\Models\Demande;
use Illuminate\Database\Eloquent\Factories\Factory;

class DemandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Demande::class;

    public function definition()
    {
        return [
            'montantDemande' => $this->faker->biasedNumberBetween,
            'fraisDemande'=> $this->faker->biasedNumberBetween,
            'nombreBillet10000'=>$this->faker->biasedNumberBetween,
            'nombreBillet5000' =>$this->faker->biasedNumberBetween,
            'client_id' =>$this->faker->biasedNumberBetween,
            'statut'=>$this->faker->randomElement(['ASSIGNEE', 'NON_ASSIGNEE', 'ANNULEE']),
            'created_at'=>now()
        ];

    }
}
