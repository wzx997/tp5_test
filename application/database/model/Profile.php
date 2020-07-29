<?php
//Author：王志祥
//说明：


namespace app\database\model;


use think\Model;

class Profile extends Model
{
    protected $table = 'tp_profile';

    // 通过副表关联主表
    public function user()
    {
        return $this->belongsTo('User');
    }
}