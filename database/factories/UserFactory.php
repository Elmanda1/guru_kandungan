<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'nik' => $this->faker->numerify('################'),
            'phone' => substr($this->faker->phoneNumber(), 0, 13),
            'address' => $this->faker->address(),
            'institution' => $this->faker->company(),
            'cv' => $this->faker->text(),
            'is_verified' => $this->faker->boolean(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'google_id' => $this->faker->uuid(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'department_id' => DepartmentFactory::new(),
            'education_level_id' => EducationLevelFactory::new(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
