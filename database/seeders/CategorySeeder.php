<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'id_cate' => 1,
                'name' => 'Fiction',
            ],
            [
                'id_cate' => 2,
                'name' => 'Non-Fiction',
            ],
            [
                'id_cate' => 3,
                'name' => 'Science',
            ],
            [
                'id_cate' => 4,
                'name' => 'History',
            ],
            [
                'id_cate' => 5,
                'name' => 'Biography',
            ],
            [
                'id_cate' => 6,
                'name' => 'Mystery',
            ],
            [
                'id_cate' => 7,
                'name' => 'Romance',
            ],
            [
                'id_cate' => 8,
                'name' => 'Fantasy',
            ],
            [
                'id_cate' => 9,
                'name' => 'Self-Help',
            ],
            [
                'id_cate' => 10,
                'name' => 'Children\'s Books',
            ],
        ]);
    }
}