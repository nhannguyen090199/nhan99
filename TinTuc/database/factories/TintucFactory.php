<?php

namespace Database\Factories;

use App\Models\Tintuc;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class TintucFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tintuc::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tieude' => $this->faker->text(30),
            'tomtat' => $this->faker->text(150),
            'noidung'=> $this->faker->text(500),
            'hinhanh'=> Str::random(10).'.jpg',
            'loaitintuc'=>$this->faker->numberBetween(1,10),
            'luotxem'=>0,
        ];
    }
}
