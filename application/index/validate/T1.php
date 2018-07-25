<?php
namespace app\index\validate;
use think\Validate;
class T1 extends Validate
{
    protected $rule =   [
        'uname' => 'require|min:2|max:6',   
        'pwd' => 'require|min:6|max:30',   
        'email' => 'require|email',   
        'other' => '\d{3}',  
    ];

    protected $message  =   [
        'uname.require' => '用户名必须',
        'uname.min' => '用户名至少2个字符',
        'uname.max' => '用户名最多6个字符',
        //pwd重写提示同理
        'email.require' => '邮箱必须',
        'email.email' => '邮箱格式有瑕疵',
        'other.\d{3}' => '其他必须是3个数字',
    ];
}