<?php
//Author：王志祥
//说明：


namespace app\database\controller;


use think\Controller;

class Upload extends Controller
{
    // 单文件上传
    public function upload1()
    {
        // 获取表单上传文件 例如上传了001.jpg
        $file = $this->request->file('file1');
        $desc = $this->request->post('desc');
        // 移动到框架应用根目录/uploads/ 目录下
        $info = $file->move( '../application/uploads');

        if ($info) {
//            $url =
            return [
                'code' => 0,
                'msg' => '上传成功',
                'data' => [
                    'filename' => $info->getFilename(),
                    'desc' => $desc
                ]
            ];
        }

        return [
            'code' => 0,
            'msg' => '上传失败，错误原因：'.$file->getError(),
            'data' => []
        ];

    }

    // 多文件上传
    public function upload2()
    {
        // 获取表单上传文件
        $files = request()->file('images');
        foreach($files as $file){
            // 移动到框架应用根目录/uploads/ 目录下
            $info = $file->move( '../application/uploads');
            echo $info->getFilename();
        }
    }
}