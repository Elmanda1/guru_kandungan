<?php

namespace Tests\Feature\Models;

use App\Models\Course;
use App\Models\User;
use Database\Factories\CourseParticipantFactory;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class CourseParticipantTest extends TestCase
{
    public function test_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('course_participants', [
                'participant_id',
                'course_id',
                'created_at',
                'updated_at',
                'deleted_at',
                'created_by',
                'updated_by',
                'deleted_by',
            ])
        );
    }

    public function test_relation_belongs_to_participant()
    {
        $courseParticipant = CourseParticipantFactory::new()->create();

        $this->assertInstanceOf(User::class, $courseParticipant->participant);
    }

    public function test_relation_belongs_to_course()
    {
        $courseParticipant = CourseParticipantFactory::new()->create();

        $this->assertInstanceOf(Course::class, $courseParticipant->course);
    }
}
