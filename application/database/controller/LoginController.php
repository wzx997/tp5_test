<?php

namespace app\database\controller;

use app\BaseController;

class LoginController extends BaseController
{
    private $url = 'http://www.tp5.com:9999'; //域名

    /**
     * 生成验证码
     * @return array
     */
    public function captcha()
    {
        $uniqid = uniqid(mt_rand(100000, 999999));
        $src = captcha_src($uniqid);
        $res = [
            'src' => $this->url.$src,
            'uniqid' => $uniqid
        ];

        return $this->resSuccess($res, '验证码生成成功');
    }


    /**
     *
     */
    public function login()
    {
        $data = $this->request->post();

        $rule = [
            'code'  => 'require',
            'uniqid'   => 'require',
        ];
        $message = [
            'code.require'  => '验证码不能为空',
            'code.captcha'  => '验证码错误',
            'uniqid.require'   => '验证码标识不能为空',
        ];

        // 验证参数
        $res = $this->validate($data, $rule, $message);
        if (true !== $res) {
            return $this->resFail($res);
        }

        // 验证验证码
        if (!captcha_check($data['code'], $data['uniqid'])) {
            return $this->resFail('验证码不正确');
        }

        // 登录逻辑
        return $this->resSuccess([], '登录成功');
    }
}
