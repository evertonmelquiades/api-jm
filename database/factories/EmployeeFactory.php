<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'role' => $this->faker->jobTitle(),
            'birthdate' => $this->faker->date(),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'state' => $this->faker->stateAbbr(),
            'zip_code' => $this->faker->postcode(),
            'cpf' => $this->generateCPF(),
        ];
    }
    
    private function generateCPF(): string
    {
        $n = array_map('intval', str_split(sprintf('%09d', mt_rand(0, 999999999))));
        $n[9] = 0;
        $n[10] = 0;
        $soma = 0;
    
        for ($i = 0, $j = 10; $i < 9; $i++, $j--) {
            $soma += $n[$i] * $j;
        }
    
        $n[9] = ($soma % 11) < 2 ? 0 : 11 - ($soma % 11);
        $soma = 0;
    
        for ($i = 0, $j = 11; $i < 10; $i++, $j--) {
            $soma += $n[$i] * $j;
        }
    
        $n[10] = ($soma % 11) < 2 ? 0 : 11 - ($soma % 11);
    
        return implode('', $n);
    }
}
