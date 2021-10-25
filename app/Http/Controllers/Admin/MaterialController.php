<?php

namespace App\Http\Controllers\Admin;

use App\Lib\Util;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaterialController extends Controller
{
    public function uploadImage(Request $request)
    {
        $this->validate($request, [
            'file' => 'required',
        ]);

        $file = $request->file('file');

        $ext = strtolower($file->getClientOriginalExtension());
        $exts_allow = ['png', 'jpg', 'jpeg', 'gif', 'bmp', 'svg'];
        if(!in_array($ext, $exts_allow)){
            return $this->e('请上传以下格式的图片：' . join(',', $exts_allow));
        }

        $path = sprintf("public/uploads/images/%s/%s", date('Ymd'), date('His'));

        $filename = $file->getClientOriginalName();

        $filepath = $file->storeAs($path, $filename);

        return $this->o([
            'url' => str_replace("public", "", $filepath),
        ]);
    }

    public function uploadVedio(Request $request)
    {
        $this->validate($request, [
            'file' => 'required',
        ]);

        $file = $request->file('file');

        $allow_exts = ["mp4", "avi", "wmv"];
        if(!in_array(strtolower($file->getClientOriginalExtension()), $allow_exts)){
             return $this->e("只允许上传文件的格式：" . join(',', $allow_exts));
        }

        $size_limit = 100;  # 100MB
        if($file->getSize() > $size_limit*1024*1024){
            return $this->e(sprintf("文件不能大于%sMB", $size_limit));
        }

        $path = sprintf("public/uploads/vedios/%s/%s", date('Ymd'), date('His'));

        $filename = $file->getClientOriginalName();

        $filepath = $file->storeAs($path, $filename);

        return $this->o([
            'url' => str_replace("public", "", $filepath),
        ]);
    }

}
