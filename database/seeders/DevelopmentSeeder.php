<?php

namespace Database\Seeders;

use App\Models\CourseEducationLevel;
use App\Models\CourseParticipant;
use App\Models\EducationLevel;
use App\Models\Topic;
use Database\Factories\CourseFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DevelopmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();

        // Create education level
        $this->call(EducationLevelSeeder::class);

        // Create topic
        $this->call(TopicSeeder::class);

        // Create admin
        $admin = UserFactory::new()->create([
            'institution' => null,
            'education_level_id' => EducationLevel::query()->inRandomOrder()->first()->id,
            'email' => 'admin@gmail.com',
            'is_verified' => true,
        ]);
        $admin->assignRole('admin');

        // Create lecturer
        $lecture = UserFactory::new()->create([
            'institution' => null,
            'is_verified' => true,
            'education_level_id' => EducationLevel::query()->inRandomOrder()->first()->id,
            'email' => 'dosen@gmail.com',
        ]);
        $lecture->assignRole('lecturer');

        // Create participants
        $participants = UserFactory::new()->count(30)->create([
            'is_verified' => true,
            'education_level_id' => EducationLevel::query()->inRandomOrder()->first()->id,
        ]);

        foreach ($participants as $participant) {
            $participant->assignRole('participant');
        }

        // Create course
        $course = CourseFactory::new()->create([
            'title' => 'Dasar-dasar Anatomi dan Fisiologi Manusia',
            'slug' => Str::slug('Dasar-dasar Anatomi dan Fisiologi Manusia'),
            'description' => 'Kuliah ini memberikan pemahaman mendalam tentang struktur dan fungsi tubuh manusia. Peserta akan mempelajari anatomi makroskopis dan mikroskopis serta fisiologi dari berbagai sistem tubuh, seperti sistem kardiovaskular, pernapasan, pencernaan, dan saraf. Pengetahuan ini penting sebagai dasar untuk memahami kondisi patologis.',
            'date' => now()->add('day', 7),
            'start_time' => '08:00:00',
            'quota' => 30,
            'topic_id' => Topic::query()->inRandomOrder()->first()->id,
            'lecturer_id' => $lecture->id,
            'created_by' => $lecture->id,
            'updated_by' => $lecture->id,
        ]);

        CourseEducationLevel::query()->create([
            'course_id' => $course->id,
            'education_level_id' => EducationLevel::query()->inRandomOrder()->first()->id,
        ]);

        CourseEducationLevel::query()->updateOrCreate([
            'course_id' => $course->id,
            'education_level_id' => EducationLevel::query()->inRandomOrder()->first()->id,
        ]);

        $course = CourseFactory::new()->create([
            'title' => 'Mikrobiologi dan Imunologi Klinis',
            'slug' => Str::slug('Mikrobiologi dan Imunologi Klinis'),
            'description' => 'Kuliah ini fokus pada mikroorganisme yang mempengaruhi kesehatan manusia dan mekanisme imunologis tubuh dalam melawan infeksi. Peserta akan mempelajari bakteri, virus, jamur, dan parasit serta respons imun tubuh, termasuk vaksinasi dan imunoterapi.',
            'date' => now()->add('day', 10),
            'start_time' => '08:00:00',
            'quota' => 25,
            'topic_id' => Topic::query()->inRandomOrder()->first()->id,
            'lecturer_id' => $lecture->id,
            'created_by' => $lecture->id,
            'updated_by' => $lecture->id,
        ]);

        CourseEducationLevel::query()->create([
            'course_id' => $course->id,
            'education_level_id' => EducationLevel::query()->inRandomOrder()->first()->id,
        ]);

        $course = CourseFactory::new()->create([
            'title' => 'Patologi Umum dan Klinis',
            'slug' => Str::slug('Patologi Umum dan Klinis'),
            'description' => 'Kuliah ini membahas proses patologis penyakit, termasuk penyebab, perkembangan, dan dampaknya pada tubuh manusia. Topik meliputi patologi seluler, peradangan, neoplasia, dan patologi sistem organ utama.',
            'date' => now()->add('day', 13),
            'start_time' => '08:00:00',
            'quota' => 40,
            'topic_id' => Topic::query()->inRandomOrder()->first()->id,
            'lecturer_id' => $lecture->id,
            'created_by' => $lecture->id,
            'updated_by' => $lecture->id,
        ]);

        CourseEducationLevel::query()->create([
            'course_id' => $course->id,
            'education_level_id' => EducationLevel::query()->inRandomOrder()->first()->id,
        ]);

        CourseEducationLevel::query()->create([
            'course_id' => $course->id,
            'education_level_id' => EducationLevel::query()->inRandomOrder()->first()->id,
        ]);

        // Create course participant
        for ($i = 0; $i < rand(10, $participants->count() - 1); $i++) {
            CourseParticipant::query()->create([
                'participant_id' => $participants[$i]->id,
                'course_id' => $course->id,
            ]);
        }

        // Create another lecturers
        $lectures = UserFactory::new()->count(5)->create([
            'institution' => null,
            'education_level_id' => EducationLevel::query()->inRandomOrder()->first()->id,
        ]);

        foreach ($lectures as $lecture) {
            $lecture->assignRole('lecturer');
        }

        // Create another lecturers with unverified email
        $lectures = UserFactory::new()->count(5)->create([
            'email_verified_at' => null,
            'education_level_id' => EducationLevel::query()->inRandomOrder()->first()->id,
        ]);

        foreach ($lectures as $lecture) {
            $lecture->assignRole('lecturer');
        }

        // Create another participants with unverified email
        $participants = UserFactory::new()->count(5)->create([
            'email_verified_at' => null,
            'education_level_id' => EducationLevel::query()->inRandomOrder()->first()->id,
        ]);

        foreach ($participants as $participant) {
            $participant->assignRole('participant');
        }

        DB::commit();
    }
}
