<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(Menuseeder::class);
        $this->call(SubmenuSeeder::class);
        $this->call(KnowledgeHomeSeeder::class);
        $this->call(ClassSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(SubjectTeachSeeder::class);

        $this->call(SliderSeeder::class);

        
        $this->call(CategoriesSeeder::class);
        $this->call(GallerySeeder::class);



        
        // factory(MyModel::class, 10)->create();

        // SELECT name, COUNT(*) as count FROM submenus GROUP BY name HAVING COUNT(*) > 1;
    }
}
