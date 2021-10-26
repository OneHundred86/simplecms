<?php

namespace App\Http\Controllers;

use App\Model\Article;
use App\Model\ArticleType;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function lists(Request $request)
    {
        $this->validate($request, [
            'category' => 'required|integer',
            'type_id' => 'nullable|integer',
            'offset' => 'required|integer',
            'limit' => 'required|integer',
        ]);

        $builder = Article::where('status', Article::STATUS_PUB)
            ->where('category', $request->category);

        if($request->type_id){
            $builder->where('type_id', $request->type_id);
        }

        $total = $builder->count();
        $list = $builder->with('covers')
            ->select('id', 'title', 'content', 'category', 'type_id')
            ->orderBy('id', 'desc')
            ->offset($request->offset)
            ->limit($request->limit)
            ->get();

        return $this->o(compact('total', 'list'));
    }

    public function info(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer',
        ]);

        $info = Article::with('type')
            ->with('covers')
            ->find($request->id);

        if(!$info){
            return $this->e(404,'稿件信息不存在');
        }elseif($info->status != Article::STATUS_PUB){
            return $this->e(404,'稿件信息不存在(1)');
        }

        return $this->o(compact('info'));
    }

    public function typeList(Request $request)
    {
        $this->validate($request, [
            'category' => 'required|integer',
        ]);

        $builder = ArticleType::query();
        $list = $builder->where('category', $request->category)->get();

        return $this->o(compact('list'));
    }
}
