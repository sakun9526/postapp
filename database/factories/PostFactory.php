<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body'=>$this->faker->sentence(10) //sentence of 10 words
        ];
    }
}

/*
    ==============================================================================
            GENERATE FAKE DATA FOR THE DATABASE 
    ## in CMD 
    php artisan tinker
    
    App\Models\Post::factory()->times(number of records needed)->create(['user_id'=>2]);
*/