<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller{
    public function index(){
        $data = [
            [
                "title" => "Cara efektif membuat controller",
                "content" => "Cara efektif untuk membuat controller yaitu dengan menggunaka perintah artisan.",
                "category" => "Programing"
            ]
        ];

        return view("articles.index", [
            "data" => $data
        ]);
    }

    public function create(){
        return view("articles.create");
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
            "content" => $request->content,
            "category" => $request->category,
        ];

        if($request->has("cover")){
            $file = $request->file("cover");
            $nameFile = uniqid() . "." . $file->getClientOriginalExtension();
            $file->move(public_path("/image"), $nameFile);
            $data["cover"] = url("/image/".$nameFile);
        }

        return view("articles.detail", [
            "data" => $data
        ]);
    }
}
