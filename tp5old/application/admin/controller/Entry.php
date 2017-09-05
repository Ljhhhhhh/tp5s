<?php
namespace app\admin\controller;

use app\common\model\Admin;

class Entry extends Common{
    public function index(){
        return $this->fetch();
    }
    public function pass(){
        if(request()->isPost()){
            $res = (new Admin())->pass(input('post.'));
            if($res['valid']){
                //执行成功
                session(null);//清楚session
                $this->success($res['msg'],'admin/entry/index');exit;
            }else{
                //执行失败
                $this->error($res['msg']);exit;
            }
        }
        return $this->fetch();
    }
}