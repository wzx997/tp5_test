<?php
//Author：王志祥
//说明：


namespace app\database\controller\test;


use app\BaseController;

class TestController extends BaseController
{
    /**
     * 当一个模块下有文件夹时，这时匹配方式是：模块名/文件夹名.控制器名/方法名
     * Route::post('test2', 'database/test.TestController/test2');
     * 测试多级嵌套文件夹的路由
     * @return array
     */
    public function test2()
    {
        return $this->resSuccess([], '多件嵌套路由测试成功');
    }
}