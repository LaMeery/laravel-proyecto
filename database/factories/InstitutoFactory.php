<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Instituto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instituto>
 */
class InstitutoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Instituto::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = 'IES '.$this->faker->company;
        return [
            'name_ies' => strtoupper($name),
        ];
    }

    
}
