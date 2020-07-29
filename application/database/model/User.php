<?php
//Author：王志祥
//说明：


namespace app\database\model;


use think\Model;

class User extends Model
{
    // 指定关联数据表，不指定值匹配tp_user这张表
    protected $table = 'tp_user';

    // 通过主表关联副表
    public function profile()
    {
        //hasOne 表示一对一关联，参数一表示附表，参数二外键，默认 user_id
        return $this->hasOne('Profile');
    }

}