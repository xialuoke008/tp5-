<?php

namespace app\common\model;

use think\Model;

class Stu extends Model
{
	// 数据表名称
    protected $table ='stu';
   // 是否需要自动写入时间戳 如果设置为字符串 则表示时间字段的类型
    protected $autoWriteTimestamp =true;
    // 创建时间字段
    protected $createTime = 'created_at';
    // 更新时间字段
    protected $updateTime = 'updated_at';
}
