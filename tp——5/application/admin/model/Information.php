<?php
namespace app\admin\model;
use think\Loader;
use think\Model;
use think\Validate;
class Information extends Model{
    protected $pk='id';
    protected $table='information';
    public function getArticle(){
        $article=$this
            ->db()
            ->select();
        return $article;
    }
    public function addInformation($date){
        $validate=Loader::validate('Information');
        if(!$validate->check($date)){
            return [
                'msg'=>$validate->getError(),
                'value'=>0
            ];
        }
        $date['create_time']=time();
        $result=$this->db()->insert($date);
        if($result){
            return [
                'msg'=>'新增成功',
                'value'=>'1'
            ];
        }else{
            return [
                'msg'=>'新增失败，请重新添加',
                'value'=>'0'
            ];
        }
    }
    public function editInformation($article_id){
        $article=$this
            ->db()
            ->where('id',$article_id)
            ->find();
        return $article;
    }
    public function updateInformation($date){
        $result=$this->db()
            ->where('id',$date['id'])
            ->update([
                'title'=>$date['title'],
                'source'=>$date['source'],
                'type'=>$date['type'],
                'content'=>$date['content']
            ]);
        return $result;
    }
    public function delInformation($date){
        $result=$this->db()
            ->where('id',$date)
            ->delete();
        return $result;
    }
}