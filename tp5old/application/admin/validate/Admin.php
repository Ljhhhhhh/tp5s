<?php
namespace app\admin\validate;
use think\Validate;
class Admin extends Validate{
    protected $rule=[
        'admin_username'=>'require',
        'admin_password'=>'require',
        'code'=>'require|captcha'
    ];
    protected $message=[
        'admin_username.require'=>'username not allow null',
        'admin_password.require'=>'password not allow null',
        'code.require'=>'code not allow null',
        'code.captcha'=>'code false'
    ];
}