<?php



namespace app\http\middleware;

use think\facade\Request;

/**
 * API鉴权中间件
 * Class ApiAuthMiddleware
 * @package app\http\middleware
 */
class ApiAuthMiddleware
{
    public function handle($request, \Closure $next)
    {
        $token = Request::header('auth-token');
        if (!$token || $token != '123456789') {
            // 验证失败，直接返回
            return $this->response('1', '验证失败，权限不够无法访问');
        }
        // 验证成功，跳转到控制器
        return $next($request);
    }

    /**
     * @param $code
     * @param $msg
     * @return \think\Response
     */
    private function response($code, $msg)
    {
        $data = [
            'code' => $code,
            'msg' => $msg
        ];
        return response(json_encode($data))
            ->header('Content-type', 'application/json');
    }
}
