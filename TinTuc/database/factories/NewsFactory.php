<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(30),
            'summary' => $this->faker->text(150),
            'content'=> $this->faker->text(500),
            'img'=> Str::random(10).'.jpg',
            'news_cate'=>$this->faker->numberBetween(1,10),
            'view'=>0,
        ];
    }
}
