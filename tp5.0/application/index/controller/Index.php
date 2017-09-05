<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\Test;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
    public function img(Request $request)
    {
        $files = $request->file();
        foreach ($files as $file) {
            // 移动到框架应用根目录/public/uploads/ 目录下
            $info = $file->rule('uniqid')->move(ROOT_PATH . 'public/static/zyupload' . DS . 'uploads');
            if ($info) {
                $name = $info->getInfo('name');
                $src = $info->getPathname();
                $res=Test::create([
                   'name'=>$name,
                    'src'=>$src
                ]);
                return $info->getPathname();
            } else {
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }
}
