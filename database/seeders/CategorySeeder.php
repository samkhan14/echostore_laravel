<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addData = [
            [
                'id' => 1, 'parent_id' => 0, 'section_id' => 6, 'category_name' => 'Men', 'category_image' => '', 'category_discount' => 0, 'url' => 'men', 'meta_title' => '', 'meta_description' => '', 'meta_keywords' => '', 'status'=>1
            ],
            [
                'id' => 2, 'parent_id' => 0, 'section_id' => 6, 'category_name' => 'WoMen', 'category_image' => '', 'category_discount' => 0, 'url' => 'women', 'meta_title' => '', 'meta_description' => '', 'meta_keywords' => '', 'status'=>1
            ],
            [
                'id' => 3, 'parent_id' => 0, 'section_id' => 6, 'category_name' => 'Kids', 'category_image' => '', 'category_discount' => 0, 'url' => 'kids', 'meta_title' => '', 'meta_description' => '', 'meta_keywords' => '', 'status'=>1
            ]
        ];
        Category::insert($addData);
    }
}
