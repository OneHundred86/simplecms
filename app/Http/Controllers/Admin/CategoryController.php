<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Template;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function lists(Request $request)
    {
        $this->validate($request, [
            'kw' => 'nullable|string',
            'page' => 'required|integer|min:1',
            'limit' => 'required|integer',
        ]);

        $kw = $request->kw;
        $limit = $request->limit;
        $offset = ($request->page - 1) * $limit;

        $builder = Category::query();

        if($kw){
            $builder->where('name', 'like', "%$kw%");
        }

        $total = $builder->count();
        $list = $builder->offset($offset)
            ->limit($limit)
            ->get();

        return $this->o(compact('total', 'list'));
    }
    
    public function info(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer',
        ]);
        
        $info = Category::with('template')->find($request->id);

        if(!$info){
            return $this->e('栏目信息不存在');
        }

        return $this->o(compact('info'));
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'category_template' => 'nullable|string',
            'article_template' => 'nullable|string',
        ]);
        
        $category = Category::create($request->all());
        
        if($request->category_template || $request->article_template)
        {
            $arr = $request->all();
            $arr['category_id'] = $category->id;
            Template::create($arr);
        }

        return $this->o();
    }

    public function edit(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer',
            'name' => 'required|string',
            'category_template' => 'nullable|string',
            'article_template' => 'nullable|string',
        ]);

        $category = Category::find($request->id);
        if(!$category){
            return $this->e('栏目信息不存在');
        }

        $category->name = $request->name;
        $category->save();

        $template = $category->template;
        if(!$template){
            $arr = $request->all();
            $arr['category_id'] = $category->id;
            Template::create($arr);
        }else{
            $template->category_template = $request->category_template;
            $template->article_template = $request->article_template;
            $template->save();
        }

        return $this->o();
    }

    public function del(Request $request){
        $this->validate($request, [
            'id' => 'required|integer',
        ]);

        $category = Category::find($request->id);
        if(!$category){
            return $this->e('栏目信息不存在');
        }

        $category->delete();

        return $this->o();
    }
}