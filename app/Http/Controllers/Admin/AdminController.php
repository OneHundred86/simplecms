<?php

namespace App\Http\Controllers\Admin;

use App\Lib\ErrorCode;
use App\Lib\Session;
use App\Lib\Vericode;
use App\Model\Category;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entity\User as UserEntity;

class AdminController extends Controller
{
    public function loginPage(Request $request)
    {
        return view("admin/login");
    }

    public function index(Request $request, UserEntity $user)
    {
        $category_list = Category::get();
        $cat_id = $request->input('cat', $category_list->first()->id);

        return view("admin/index", [
            'category_list' => $category_list,
            'cat_id' => $cat_id,
        ]);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
           'email' => 'required|email',
           'password' => 'required|string',
           'code' => 'required|string',
        ]);

        if(!Vericode::checkImageVericode($request->code)){
            return $this->e("验证码错误");
        }

        $user = User::where('email', $request->email)->first();
        if(!$user){
            return $this->e(ErrorCode::USER_NOT_EXISTS);
        }

        if(!$user->checkPassword($request->password, MD5_STRING)){
            return $this->e(ErrorCode::USER_PASSWORD_ERROR);
        }

        Session::setLoginUserID($user->id);

        return $this->o();
    }

    public function logout(Request $request)
    {
        Session::eraseLoginUserID();

        return $this->redirect2RouteName('adminIndex');
    }
}