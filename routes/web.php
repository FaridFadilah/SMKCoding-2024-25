<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('welcome');
});

/**
 * Halaman yang diperlukan buat ditampilin diuser.
 *  Login.
 *  Register.
 *  Management Konten (Login)
 *      Artikel.
 *      Kategori.
 *      Users.
 *  Daftar artikel.
 *  Filter berdasarkan kategori (selected).
 *  Detail artikel.
 * 
 */

Route::get("/articles", [ArticleController::class, "index"])->name("articles.index");
Route::get("/articles/create", [ArticleController::class, "create"])->name("articles.create");
Route::post("/articles", [ArticleController::class, "store"])->name("articles.store");

Route::get("/articles/detail", function(){
    $data = [
        "title" => "Cara menggunakan framework laravel",
        "content" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum facilis vero maiores deserunt tempora voluptatum nesciunt repudiandae nisi temporibus odit!" 
    ];

    return view("articles.detail", [
        "data" => $data
    ]);
})->name("articles.detail");