<?php


namespace App\Http\Controllers;

use App\Lib\Twig\Render;
use App\Model\Article;
use App\Model\Category;
use Illuminate\Http\Request;

class SitePageController
{
    public function category(Request $request, $id)
    {
        $category = $id;
        if(!in_array($category, [Article::CATEGORY_PRODUCT, Article::CATEGORY_APP, Article::CATEGORY_NEWS])){
            abort(404, "栏目不存在");
        }

        return view('site/category', [
            'category' => $category,
            'type_id' => $request->type_id,
        ]);
    }

    public function article(Request $request, $id)
    {
        $article = Article::find($id);
        if(!$article){
            abort(404, "稿件不存在");
        }elseif($article->status != Article::STATUS_PUB){
            abort(403);
        }

        $article->load('type')->load('covers');

        $article->read_cnt ++;
        $article->save();

        return view('site/article', [
            'article' => $article,
        ]);
    }


    //
    public function article_html()
    {
        return view('site/article_html');
    }

    public function about()
    {
        return view('site/about');
    }

    public function product()
    {
        return view('site/product');
    }

    public function contact()
    {
        return view('site/contact');
    }

    public function news()
    {
        return view('site/news');
    }

    public function index()
    {
        /*
        // 产品列表，取8条
        $product_list = Article::with('covers')
            ->where('category', Article::CATEGORY_PRODUCT)
            ->where('status', Article::STATUS_PUB)
            ->orderBy('id', 'desc')
            ->limit(8)
            ->get();
        // 新闻列表，取4条
        $news_list = Article::with('covers')
            ->where('category', Article::CATEGORY_NEWS)
            ->where('status', Article::STATUS_PUB)
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();
        */

        return view('site/index', [
            // 'product_list' => $product_list,
            // 'news_list' => $news_list,
        ]);
    }

    public function prod_nay()
    {
        return view('site/prod_nay');
    }
}