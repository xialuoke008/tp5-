<?php

namespace app\Index\controller;

use think\Controller;
use think\Request;
use think\Db;
class MsgController extends Controller
{
    /**
     * 留言板
     *
     * @return \think\Response
     */
    //留言板首页
    public function index()
    {
        //查询数据
        $msgs =Db::table('msg')->select();
        
        //加载视图且传递数据
        return $this->fetch('index',[
            'msgs' =>$msgs
            ]);
    }

    //留言板数据添加
     public function add()
    {
        //是否post提交
        if (Request::instance()->isPost()) {
            //接收数据
            $msgs =input('param.');
            $updated_at=time();
            $created_at=time();
            $msgs['created_at'] =$created_at;
            $msgs['updated_at'] =$updated_at;
            //插入数据
            $rs =Db::table('msg')->insert($msgs);
            //判断是否插入成功
            if ($rs) {
                return $this->success('插入成功',url('/msg'));
            }else{
                return $this->error('插入失败',url('/msg'));
            }
             var_dump($msgs);
            }
        }
       
    


    
}
