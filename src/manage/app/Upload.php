<?php


namespace app;


class Upload extends Base
{

    protected $rootDir = './../storage/';

    protected $domain = '';

    public function __construct()
    {
        parent::__construct();

        $this->domain = $this->config['domain'];
    }

    public function index()
    {
        $file = $_FILES['file']; //得到文件的名称
        if ($file['type'] != 'image/png') {
            return $this->toJson([
                'result' => 'failed',               // 文件上传失败
                'message' => '文件类型仅允许PNG类型'    // 用于在界面上提示用户的消息
            ]);
        }


        $subDir = $this->rootDir . date('Ym');
        $filename = uniqid(date('Ym')) . '.' . end(explode('/', $file['type']));

        if (!is_dir($subDir)) {
            mkdir($subDir, 0777, true);
        }

        // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
        $filepath = $subDir . '/' . $filename;
        if (move_uploaded_file($file["tmp_name"], $filepath)) {
            return $this->toJson([
                'result' => 'ok',     // 文件上传成功
                'url' => $this->toResourcesUri($filepath)        // 文件的下载地址
            ]);
        }
    }

    private function toResourcesUri($str)
    {
        return str_replace('./../', $this->domain . '/', $str);
    }

    private function toJson($data)
    {
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}
