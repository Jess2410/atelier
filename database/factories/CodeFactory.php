<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Code;
use App\Models\Product;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Code>
 */
class CodeFactory extends Factory
{
    protected $model = Code::class;

    public function definition()
    {
        return [
            'product_id' => Product::factory(),
            'code' => Str::random(8),
            'is_used' => $this->faker->boolean,
        ];
    }
}
