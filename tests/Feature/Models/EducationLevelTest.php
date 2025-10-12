<?php

namespace Tests\Feature\Models;

use Database\Factories\CourseEducationLevelFactory;
use Database\Factories\EducationLevelFactory;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class EducationLevelTest extends TestCase
{
    public function test_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('education_levels', [
                'name',
                'created_at',
                'updated_at',
                'deleted_at',
                'created_by',
                'updated_by',
                'deleted_by',
            ])
        );
    }

    public function test_relation_has_many_users()
    {
        $educationLevel = EducationLevelFactory::new()->create();

        UserFactory::new()->count(5)->create([
            'education_level_id' => $educationLevel->id,
        ]);

        $this->assertCount(5, $educationLevel->users);
    }

    public function test_relation_has_many_course_education_levels()
    {
        $educationLevel = EducationLevelFactory::new()->create();

        CourseEducationLevelFactory::new()->count(5)->create([
            'education_level_id' => $educationLevel->id,
        ]);

        $this->assertCount(5, $educationLevel->courseEducationLevels);
    }
}
