<?php

namespace app\common\model;

use think\Model;

class Tag extends Model
{
    protected $pk = 'tag_id';
    protected $table = 'blog_tag';

    public function store($data)
    {
//        halt($data);
        if ($data['tag_id']) {
            $result = $this->validate(true)->where('tag_id', $data['tag_id'])->update(['tag_name' => $data['tag_name']]);/*                            save($data,$data['tag_id']);*/
        } else {
            $result = $this->validate(true)->save($data);
        }
        if ($result) {
            return ['valid' => 1, 'msg' => '添加成功'];
        } else {
            return ['valid' => 0, 'msg' => '添加失败'];
        }
    }

    public function del($tag_id)
    {
        $result = $this->where('tag_id', $tag_id)->delete();
        if($result){
            return ['valid'=>1,'msg'=>'删除成功'];
        }else{
            return ['valid'=>0,'msg'=>'删除失败'];
        }
    }
}