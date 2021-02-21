<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['Sejarah'],
            ['Tech'],
            ['Sains'],
            ['Informasi'],
            ['Test Test']
        ];

        foreach ($data as $name) {
            factory(Category::class)->create([
                'name' => $name[0],
                'alias' => Str::slug($name[0]),
            ]);
        }
    }
}
