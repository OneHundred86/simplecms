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
            'category_id' => 'required|integer',
            'kw' => 'nullable|string',
            'page' => 'required|integer|min:1',
            'limit' => 'required|integer',
        ]);

        $kw = $request->kw;
        $limit = $request->limit;
        $offset = ($request->page - 1) * $limit;

        $builder = Article::query();
        $builder->where('category_id', $request->category_id);

        if($kw){
            $builder->where('title', 'like', "%$kw%");
        }

        $total = $builder->count();
        $list = $builder->orderBy('id', 'desc')
            ->offset($offset)
            ->limit($limit)
            ->get()
            ->makeHidden('content');

        return $this->o(compact('total', 'list'));
    }

    public function info(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer',
        ]);

        $info = Article::find($request->id);
        if(!$info){
            return $this->e('稿件信息不存在');
        }

        return $this->o(compact('info'));
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|integer|exists:category,id',
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $article = Article::create($request->all());

        return $this->o();
    }

    public function edit(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer',
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $article = Article::find($request->id);
        if(!$article){
            return $this->e('稿件信息不存在');
        }

        $arr = $request->all();
        $arr['status'] = Article::STATUS_DRAFT;
        $article->update($arr);

        return $this->e();
    }

    public function del(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer',
        ]);

        $article = Article::find($request->id);
        if(!$article){
            return $this->e('稿件信息不存在');
        }

        $article->delete();

        return $this->o();
    }

    public function publish(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer',
        ]);

        $article = Article::find($request->id);
        if(!$article){
            return $this->e('稿件信息不存在');
        }

        $article->status = Article::STATUS_PUB;
        $article->save();

        return $this->o();
    }

    public function withdraw(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer',
        ]);

        $article = Article::find($request->id);
        if(!$article){
            return $this->e('稿件信息不存在');
        }

        $article->status = Article::STATUS_DRAFT;
        $article->save();

        return $this->o();
    }
}