<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'author' => $this->faker->name,
            'ISBN' => $this->faker->numberBetween(111111, 999999),
            'author_address' =>  $this->faker->address,
            'is_published' =>  $this->faker->numberBetween(0,1),
        ];
    }
}
