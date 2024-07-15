<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname'=>$this->faker->firstName,
            'lastname'=>$this->faker->lastName,
            'gender'=>$this->faker->numberBetween(1,3),
            'email'=>$this->faker->email,
            'phone1'=>$this->faker->numberBetween(100,999),
            'phone2'=>$this->faker->numberBetween(100,999),
            'phone3'=>$this->faker->numberBetween(100,999),
            'address'=>$this->faker->address,
            'category_id'=>$this->faker->numberBetween(1, 5),
            'detail'=>$this->faker->paragraph,
        ];
    }
}
