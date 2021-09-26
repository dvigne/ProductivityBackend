<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'team_id' => $this->faker->uuid(),
          'assigned' => $this->faker->uuid(),
          'name' =>  $this->faker->text($maxNbChars=200),
          'description' => $this->faker->text($maxNbChars=200),
          'category' => $this->faker->jobTitle(),
          'status' => 'to-do'
        ];
    }
}
