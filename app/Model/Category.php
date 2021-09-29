<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table = "category";
    protected $fillable = ['name'];
    protected $hidden = ['deleted_at'];

    public function template()
    {
        return $this->hasOne(Template::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
