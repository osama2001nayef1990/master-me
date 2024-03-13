<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Link>
 */
class LinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'short_url' => 'http://'.\App\Models\Domain::find(1)->domain.'/'.Str::random(6),
            'long_url' => fake()->url,
            'is_active' => 1,
            'user_id'=> User::factory(),
            'category_id' => Category::factory(),
            'qr_id' => null,
            'domain_id' => 1,
        ];
    }
}
