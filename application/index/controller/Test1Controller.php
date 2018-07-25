<?php

namespace app\Index\controller;

use think\Controller;
use think\Request;

class Test1Controller extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function fn1()
    {
       $data1 = '张三'; 
        $data2 = [ 'name' => '李四', 'age'  => 18, 'sex'  => '男'];
        $data3 = [
            'a' => [ 'name' => '李四1', 'age'  => 181, 'sex'  => '男1'],
            'b' => [ 'name' => '李四2', 'age'  => 182, 'sex'  => '男2'],
            'c' => [ 'name' => '李四3', 'age'  => 183, 'sex'  => '男3']
        ];
        return $this->fetch('fn1',[
            'data1' =>$data1,
            'data2' =>$data2,
            'data3' =>$data3,
            ]);
    }

    public function fn2()
    {
        //获取所有数据
        $getData = input('param.');

        echo '<pre>';
        print_r($getData);

        //获取指定键username
        echo input('username');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
