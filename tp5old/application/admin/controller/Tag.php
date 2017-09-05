<?php

namespace app\admin\controller;

use think\Controller;

class Tag extends Controller
{
    protected $db;
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        $this->db=new \app\common\model\Tag();
    }

    public function index(){
        $field=db('tag')->paginate(5);
        $this->assign('field',$field);
        return $this->fetch();
    }
    public function store(){
        $tag_id=input('param.tag_id');
        if(request()->isPost()){
            $res=$this->db->store(input('post.'));
            if($res['valid']){
                $this->success($res['msg'],'index');exit;
            }else{
                $this->error($res['msg']);exit;
            }
        }
        if($tag_id){
            $oldData=$this->db->find($tag_id);
        }else{
            $oldData=['tag_name'=>''];
        }
        $this->assign('oldData',$oldData);
        return $this->fetch();
    }
    public function  del(){
        $tag_id=input('param.tag_id');
        $res=$this->db->del($tag_id);
        if($res['valid']){
            $this->success($res['msg'],'index');
        }else{
            $this->error($res['msg']);exit;
        }
    }
}