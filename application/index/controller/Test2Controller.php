<?php

namespace app\Index\controller;

use think\Controller;
use think\Request;
use think\Db;
use app\common\model\T2;
class Test2Controller extends Controller
{
	    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function fn3()
    {
        $t2 = T2::create([
    'uname' => str_shuffle('adsfasdf'),
    'content' => str_shuffle('adsfasdf')
	]);
	//$对象->数据库字段
	echo $t2->id . '<br />';
	
	// $t2 =T2::destroy(27);
 //    	$t2 =T2::where('id','>',10)->delete();
	// dump($t2);
    }

	/**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function fn2(){
    	//插入一条
    //     $rs =Db::table('t2')->insert([
    //     'uname' => str_shuffle('asd1fas12312dfa'),
    //     'content' => str_shuffle('asdfas12312dfa')
    // ]);
        //插入多条
         // $rs =Db::table('t2')->insertAll([
         // 	['uname' => str_shuffle('asd1fas12312dfa'),'content' => str_shuffle('asdfas12312dfa')],
         // 	['uname' => str_shuffle('asd1fas12312dfa'),'content' => str_shuffle('asdfas12312dfa')],
         // 	['uname' => str_shuffle('asd1fas12312dfa'),'content' => str_shuffle('asdfas12312dfa')]
         // 	]);
  //       echo Db::table('t2')->getLastInsID();
		// echo '<hr>';
  //       echo Db::table('t2')->getLastSql();
  //       var_dump($rs);
  //       删除一条数据
        // $rs =Db::table('t2')->delete(26);
        // 删除多条
        // $rs =Db::table('t2')->where('id','>',20)->delete();
        
        // $rs =Db::table('t2')->where('id','>',15)->update([
        // 	'uname'=>'修改'
        // 	]);
        // var_dump($rs);
        #题目1：查询一条数据
        // $rs =Db::table('t2')->find(2);

		#题目2：查询所有数据
		// $rs =Db::table('t2')->select();
		
		#题目3：按照id降序模糊查询content中含有a的数据，最终取2条.
		// $rs =Db::table('t2')->where('content','like','%a%')
		// 	->order('id desc')
		// 	->limit(2)
		// 	->select();
		// dump($rs);
		#题目1：查询id=1
		// $rs =Db::table('t2')->find(1);
		// dump($rs);
		#题目3：查询id>1
		// $rs =Db::table('t2')->where('id','>',1)->select();
		// dump($rs);
		#题目4：查询id=1并且uname=aa
		// $rs =Db::table('t2')->where('id',1)->where('uname','aa')->find();
		// dump($rs);
		#题目5：查询id=1或id=2.
		$rs =Db::table('t2')->where('id',1)->whereOr('id',2)->select();
		dump($rs);
    }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    //原生sql语句
    public function fn1(){
        #需求1：插入一条数据到t2表中
        $rs = Db::execute("insert into t2 values (null, 'aa', 'bb'),(null, 'aa', 'bb')");
        var_dump($rs);
        echo '<hr />';
        #需求2：查询最新的2条数据
        $rs = Db::query("select * from t2 order by id desc limit 2");
        dump($rs);}

    



    
}
