<?php
namespace app\admin\controller;

use think\Controller;

class Article extends Controller
{
    protected $db;
    protected $arcDb;
    protected function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        $this->db=new \app\common\model\Category();
        $this->arcDb=new \app\common\model\Article();
    }
    public function index()
    {
        return $this->fetch();
    }
    public function store(){
        $cateData=db('cate')->select();
        $this->assign('cateData',$cateData);
        $tagData=db('tag')->select();
        $this->assign('tagData',$tagData);
        return  $this->fetch();
    }
    public function addArticle(){
//        dump(input());
//        dump($_FILES['thumb']);
        $request=request();
        halt($request);
//        $thumb=$_FILES['thumb'];
        $res=$this->arcDb->addArticle($request);
//        $thumbRes=$this->arcDb->addThumb($thumb);
    }
}
