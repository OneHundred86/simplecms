<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    protected $table = "article";
    protected $fillable = ['title', 'content', 'category_id', 'status'];
    protected $hidden = ['deleted_at'];

    const STATUS_DRAFT = 0;     # 草稿
    const STATUS_PUB = 1;       # 已发布

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function test()
    {
        return __METHOD__;
    }
}
