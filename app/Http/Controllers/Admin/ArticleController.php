<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Article;

class ArticleController extends Controller
{
    public function lists(Request $request)
    {
        $this->validate($request, [
            'cat_id' => 'required|integer',
            'offset' => 'required|integer',
            'limit' => 'required|integer',
        ]);

        $builder = Article::query();
        $builder->where('category_id', $request->cat_id);

        $total = $builder->count();
        $list = $builder->offset($request->offset)
            ->limit($request->limit)
            ->get();

        return $this->o(compact('total', 'list'));
    }
}