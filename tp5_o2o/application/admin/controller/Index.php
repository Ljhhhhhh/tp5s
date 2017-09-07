<?php
namespace app\admin\controller;
use think\Controller;
class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
    public function welcome(){
        return "欢迎来到O2O主后台首页！";
    }
    public function test(){
        return \Map::getLngLat('江苏省苏州市虎丘区塔园路318号');
    }
    public function map(){
        return  \Map::staticimage('江苏省苏州市虎丘区塔园路318号');exit;
    }
}
