<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entity\User as UserEntity;

class SelfController extends Controller
{
    public function userInfo(Request $request, UserEntity $user){
        $um = $user->getModel();
        return $this->o([
            'user' => $um,
        ]);
    }
}
