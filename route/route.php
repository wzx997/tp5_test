<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use \think\facade\Route;

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('hello/:name', 'index/hello');

//路径：模块名/控制器名/方法名
Route::get('db_test1', 'database/DataBaseTest/test');
Route::post('getAllUser', 'database/DataBaseTest/getAllUser');
Route::post('getUser', 'database/DataBaseTest/getUser');
Route::post('insertOne', 'database/DataBaseTest/insertOne');

//使用model操作数据
Route::post('modelGetAllUser', 'database/DataBaseTest/modelGetAllUser');
Route::post('modelInsert', 'database/DataBaseTest/modelInsert');
Route::post('modelDel', 'database/DataBaseTest/modelDel');
Route::post('modelUpd', 'database/DataBaseTest/modelUpd');
Route::post('modelGetData', 'database/DataBaseTest/modelGetData');

// 测试获取请求参数
Route::post('testReq', 'database/DataBaseTest/testReq');
Route::get('testReqGet', 'database/DataBaseTest/testReq');

//文件下载
Route::get('download1', 'database/DataBaseTest/download1');
Route::get('download2', 'database/DataBaseTest/download2');

//日志处理
Route::post('testLog', 'database/DataBaseTest/testLog');

//数据验证
Route::post('validateTest1', 'database/ValidateTest/validateTest1');
Route::post('validateTest2', 'database/ValidateTest/validateTest2');
//Route::post('validateTest1', 'database/ValidateTest/validateTest1')->allowCrossDomain();
//Route::post('validateTest2', 'database/ValidateTest/validateTest2')->allowCrossDomain();
Route::post('validateTest3', 'database/ValidateTest/validateTest3');
Route::post('validateTest4', 'database/ValidateTest/validateTest4');

//session和cookie的测试
Route::get('sessionTest', 'database/SessionCookie/sessionTest');

//文件上传
Route::post('upload1', 'database/Upload/upload1');
Route::post('upload2', 'database/Upload/upload2');

//图像库处理
Route::post('image1', 'database/ImageController/image1');

//数据库关联查询测试
Route::post('joinTest1', 'database/JoinController/joinTest1');
Route::post('joinTest2', 'database/JoinController/joinTest2');
Route::post('joinTest3', 'database/JoinController/joinTest3');
Route::post('joinTest4', 'database/JoinController/joinTest4');

// 测试封装公共的返回方法
Route::post('baseTest1', 'database/BaseTest/baseTest1');

// 生成验证码
Route::post('getCaptcha', 'database/LoginController/captcha');
Route::post('login', 'database/LoginController/login');

//分组路由允许跨域
//Route::group('v1', function () {
//    Route::post('validateTest3', 'database/ValidateTest/validateTest3');
//    Route::post('validateTest4', 'database/ValidateTest/validateTest4');
//})->allowCrossDomain();

//所有路由允许跨域
Route::group('v1', function () {})->allowCrossDomain();



return [

];
