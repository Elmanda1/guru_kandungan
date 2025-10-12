<?php

namespace Tests\Feature\Models;

use Database\Factories\CourseFactory;
use Database\Factories\TopicFactory;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class TopicTest extends TestCase
{
    public function test_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('topics', [
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

    public function test_relation_has_many_courses()
    {
        $topic = TopicFactory::new()->create();

        CourseFactory::new()->count(5)->create([
            'topic_id' => $topic->id,
        ]);

        $this->assertCount(5, $topic->courses);
    }
}
