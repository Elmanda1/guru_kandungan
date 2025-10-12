<?php

namespace Feature\Models;

use App\Models\EducationLevel;
use Database\Factories\CourseFactory;
use Database\Factories\CourseParticipantFactory;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('users', [
                'id',
                'name',
                'nik',
                'photo',
                'phone',
                'address',
                'institution',
                'cv',
                'is_verified',
                'education_level_id',
                'email',
                'email_verified_at',
                'google_id',
                'password',
                'remember_token',
                'created_at',
                'updated_at',
                'deleted_at',
                'created_by',
                'updated_by',
                'deleted_by',
            ])
        );
    }

    public function test_relation_has_many_course_participants()
    {
        $user = UserFactory::new()->create();

        CourseParticipantFactory::new()->count(5)->create([
            'participant_id' => $user->id,
        ]);

        $this->assertCount(5, $user->courseParticipants);
    }

    public function test_relation_has_many_courses()
    {
        $user = UserFactory::new()->create();

        CourseFactory::new()->count(5)->create([
            'lecturer_id' => $user->id,
        ]);

        $this->assertCount(5, $user->courses);
    }

    public function test_relation_belongs_to_education_level()
    {
        $user = UserFactory::new()->create();

        $this->assertInstanceOf(EducationLevel::class, $user->educationLevel);
    }
}
