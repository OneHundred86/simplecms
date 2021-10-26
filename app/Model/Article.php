<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    protected $table = "article";
    protected $hidden = ['deleted_at'];
    protected $appends = ['url'];

    // 文章状态
    const STATUS_DRAFT = 0;     # 草稿
    const STATUS_PUB = 1;       # 已发布

    // 栏目类型
    const CATEGORY_OTHER = 0;   # 其他
    const CATEGORY_PRODUCT = 1; # 产品中心
    const CATEGORY_APP = 2;     # 行业应用
    const CATEGORY_NEWS = 3;    # 新闻中心

    /**
     * 文章分类
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(ArticleType::class, 'type_id');
    }

    /**
     * 文章封面
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function covers()
    {
        return $this->hasMany(ArticleCover::class);
    }

    /**
     * 设置
     * @param array|null $list
     */
    public function setCovers(?array $list)
    {
        $this->covers()->delete();
        if(empty($list)){
            return true;
        }

        foreach($list as $img){
            $this->covers()->create([
                'article_id' => $this->id,
                'img' => $img,
            ]);
        }
    }

    /**
     * 获取稿件的url
     */
    public function getUrlAttribute()
    {
        return sprintf("%s/article/%s", env('SITE_URL'), $this->id);
    }
}
