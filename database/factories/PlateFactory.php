<?php

namespace Database\Factories;

use App\Models\Plate;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

class PlateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Plate::class;
    private $artistNames = [
        'PINK FLOYD',
        'QUEEN',
        'JOE DASSIN',
        'SCORPIONS',
        'NIRVANA',
        'BEATLES',
        'FRANK SINATRA',
        'CHRIS REA',
        'DEPECHE MODE'
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'artist_name' => $this->artistNames[rand(0, count($this->artistNames)-1)],
            'album_title' => $this->faker->sentence( 4, true),
            'duration' => $this->faker->numberBetween(3, 90),
            'price' => $this->faker->randomFloat(2, 300, 2000)
        ];
    }
}
