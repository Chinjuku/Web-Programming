<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    //จำลองข้อมูล Blog Model
    public function definition(): array
    {
        return [
            'title'=>fake()->name(), // จำลอง fake() ข้อความ name()
            'content'=>fake()->text(),
            'status'=>rand(0,1), // จำลองสุ่มค่า 0-1
        ];
    }
}
