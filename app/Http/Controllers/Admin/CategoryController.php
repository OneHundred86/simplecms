<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function lists(Request $request)
    {
        $builder = Category::query();

        return $this->o([
            'total' => $builder->count(),
            'list' => $builder->get(),
        ]);
    }
}