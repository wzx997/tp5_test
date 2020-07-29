<?php
//Author：王志祥
//说明：


namespace app;

use think\Controller;

/**
 * 自定义控制器的基类。定义返回的格式 --> 也可以定义在公共方法方法的文件中
 * Class BaseController
 * @package app
 */
class BaseController extends Controller
{
    /**
     * 响应数据的通用方法
     * @param $code string 返回状态码，必填
     * @param mixed $data 返回数据，默认是一个数组，也可以是一个对象
     * @param string $msg 返回的消息文本
     * @return array
     */
    public function response($code, $data = [], $msg = '请求成功')
    {
        return [
            'code' => $code,
            'msg' => $msg,
            'data' => $data,

        ];
    }

    /**
     *  正确处理响应的返回形式
     * @param mixed $data 成功的数据。数组或者对象，也可以是空
     * @param string $msg 返回的消息文本
     * @param int $code 返回状态码，成功默认是0
     * @return array
     */
    public function resSuccess($data = [], $msg = '请求成功', $code = 0)
    {
        return $this->response($code, $data, $msg);
    }

    /**
     * 错误处理响应的返回形式
     * @param string $msg 返回的消息文本
     * @param mixed $data 失败的数据，一般为空
     * @param int $code 返回状态码，失败默认是0
     * @return array
     */
    public function resFail($msg = '请求失败', $code = 1, $data = [])
    {
        return $this->response($code, $data, $msg);
    }
}