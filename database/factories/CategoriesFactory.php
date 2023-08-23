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
        $name  = [ 'General' ,'Festivals' ,'Soccer' ,'Inter House Competition' 
            ,'Inter School Competition' ,'Inter House Matches' ,'House Show'
            ,'activities' ,'Camp' ,'Prefects'];
        $rand = random_int(0, 20);
        $imgUrl = "https://picsum.photos/id/$rand/500/300";
        $thumbnailUrl = "https://picsum.photos/id/$rand/100/100";
        static $sortId = 0;
        return [
            'name' => $this->faker->randomElement( $name),
            'slug' => Str::slug($this->faker->randomElement( $name)),
            'category' => $this->faker->randomElement( $name),
            'image' => $imgUrl,
            'thumbnail' => $thumbnailUrl,
            'sort_id' => ++$sortId,
            'status' => $this->faker->randomElement($statusOptions),
        ];
    }
}

 