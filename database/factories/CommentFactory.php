<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'content' => $this->faker->sentence(),
            'user_id' => User::factory(),
            'product_id' => Product::factory(),
            'parent_id' => null, // Si deseas crear respuestas, modifica esto
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
