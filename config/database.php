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

use \think\facade\Env;

//数据库连接，使用配置的方式连接数据库，而不是将整个文件上传的服务器
return [
    // 数据库类型
    'type'            => Env::get('database_type'),
    // 服务器地址
    'hostname'        => Env::get('database_hostname'),
    // 数据库名
    'database'        => Env::get('database_database'),
    // 用户名
    'username'        => Env::get('database_username'),
    // 密码
    'password'        =>Env::get('database_password'),
    // 端口
    'hostport'        => Env::get('database_hostport'),
    // 连接dsn
    'dsn'             => '',
    // 数据库连接参数
    'params'          => [],
    // 数据库编码默认采用utf8
    'charset'         => Env::get('database_charset'),
    // 数据库表前缀
    'prefix'          => Env::get('database_prefix'),
    // 数据库调试模式
    'debug'           => Env::get('database_debug'),
    // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'deploy'          => 0,
    // 数据库读写是否分离 主从式有效
    'rw_separate'     => false,
    // 读写分离后 主服务器数量
    'master_num'      => 1,
    // 指定从服务器序号
    'slave_no'        => '',
    // 自动读取主库数据
    'read_master'     => false,
    // 是否严格检查字段是否存在
    'fields_strict'   => true,
    // 数据集返回类型
    'resultset_type'  => 'array',
    // 自动写入时间戳字段
    'auto_timestamp'  => false,
    // 时间字段取出后的默认时间格式
    'datetime_format' => 'Y-m-d H:i:s',
    // 是否需要进行SQL性能分析
    'sql_explain'     => false,
    // Builder类
    'builder'         => '',
    // Query类
    'query'           => '\\think\\db\\Query',
    // 是否需要断线重连
    'break_reconnect' => false,
    // 断线标识字符串
    'break_match_str' => [],
];
