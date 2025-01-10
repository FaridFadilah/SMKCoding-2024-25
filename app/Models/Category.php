<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    protected $fillable = [
        "title"
    ];
    protected $table = "categories";

    protected $guarded = [
        "id"
    ];

    public function articles(){
        return $this->hasMany("articles", "id");
    }
}
