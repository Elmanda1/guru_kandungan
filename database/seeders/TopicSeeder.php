<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Topic::query()->insert([
            [
                'name' => 'Obgin Umum',
            ],
            [
                'name' => 'Fetomaternal',
            ],
            [
                'name' => 'Onkologi Ginekologi',
            ],
            [
                'name' => 'FER',
            ],
            [
                'name' => 'Uroginekologi',
            ],
            [
                'name' => 'Obginsos',
            ],
        ]);
    }
}
