<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $table = "template";
    protected $fillable = ['category_id', 'category_template', 'article_template'];

    protected $hidden = ['created_at', 'updated_at'];
}
