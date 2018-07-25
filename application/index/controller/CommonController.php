<?php

namespace app\Index\controller;

use think\Controller;
use think\Request;

class CommonController extends Controller
{

    public function __construct()
    {
        #调用父构造函数而不是重新
        parent::__construct();
        //判断是否登录
        if (!\think\Session::has('userinfo')) {
            return $this->error('对不起,登录超时',url('/login/login'));
        }
    }

}
