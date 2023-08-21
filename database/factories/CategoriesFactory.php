<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $statusOptions = ['active', 'inactive'];
        $rand = random_int(0, 20);
        $imgUrl = "https://picsum.photos/id/$rand/500/300";
        $thumbnailUrl = "https://picsum.photos/id/$rand/100/100";
        
        return [
            'name' => $this->faker->word(5),
            'slug' => Str::slug($this->faker->word),
            'image' => $imgUrl,
            'thumbnail' => $thumbnailUrl,
            'sort_id' => $this->faker->numberBetween(1, 50),
            'status' => $this->faker->randomElement($statusOptions),
        ];
    }
}
