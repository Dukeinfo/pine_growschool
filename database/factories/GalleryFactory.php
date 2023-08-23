<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categoryIds = [1, 2, 3, 4, 5];
        $year=  [2021, 2022,2023];
            //
            $rand =    random_int(0, 20);
            $imgUrl   =      "https://picsum.photos/id/$rand/500/300";
            $thumbnailUrl = "https://picsum.photos/id/$rand/100/100";
 
            static $sortId = 0;

            // $title = fake()->realText(50);
            return [
                'category_id' => $this->faker->randomElement($categoryIds),
                'title' =>  $this->faker->realText(50),
                'year' =>$this->faker->randomElement( $year),
                'slug' => Str::slug( $this->faker->title),
                'addmision_no'=> $this->faker->unique()->numerify('#####'),
                // 'thumbnail' =>  $response->getHeaderLine('Location'),
                'image' => $imgUrl,
                'sort_id' => ++$sortId,
                'thumbnail' =>$thumbnailUrl,
                's_name' => $this->faker->name,
           
            ];
        
    }
}





