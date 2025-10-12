<?php

namespace Tests\Feature\Models;

use App\Models\Course;
use App\Models\EducationLevel;
use Database\Factories\CourseEducationLevelFactory;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class CourseEducationLevelTest extends TestCase
{
    public function test_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('course_education_levels', [
                'course_id',
                'education_level_id',
                'created_at',
                'updated_at',
                'deleted_at',
                'created_by',
                'updated_by',
                'deleted_by',
            ])
        );
    }

    public function test_relation_belongs_to_course()
    {
        $courseEducationLevel = CourseEducationLevelFactory::new()->create();

        $this->assertInstanceOf(Course::class, $courseEducationLevel->course);
    }

    public function test_relation_belongs_to_education_level()
    {
        $courseEducationLevel = CourseEducationLevelFactory::new()->create();

        $this->assertInstanceOf(EducationLevel::class, $courseEducationLevel->educationLevel);
    }
}
