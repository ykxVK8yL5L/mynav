<?php


namespace app;


use Medoo\Medoo;

abstract class Base
{

    /**
     * 配置参数
     * @var array
     */
    protected $config = [];

    /**
     * 数据库对象
     * @var Medoo
     */
    protected $db;

    /**
     * 请求参数
     * @var array
     */
    protected $param = [];

    public function __construct()
    {
        $this->config = $this->loadConfig();
        $this->param = $this->loadParam();
        $this->db = $this->initMedoo();
    }

    /**
     * 加载配置文件
     * @return array
     */
    private function loadConfig()
    {
        $configFile = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config.php';
        return include_once $configFile;
    }

    /**
     * 加载请求参数
     * @return array
     */
    private function loadParam()
    {
        $param = [];
        $postString = file_get_contents('php://input');
        @$xml = simplexml_load_string($postString);
        if ($xml) {
            $param = array_merge($param, $xml);
        }
        @$json = json_decode($postString, true);
        if ($json) {
            $param = array_merge($param, $json);
        }
        $param = array_merge($param, $_GET);
        $param = array_merge($param, $_POST);
        return $param;
    }

    /**
     * 初始化数据库
     * @return Medoo
     */
    private function initMedoo()
    {
        return new Medoo($this->config['db']);
    }

    /**
     * 渲染模版
     *
     * @param $templatePath
     * @param array $assignArgs
     * @return mixed
     */
    protected function fetch($templatePath, $assignArgs = [])
    {
        extract($assignArgs);
        return include "./$templatePath.php";
    }

    /**
     * 输出json
     * @param $data
     * @return void
     */
    protected function json($data)
    {
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    /**
     * 返回正确的json字符串
     * @param array $data
     * @param string $msg
     * @return void
     */
    protected function successJson($data = [], $msg = 'OK')
    {
        $this->json([
            'code' => 0,
            'msg' => $msg,
            'data' => $data
        ]);
    }

    /**
     * 返回错误的json字符串
     * @param $msg
     * @param array $data
     * @return void
     */
    protected function failJson($msg, $data = [])
    {
        $this->json([
            'code' => 1,
            'msg' => $msg,
            'data' => $data
        ]);
    }

    /**
     * 转换成树形结构
     * @param array $category
     * @param int $pid
     * @return array
     */
    protected function categoryToTree($category = [], $pid = 0)
    {
        $tree = [];
        foreach ($category as $item) {
            if ($item['pid'] != $pid) {
                continue;
            }
            $tree[] = array_merge($item, [
                'sub_category' => $this->categoryToTree($category, $item['id'])
            ]);
        }
        return $tree;
    }
}