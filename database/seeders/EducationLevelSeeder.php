<?php

namespace Database\Seeders;

use App\Models\EducationLevel;
use Illuminate\Database\Seeder;

class EducationLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EducationLevel::query()->insert([
            [
                'name' => 'S1',
            ],
            [
                'name' => 'S2',
            ],
            [
                'name' => 'S3',
            ],
            [
                'name' => 'Dokter Muda',
            ],
            [
                'name' => 'Dokter Umum',
            ],
            [
                'name' => 'Pendidikan Sp1',
            ],
            [
                'name' => 'Pendidikan Sp2',
            ],
        ]);
    }
}
