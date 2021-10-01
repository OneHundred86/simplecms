<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleType extends Model
{
    use SoftDeletes;
    protected $table = "article_type";
    public $timestamps = false;

    protected $fillable = ['category', 'name', 'parent_id'];
    protected $hidden = ['deleted_at'];
}
