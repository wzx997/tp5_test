<?php
//Author：王志祥
//说明：


namespace app\database\controller;


use think\Controller;
use app\database\validate\User;
use think\facade\Validate;

class ValidateTest extends Controller
{
    // 验证器的用法1，直接实例化验证器类来进行验证
    public function validateTest1()
    {
        $data = $this->request->post();

        $validate = new User();//验证其的用法1

        if (!$validate->check($data)) {
            return [
                'code' => 1,
                'msg' => '参数验证失败：'.$validate->getError(),
                'data' => []
            ];
        }

        return [
            'code' => 0,
            'msg' => '参数验证成功',
            'data' => $data
        ];
    }

    // 验证器的用法2，使用控制器中的属性但是要继承自基类的控制器
    public function validateTest2()
    {
        $data = $this->request->post();

        $res = $this->validate($data, User::class);

        if (true !== $res) { //必须类型都是true才可以
            return [
                'code' => 1,
                'msg' => '参数验证失败：'.$res,
                'data' => []
            ];
        }

        return [
            'code' => 0,
            'msg' => '参数验证成功',
            'data' => $data
        ];
    }

    // 验证器的用法3，设置单独的验证规则1
    public function validateTest3()
    {
        $data = $this->request->post();

        $rule = [
            'name'  => 'require|max:25',
            'age'   => 'number|between:1,120',
            'email' => 'email',
        ];
        $message = [
            'name.require'  => '姓名必须的',
            'age.require'   => '年龄不能为空',
            'email.require' => '邮箱不能为空',
            'name.max'      => '名称最多不能超过25个字符',
            'age.number'    => '年龄必须是数字',
            'age.between'   => '年龄只能在1-120之间',
            'email'         => '邮箱格式错误',
        ];

        $res = $this->validate($data, $rule, $message);

        if (true !== $res) {
            return [
                'code' => 1,
                'msg' => '参数验证失败：'.$res,
                'data' => []
            ];
        }
        return [
            'code' => 0,
            'msg' => '参数验证成功',
            'data' => $data
        ];
    }

    // 验证器的用法4，设置单独的验证规则2
    public function validateTest4()
    {
        $data = $this->request->post();

        $rule = [
            'name'  => 'require|max:25',
            'age'   => 'number|between:1,120',
            'email' => 'email',
        ];
        $message = [
            'name.require'  => '姓名必须的4',
            'age.require'   => '年龄不能为空',
            'email.require' => '邮箱不能为空',
            'name.max'      => '名称最多不能超过25个字符',
            'age.number'    => '年龄必须是数字',
            'age.between'   => '年龄只能在1-120之间',
            'email'         => '邮箱格式错误',
        ];

//        $validate = Validate::make($rule)->message($message);
        $validate = Validate::make($rule, $message);
        $result = $validate->check($data);

        if (!$result) {
            return [
                'code' => 1,
                'msg' => '参数验证失败：'.$validate->getError(),
                'data' => []
            ];
        }
        return [
            'code' => 0,
            'msg' => '参数验证成功',
            'data' => $data
        ];
    }
}