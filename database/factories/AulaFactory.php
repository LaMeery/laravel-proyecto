<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Aula;
use App\Models\Instituto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aula>
 */
class AulaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Aula::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->regexify('[A-Z]{1}').$this->faker->regexify('[0-9]{3}');
        return [
            'cod_aula' => strtoupper($name),
            'instituto_id' =>function(){
                return   Instituto::inRandomOrder()->first()->id;
            }
        ];
    }
}
