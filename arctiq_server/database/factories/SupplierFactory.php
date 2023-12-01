<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $name = $this->faker->name();
        $contact_person = $this->faker->name();
        $contact_no = $this->faker->phoneNumber();

        return [
            'name' => $name,
            'contact_person' => $contact_person,
            'contact_no' => $contact_no

        ];
    }
}
