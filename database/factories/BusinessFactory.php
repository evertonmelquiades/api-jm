<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Business>
 */
class BusinessFactory extends Factory
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
            'active' => $this->faker->boolean(true),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'state' => $this->faker->stateAbbr(),
            'zip_code' => $this->faker->postcode(),
            'cnpj' => $this->generateCNPJ(),
        ];
    }

    private function generateCNPJ(): string
{
    // Gera um CNPJ válido de 14 dígitos
    $n = array_map('intval', str_split(sprintf('%08d%04d', mt_rand(0, 99999999), mt_rand(0, 9999))));
    $n[12] = 0;
    $n[13] = 0;
    $soma = 0;

    for ($i = 0, $j = 5; $i < 12; $i++, $j = ($j == 2) ? 9 : $j - 1) {
        $soma += $n[$i] * $j;
    }

    $n[12] = ($soma % 11) < 2 ? 0 : 11 - ($soma % 11);
    $soma = 0;

    for ($i = 0, $j = 6; $i < 13; $i++, $j = ($j == 2) ? 9 : $j - 1) {
        $soma += $n[$i] * $j;
    }

    $n[13] = ($soma % 11) < 2 ? 0 : 11 - ($soma % 11);

    return implode('', $n);
}
}
