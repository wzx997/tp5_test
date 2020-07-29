<?php
//Author：王志祥
//说明：


namespace app\database\controller;


use app\BaseController;
use think\Db;
use think\Exception;

class BaseTest extends BaseController
{
    public function baseTest1()
    {
        try {
            $data = Db::table('tp_user')->select();
        } catch (Exception $e) {
            return $this->resFail($e->getMessage());
        }

        return $this->resSuccess($data, '获取用户数据成功');
    }
}