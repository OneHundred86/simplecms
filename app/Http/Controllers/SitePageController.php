<?php


namespace App\Http\Controllers;

use App\Lib\Twig\Render;
use App\Model\Category;
use Illuminate\Http\Request;

class SitePageController
{
    public function __construct(Render $render)
    {
        $this->render = $render;
    }

    public function route(Request $request, $path)
    {
        return __METHOD__ . $path;
    }

    public function category(Request $request, $id)
    {
        $category = Category::find($id);
        if(!$category){
            abort(404);
        }

        return $this->render->renderByCategory($category);
    }

    public function article()
    {
        return view('site/article');
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