<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
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
          'name' =>  $this->faker->text($maxNbChars=200),
          'assigned' => User::firstOrFail()->id,
          'description' => $this->faker->text($maxNbChars=200),
          'category' => $this->faker->jobTitle(),
          'status' => $this->faker->randomElement(array('to-do', 'in progress', 'done')),
        ];
    }
}
