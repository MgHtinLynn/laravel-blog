<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'cover_photo' => $this->faker->imageUrl(200,200),
            'user_id' => User::factory(),
            'description' => $this->faker->text,
            'view_count' => $this->faker->numberBetween(2,100)
        ];
    }
}
