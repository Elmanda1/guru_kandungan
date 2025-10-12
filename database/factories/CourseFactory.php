<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->paragraph(),
            'date' => $this->faker->date(),
            'start_time' => $this->faker->time(),
            'quota' => $this->faker->numberBetween(20, 50),
            'zoom_link' => $this->faker->url(),
            'zoom_id' => $this->faker->uuid(),
            'zoom_password' => $this->faker->password(),
            'youtube_link' => $this->faker->url(),
            'topic_id' => TopicFactory::new(),
            'lecturer_id' => UserFactory::new(),
            'status' => Course::STATUS_AVAILABLE,
        ];
    }
}
