<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Tweet;
use Illuminate\Database\Eloquent\Factories\Factory;

class TweetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tweet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'content' => $this->faker->text( 140 ),
<<<<<<< HEAD
            
=======
>>>>>>> e877f3c1c4a8424a369da89eb7fab19c6df691d7
        ];
    }
}
