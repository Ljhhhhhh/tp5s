<?php
namespace app\admin\model;
use think\Model;
class Login extends Model{
    protected $pk='id';
    protected $table='admin';
    public function login($data){
        
        $admin=$this
            ->db()
            ->where('account',$data['account'])
            ->where('password',$data['password'])
            ->find();
        session('admin_name',$admin['name']);
        session('admin_id',$admin['id']);
        return $admin;
    }
}