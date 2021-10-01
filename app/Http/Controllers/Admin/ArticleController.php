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
            'category' => 'required|integer',
            'type_id' => 'nullable|integer',
            'kw' => 'nullable|string',
            'offset' => 'required|integer',
            'limit' => 'required|integer',
        ]);

        $kw = $request->kw;
        $limit = $request->limit;
        $offset = $request->offset;

        $builder = Article::query();
        $builder->where('category', $request->category);

        if($request->type_id){
            $builder->where('type_id', $request->type_id);
        }

        if($kw){
            $builder->where('title', 'like', "%$kw%");
        }

        $total = $builder->count();
        $list = $builder->orderBy('id', 'desc')
            ->offset($offset)
            ->limit($limit)
            ->select('id', 'category', 'type_id', 'title', 'status', 'read_cnt', 'created_at', 'updated_at')
            ->with('type')
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
            return $this->e('稿件信息不存在');
        }

        return $this->o(compact('info'));
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'category' => 'required|integer',
            'title' => 'required|string',
            'summary' => 'nullable|string',
            'content' => 'required|string',
            'type_id' => 'nullable|integer',
            'covers' => 'nullable|array',
        ]);


        $m = new Article();
        $m->category = $request->category;
        $m->title = $request->title;
        $m->summary = $request->summary;
        $m->content = $request->input('content');
        $m->type_id = $request->type_id;
        $m->save();

        $m->setCovers($request->covers);

        return $this->o();
    }

    public function edit(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer',
            'title' => 'required|string',
            'summary' => 'nullable|string',
            'content' => 'required|string',
            'type_id' => 'nullable|integer',
            'covers' => 'nullable|array',
        ]);

        $m = Article::find($request->id);
        if(!$m){
            return $this->e('稿件信息不存在');
        }

        $m->title = $request->title;
        $m->summary = $request->summary;
        $m->content = $request->input('content');
        $m->type_id = $request->type_id;
        $m->status = Article::STATUS_DRAFT;
        $m->save();

        $m->setCovers($request->covers);

        return $this->o();
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