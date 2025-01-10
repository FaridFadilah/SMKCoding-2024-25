<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model{
    protected $fillable = [
        "title",
        "user_id",
        "category_id",
        "content",
        "cover",
    ];

    protected $table = "articles";

    protected $hidden = [
        "id"
    ];

    protected $guarded = [
        'id'
    ];

    public function category(){
        return $this->belongsTo(Category::class, "category_id", "id");
    }
}