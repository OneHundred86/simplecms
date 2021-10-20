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

        if(!$user->checkPassword($request->password, RAW_STRING)){
            return $this->e(ErrorCode::USER_PASSWORD_ERROR);
        }

        Session::setLoginUserID($user->id);

        return $this->o();
    }

    public function logout(Request $request)
    {
        Session::eraseLoginUserID();

        return $this->o();
    }
}