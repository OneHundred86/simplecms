<?php

namespace App\Http\Controllers;

use App\Lib\Vericode;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
    public function imageCode(Request $request)
    {
        Vericode::genImageVericode();
    }
}
