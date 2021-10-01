<?php

namespace App\Http\Controllers\Admin;

use App\Model\ArticleType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleTypeController extends Controller
{
    public function lists(Request $request)
    {
        $this->validate($request, [
            'category' => 'required|integer',
        ]);

        $builder = ArticleType::query();
        $list = $builder->where('category', $request->category)->get();

        return $this->o(compact('list'));
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'category' => 'required|integer',
            'name' => 'required',
            'parent_id' => 'nullable|integer',
        ]);

        if($request->parent_id){
            $parent = ArticleType::find($request->parent_id);
            if(!$parent){
                return $this->e("上级分类不存在");
            }elseif($parent->category != $request->category){
                return $this->e("上级分类栏目必须在当前栏目下");
            }
        }

        $type = ArticleType::create($request->all());

        return $this->o([
            'added' => $type,
        ]);
    }

    public function edit(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer',
            'name' => 'required',
        ]);

        $m = ArticleType::find($request->id);
        if(!$m){
            return $this->e("分类信息不存在");
        }

        $m->update($request->all());

        return $this->o([
            'updated' => $m,
        ]);
    }

    public function del(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer',
        ]);

        $m = ArticleType::find($request->id);
        if(!$m){
            return $this->e("分类信息不存在");
        }

        $m->delete();
        return $this->o();
    }
}
