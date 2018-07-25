<?php
namespace app\Index\controller;
use think\Controller;
use think\Request;
use think\Db;
class Test3Controller extends Controller
{

    //查询构建器联表查询
    public function fn5()
    {   
        //默认内连
        $rs = Db::table('a')->join('b', 'a.id = b.a_id')->select();
        dump($rs);
        //默认左外连
        $rs = Db::table('a')->join('b', 'a.id = b.a_id', 'left')->select();
        dump($rs);
        //默认右外连
        $rs = Db::table('a')->join('b', 'a.id = b.a_id', 'right')->select();
        dump($rs);
    }

    //自定义函数
    public function fn4()
    {
        $rs =array('name'=>'华华','age'=>'18','sex'=>'男');
        p($rs);
    }
    //验证类
    public function fn3()
    {
        //减少冗余，增强代码的可扩展性
        //语法：$this->validate(数据，'\命名空间\验证类', [], 是否批量验证);
        //调用
        $validate = $this->validate([
            'uname' => 'a',
            'pwd' => 'ad',
            'email' => 'adfads',
            'other' => 'ADFADSFDSA',
        ], '\app\index\validate\T1', [], true);
        //判断
        if ($validate !== true) {
            dump($validate);
            die;
        }
        echo '没毛病';
    }


    //验证
    public function fn2() 
    {
        // 用户名（uname） 必须，2-6个字符         require   max:字符个数   min:字符个数      
        // 密码（pwd）     必须，6-30个字符    require   max:字符个数   min:字符个数
        // 邮箱（email）   必须，email             require    email
        // 其他（other）    必须，使用正则验证数字    \d 相当于 [0-9]   \d{3}  匹配3个数字
        #步骤1：验证规则
        //语法：$this->validate(待验证数据, 验证规则, 提示信息, 是否全部验证);
        //返回：验证没毛病返回true
        //      验证有瑕疵
        //          参数4是true则全部验证，返回数组存放错误信息
        //          参数4是false则则挨个验证，返回字符串当前错误信息
        $validate = $this->validate([
            'uname' => 'a',
            'pwd' => 'ad',
            'email' => 'adfads',
            'other' => 'ADFADSFDSA',
        ], [
            'uname' => 'require|min:2|max:6',
            'pwd' => 'require|min:6|max:30',   
            'email' => 'require|email',
            'other' => '\d{3}',
        ], [
            'uname.require' => '用户名必须',
            'uname.min' => '用户名至少2个字符',
            'uname.max' => '用户名最多6个字符',
            //pwd重写提示同理
            'email.require' => '邮箱必须',
            'email.email' => '邮箱格式有瑕疵',
            'other.\d{3}' => '其他必须是3个数字',
        ], true);
        #步骤2：判断
        if ($validate !== true) {
            dump($validate);
            die;
        }
        echo '好棒棒，通过';
    }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
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
