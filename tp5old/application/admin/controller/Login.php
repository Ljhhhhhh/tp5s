<?php

namespace app\admin\controller;

use app\common\model\Admin;
use think\Controller;

class Login extends Controller{
    public function login(){
        if(request()->isPost()){
            $res=(new Admin())->login(input('post.'));
            if($res['valid']){
                //登录成功
                $this->success($res['msg'],'admin/entry/index');exit;
            }else{
                //登录失败
                $this->error($res['msg']);exit;
            }
        }
        return $this->fetch();
    }
}