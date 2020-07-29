<?php
namespace app\database\controller;

use app\database\model\User;
use think\Controller;
use think\Db;
use think\Exception;
use think\facade\Log;

class DataBaseTest extends Controller
{
    public function test()
    {
        return ['name'=>'wzx', 'age'=>18];
    }

    //不使用model查询数据
    public function getAllUser()
    {
        $data = Db::table('tp_user')->select();
        return [
            'code' => 0,
            'msg' => '查询成功',
            'data' => $data
        ];
    }

    //不使用model查询数据
    public function getUser()
    {
//        // 查询全部字段
//        $data = Db::table('tp_user')
//            ->where('id', '=', 19)
//            ->select();
//
//        // 查询某个字段的值
//        $data = Db::table('tp_user')
//            ->where('id', '=', 20)
//            ->value('username');

        // 查询指定列的值
        $data = Db::table('tp_user')
            ->where('id', '19')
            ->column('id');

        // 查询指定列
        $data = Db::table('tp_user')
//            ->where('id', '19')
            ->field('id,username as name,email')
            ->select();

        return [
            'code' => 0,
            'msg' => '查询成功',
            'data' => $data
        ];
    }

    public function insertOne()
    {
        $data = [
            "username" => "蜡笔小新3",
            "password" => "123",
            "gender" => "男",
            "email" => "xiaoxin@163.com",
            "price" => "60.00",
            "details" => "123",
            "uid" => 1001,
            "status" => -1,
            "list" => []
        ];

        Db::table('tp_user')->data($data)->insert();
//
//        // 测试数据库的自动数据戳是否会生效，验证是可用的
//        $data = [
//            ['name' => '测试1'],
//            ['name' => '测试2'],
//            ['name' => '测试3'],
//        ];
//
////        Db::table('tp_test')->data($data)->insertAll();
//        Db::table('tp_test')->where('id', '=', 1)
//            ->update(['name' => '更新了']);

        return [
            'code' => 0,
            'msg' => '插入成功',
            'data' => ''
        ];
    }

    // ----------------------------------- 使用模型操作数据库 -------------------------------------

    //使用model查询数据
    public function modelGetAllUser()
    {
        // 默认User这个Model会自动匹配数据库中的user表，也可以在model中指定关联的数据表
        $data = User::select();
        return [
            'code' => 0,
            'msg' => '查询成功',
            'data' => $data
        ];
    }

    public function modelInsert()
    {
        $user = new User();

//        // 插入数据
//        $user->username = 'aaa';
//        $user->password = '456';
//        $user->gender = "男";
//        $user->email = "xiaoxin@163.com";
//        $user->price = "60.00";
//        $user->details = "123";
//        $user->uid = 1001;
//        $user->status = -1;
//        $user->list = [];
//        $res = $user->save();

        $data1 = [
            "username" => "蜡笔小新4",
            "password" => "123",
            "gender" => "男",
            "email" => "xiaoxin@163.com",
            "price" => "60.00",
            "details" => "123",
            "uid" => 1001,
            "status" => -1,
            "list" => []
        ];
        $data2 = [
            [
                "username" => "蜡笔小新5",
                "password" => "123",
                "gender" => "男",
                "email" => "xiaoxin@163.com",
                "price" => "60.00",
                "details" => "123",
                "uid" => 1001,
                "status" => -1,
                "list" => []
            ],
            [
                "username" => "蜡笔小新6",
                "password" => "123",
                "gender" => "男",
                "email" => "xiaoxin@163.com",
                "price" => "60.00",
                "details" => "123",
                "uid" => 1001,
                "status" => -1,
                "list" => []
            ]
        ];
//        $res = $user->save($data1); //单条新增
        $res = $user->saveAll($data2); //批量新增
        if ($res) {
            return [
                'code' => 0,
                'msg' => '插入成功',
                'data' => []
            ];
        }
        return [
            'code' => 1,
            'msg' => '插入失败',
            'data' => []
        ];
    }

    public function modelDel()
    {
//        $user = User::get(243); //根据主键的值获取数据
//        $res = $user->delete();

//        User::destroy(245);

        // 条件删除
//        User::where('id', '>', '233')->delete();

        User::destroy(function($query){
            $query->where('id', '>', 233);
        });
    }

    public function modelUpd()
    {
        // 数据的更新1，使用save更新
//        $user = User::get(252);
//        $user->username = '更新1';
//        $user->save();

//        $user = User::where('id', '=', '253')->find();
//        $user->username = '更新2';
//        $user->save();

        // 数据更新2，调用update更新，满足条件的都会被更新
//        User::where('id', '=', '252')
//            ->update(['username' => '更新3']);
//        User::where('id', '>', '233')
//            ->update(['username' => '更新4', 'password' => 'aaa']);


    }

    public function modelGetData()
    {
        $res = User::get(253); //获取得到的是一个对象,序列化的时候会自动取出数据
//        var_dump($res);

        $res = User::where('id', '>', '233')->find();
//        var_dump($res);

        $res = User::where('id', '>', '233')
            ->field('id,username as name')
            ->select();
//        var_dump($res);
        return [
            'code' => 0,
            'msg' => '查询成功',
            'data' => $res

        ];
    }

    // -------------------------------  测试请求对象的使用 ---------------------------
    public function testReq()
    {
        var_dump($this->request->isPost());
        var_dump($this->request->param());
        var_dump($this->request->param(true));
    }

    // 文件的下载
    public function download1()
    {
        return download('1.png', 'aa.png');
    }

    public function download2()
    {
        $data = '这是一个文本';
        return download($data, '测试.txt', true);
    }

    // 测试日志功能
    public function testLog()
    {
        $uid = $this->request->post('id');
        try{
            $user = Db::table('tp_user')
                ->where('id', $uid)
                ->field(true)
                ->find();
        } catch (Exception $e) {
//            Log::record('数据库异常：'.$e->getMessage());//默认是info级别
            Log::error('数据库异常：'.$e->getMessage());//指定为error级别
            return [
                'code' => 1,
                'mag' => '查询失败',
                'data' => ''
            ];
        }

        return [
            'code' => 0,
            'mag' => '查询成功',
            'data' => $user
        ];
    }


}
