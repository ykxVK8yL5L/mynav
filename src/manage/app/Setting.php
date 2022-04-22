<?php

namespace app;

class Setting extends Base
{
    public function index()
    {

        $file = 'setting.json';
        if(!is_file($file)){
            $contents = '[]';          
            file_put_contents($file, $contents);
        }
        $string = file_get_contents("setting.json");
        //$settings = json_decode($string, true);
        $this->fetch('view/setting/index', [
            'list' => $string
        ]);
    }

    /**
     * 添加
     */
    public function save()
    {
         $file = 'setting.json';
        if (file_put_contents($file,  $this->param['setting'])) {
            return $this->successJson('保存失败');
        } else {
            return $this->failJson('添加失败');
        }
    }

}
