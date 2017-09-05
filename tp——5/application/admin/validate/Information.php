<?php
namespace app\admin\validate;
use think\Validate;
class Information extends Validate{
    protected $rule=[
        'title'=>'require',
        'content'=>'require',
        'type'=>'require'
    ];
    protected $message=[
        'title.require'=>'请填写标题',
        'content.require'=>'请输入内容',
        'type'=>'请选择类型',
    ];
}