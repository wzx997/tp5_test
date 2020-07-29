<?php

namespace app\http\middleware;

use think\Request;
/**
 * 跨域请求中间件
 * Class CorsMiddleware
 * @package app\http\middleware
 */
class CorsMiddleware
{
    public function handle(Request $request, \Closure $next)
    {
        header('Access-Control-Allow-Origin: *'); // 后期具体设置允许源
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, auth-token');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PATCH, PUT, DELETE');
        if ($request->isOptions()) {
            // options探路请求，先返回200 OK，然后跨域会发起一个新的请求，
            //这时候是post请求，进入到控制器中
            return response();
        }

        return $next($request);
    }
}
