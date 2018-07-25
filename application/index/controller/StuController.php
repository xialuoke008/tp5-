<?php

namespace app\Index\controller;

use think\Controller;
use think\Request;
use app\common\model\Stu;
class StuController extends \app\Index\controller\CommonController
{

    public function index()
    {
        $stus =Stu::paginate(3);
        return $this->fetch('index',[
            'stus'=>$stus
            ]);
    }
    //学生增加
     public function add()
        {
            //判断是否post提交
            if(Request::instance()->isPost()){
                //接收数据
                $postData = input('param.');

                // 用户名必须，3-8个字符            require     min:3  max:8
                // 密码必须，6-30个字符            require     min:6  max:30
                // 年龄必须，数字：1-100之间       require     number  between:1,100
                // 性别必须，数字：1-2             require     number  between:1,2
                #完善：数据过滤
                $validate = $this->validate($postData, [
                    'username' => 'require|min:3|max:8',
                    'password' => 'require|min:6|max:30',
                    'age' => 'require|number|between:1,100',
                    'sex' => 'require|number|between:1,2'
                ], [
                    'username.require' => '用户名必须',
                    'username.min' => '用户名至少3个字符',
                    'username.max' => '用户名最多8个字符',
                    'password.require' => '密码名必须',
                    'password.min' => '密码至少6个字符',
                    'password.max' => '密码最多30个字符'
                ], true);

                if ($validate !== true) {
                    $errors = implode('，', $validate);
                    return $this->error($errors);//不写跳转地址，则返回到提交也
                }

                //插入数据
                $rs =Stu::insert($postData);
                //判断是否插入成功
                if($rs){
                    return $this->success('添加成功',url('/stu/index'));
                }else{
                    return $this->error('添加失败',url('/stu/add'));
                }
              
            }else{
               return $this->fetch('add'); 
            }
            
        }

    //学生删除
     public function detail($id)
    {
        $rs =Stu::destroy($id);
       //判断是否删除成功
        if($rs){
            return $this->success('删除成功',url('/stu/index'));
        }else{
            return $this->error('删除失败',url('/stu/index'));
        }
    }

    //学生详情
     public function particular($id)
    {
        $stus =Stu::find($id);
        return $this->fetch('particular',[
            'stus' =>$stus
            ]);
    }

    //学生修改
     public function edit($id)
    {
        if(Request::instance()->isPost()){
            $rs =input('param.');
            //修改数据
            $rs =Stu::update($rs);
             //判断是否删除成功
            if($rs){
                return $this->success('修改成功',url('/stu/index'));
            }else{
                return $this->error('修改失败',url('/stu/index'));
            }
        }else{
            //没有提交显示数据
            $stus =Stu::find($id);
            return $this->fetch('edit',[
                'stus' =>$stus
                ]);
        }
        
    }


   
}
