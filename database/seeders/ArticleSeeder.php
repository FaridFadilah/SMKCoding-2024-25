<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        Article::create([
            "title" => "ini article dummy",
            "content" => "ini article dummy",
            "user_id" => 0,
            "category_id" => 1
        ]);
    }
}
