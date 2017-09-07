<?php

namespace app\api\controller;

use think\Controller;

class Category extends Controller
{
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        $this->obj = model('Category');
    }

    public function getCategoryByParentId()
    {
        $id=input('post.id',0,'intval');
        if (!$id){
            $this->error('ID不合法');
        }
        //通过ID获取二级城市
        $categorys=$this->obj->getNormalCategorysByParentId($id);
        if(!$categorys){
            return show(0,'error');
        }
        return show(1,'success',$categorys);
    }
}