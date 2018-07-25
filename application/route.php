<?php

#步骤1：导入路由类
use think\Route;

#步骤2：写路由规则
Route::get('test1/fn1', 'index/test1/fn1');
Route::get('test1/fn2', 'index/test1/fn2');
Route::get('/msg', 'index/msg/index');
Route::post('/msg/add', 'index/msg/add');


//学生管理系统
Route::get('/stu/index','index/stu/index');  //首页
Route::any('/stu/add','index/stu/add');		//新增
Route::get('/stu/detail','index/stu/detail'); //删除
Route::get('/stu/particular','index/stu/particular'); //详情
Route::any('/stu/edit','index/stu/edit'); //删除

Route::any('/login/login','index/login/login');  //后台登录
