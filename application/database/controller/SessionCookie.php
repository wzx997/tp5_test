<?php
//Author：王志祥
//说明：

namespace app\database\controller;


use think\Controller;
use think\facade\Session;

class SessionCookie extends Controller
{
    public function sessionTest()
    {
        header('auth-token:123456789');
        session_start();
    }
}