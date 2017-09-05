<?php
namespace app\common\model;

use think\Loader;
use think\Model;
use think\Validate;

class Admin extends Model
{
    protected $pk = 'admin_id';
    protected $table = 'blog_admin';

    public function login($data)
    {
        //执行验证
        $validate = Loader::validate('Admin');
        if (!$validate->check($data)) {
            return ['valid' => 0, 'msg' => $validate->getError()];
        }
        $userInfo=$this->where('admin_username',$data['admin_username'])->where('admin_password',$data['admin_password'])->find();
        if(!$userInfo){
            //未匹配到相关数据
            return ['valid'=>0,'msg'=>'用户名或者密码不正确'];
        }
        //将用户信息存入session
        session('admin.admin_id',$userInfo['admin_id']);
        session('admin.admin_username',$userInfo['admin_username']);
        return ['valid'=>1,'msg'=>'登录成功'];

    }
    public function pass($data){
        $validate = new Validate([
            'admin_password'  => 'require',
            'new_password' => 'require',
            'confirm_password'=>'require|confirm:new_password'
        ],[
            'admin_password.require'=>'请输入原始密码',
            'new_password.require'=>'请输入新密码',
            'confirm_password.require'=>'请输入确认密码',
            'confirm_password.confirm'=>'两次密码不一致'
        ]);
        if (!$validate->check($data)) {
            return ['valid'=>0,'msg'=>$validate->getError()];
        }
        $userInfo=$this->where('admin_id',session('admin.admin_id'))->where('admin_password',$data['admin_password'])->find();
        if(!$userInfo){
            return ['valid'=>0,'msg'=>'原始密码不正确'];
        }
        $res=$this->save([
            'admin_password'  => $data['new_password'],
        ],[$this->pk => session('admin.admin_id')]);
        if($res){
            return ['valid'=>1,'msg'=>'修改密码成功'];
        }else{
            return ['valid'=>0,'msg'=>'修改密码失败'];
        }
    }
}