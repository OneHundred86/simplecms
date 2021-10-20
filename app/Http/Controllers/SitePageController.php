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
        return view('site/index');
    }

    public function prod_nay()
    {
        return view('site/prod_nay');
    }
}