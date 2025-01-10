<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller{
    public function index(){
        $data = DB::table("articles")
            ->join("categories", "articles.category_id", "=", "categories.id")
            ->select(
                "articles.*",
                "categories.title as category"
            )
            ->get();

        return view("articles.index", [
            "data" => $data
        ]);
    }

    public function create(){
        $categories = Category::all();

        return view("articles.create", [
            "categories" => $categories
        ]);
    }

    public function store(Request $request){
        $request->validate(
            [
                "title" => ["required", 'string'],
                "content" => ['required'],
                "cover" => ["required", "mimes:jpg,png,webp"]
            ], [
                'title.required' => "Kolom title tidak boleh kosong",
                "content.required" => "Kolom konten tidak boleh kosong",
                "cover.required" => "Kolom cover tidak boleh kosong",
                "cover.mimes" => "Cover tidak valid."
            ]
        );

        $data = [
            "title" => $request->title,
            "user_id" => 0,
            "content" => $request->content,
            "category_id" => $request->category,
        ];

        if($request->has("cover")){
            $file = $request->file("cover");
            $nameFile = uniqid() . "." . $file->getClientOriginalExtension();
            $file->move(public_path("/image"), $nameFile);
            $data["cover"] = url("/image/".$nameFile);
        }

        Article::create($data);

        return redirect()->route("articles.index");
    }
}
