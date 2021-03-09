<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_name' => $this->faker->name,
            'customer_age' => $this->faker->numberBetween($min = 18, $max= 60),
            'customer_email' => $this->faker->unique()->safeEmail,
            'customer_address' => $this->faker->streetAddress,
            'customer_city' => $this->faker->city,
            'customer_postal_code' => $this->faker->postcode,
            'customer_phone' => $this->faker->e164PhoneNumber,
            'customer_identity_no' => $this->faker->ein,

        ];
    }
}
