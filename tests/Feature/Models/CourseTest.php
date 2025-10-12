<?php

namespace Tests\Feature\Models;

use App\Models\Topic;
use App\Models\User;
use Database\Factories\CourseEducationLevelFactory;
use Database\Factories\CourseFactory;
use Database\Factories\CourseParticipantFactory;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class CourseTest extends TestCase
{
    public function test_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('courses', [
                'id',
                'title',
                'slug',
                'description',
                'date',
                'start_time',
                'quota',
                'zoom_link',
                'zoom_id',
                'zoom_password',
                'youtube_link',
                'certificate',
                'status',
                'topic_id',
                'lecturer_id',
                'created_at',
                'updated_at',
                'deleted_at',
                'created_by',
                'updated_by',
                'deleted_by',
            ])
        );
    }

    public function test_relation_belongs_to_topic()
    {
        $course = CourseFactory::new()->create();

        $this->assertInstanceOf(Topic::class, $course->topic);
    }

    public function test_relation_belongs_to_lecturer()
    {
        $course = CourseFactory::new()->create();

        $this->assertInstanceOf(User::class, $course->lecturer);
    }

    public function test_relation_has_many_course_participants()
    {
        $course = CourseFactory::new()->create();

        CourseParticipantFactory::new()->count(5)->create([
            'course_id' => $course->id,
        ]);

        $this->assertCount(5, $course->courseParticipants);
    }

    public function test_relation_has_many_course_education_levels()
    {
        $course = CourseFactory::new()->create();

        CourseEducationLevelFactory::new()->count(5)->create([
            'course_id' => $course->id,
        ]);

        $this->assertCount(5, $course->courseEducationLevels);
    }
}
