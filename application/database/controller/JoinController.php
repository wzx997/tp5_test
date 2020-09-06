<?php
//Author：王志祥
//说明：


namespace app\database\controller;


use app\database\model\Profile;
use app\database\model\User as UserModel;
use think\Controller;
use think\Db;
use think\Exception;

class JoinController extends Controller
{
    // 关联测试1，使用join进行关联
    public function joinTest1()
    {
        $data = Db::table('tp_user u')
            ->leftJoin('tp_profile p', 'p.user_id=u.id')
            ->field('u.id,u.username,p.hobby')
            ->where('u.id', '=', 19)
            ->select();

        $data = Db::table('tp_profile p')
            ->leftJoin('tp_user u', 'u.id=p.user_id')
            ->field('p.id,p.user_id,p.hobby,u.id u_id,u.username')
            ->where('p.id', '=', 1)
            ->select();

        $data = Db::table('tp_user u')
            ->leftJoin('tp_access a', 'a.user_id=u.id')
            ->leftJoin('tp_role r', 'r.id=a.role_id')
            ->field('u.username name, r.type')
            ->where('u.id', '=', 20)
            ->select();

        return [
            'code' => 0,
            'msg' => '查询成功',
            'data' => $data
        ];
    }

    // 关联测试2，使用，model进行关联
    public function joinTest2()
    {
        $user = UserModel::get(19);
        $profile = Profile::get(1);
        return [
            'code' => 0,
            'msg' => '查询成功',
            'data' => [
                'profile' => $user->profile,
                'user' => $profile->user
            ]
        ];
    }

    // 关系修改和新增，使用原生SQL的方式
    public function joinTest3()
    {
        try {
//            Db::table('tp_user u')
//                ->leftJoin('tp_profile p', 'p.user_id=u.id')
//                ->where('u.id', '=', 19)
//                ->update(['p.hobby' => '哈哈哈，更新了']);

            Db::table('tp_profile p')
                ->leftJoin('tp_user u', 'u.id=p.user_id')
                ->where('p.id', '=', 1)
                ->update(['u.username' => '哈哈哈，更新了']);
        } catch (Exception $e) {
            return [
                'code' => 1,
                'msg' => '更新失败，原因：' . $e->getMessage(),
                'data' => []
            ];
        }
        return [
            'code' => 0,
            'msg' => '更新成功',
            'data' => []
        ];
    }

    // 关联更新与插入，使用模型
    public function joinTest4()
    {
        // 更新操作
        $user = UserModel::get(19);
//        $user->profile->save(['hobby'=>'酷爱小姐姐']); //调用属性修改数据
//        var_dump($user->profile);
        $user->profile()->save(['hobby'=>'不喜欢吃青椒']);//调用方法新增数据
        return [
            'code' => 0,
            'msg' => '更新成功',
            'data' => []
        ];
    }

}