<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ArticleCover extends Model
{
    protected $table = "article_cover";
    public $timestamps = false;

    protected $fillable = ['article_id', 'img'];
}
