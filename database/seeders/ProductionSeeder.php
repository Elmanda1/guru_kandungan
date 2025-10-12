<?php

namespace Database\Seeders;

use App\Models\EducationLevel;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create education level
        $this->call(EducationLevelSeeder::class);

        // Create admin
        $admin = UserFactory::new()->create([
            'institution' => null,
            'education_level_id' => EducationLevel::all()->random()->id,
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin'),
        ]);
        $admin->assignRole('admin');
    }
}
