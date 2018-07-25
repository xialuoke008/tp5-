<?php

namespace app\Index\controller;

use think\Controller;
use think\Request;
use app\common\model\Stu;
class LoginController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function login()
    {
        if (Request::instance()->isPost()) {
            //接收数据
            $postData =input('param.');

            //判断验证码
            $validate = $this->validate($postData,[
                'captcha|验证码'=>'require|captcha'
            ]);
            if ($validate !== true) return $this->error($validate);
            
            #步骤3：身份验证
            $stu = Stu::where('username', $postData['username'])->find();
            #步骤4；判断
            if (!$stu) return $this->error('用户不存在');
            if ($stu->password != $postData['password']) return $this->error('密码瑕疵');
            #步骤5: 登录成功保存用户标识
            \think\Session::set('userinfo',$stu);
            return $this->success('登录成功', url('/stu/index'));
        }else{
           return $this->fetch('login'); 
        }
        
    }

    
}
