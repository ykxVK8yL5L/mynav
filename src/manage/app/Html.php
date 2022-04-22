<?php

namespace app;

class Html extends Base
{

    public function __construct()
    {
        parent::__construct();
        ob_implicit_flush();
    }

    public function flush()
    {

        $menu = $this->db->select('category', '*', [
            "ORDER" => ["sort" => "ASC"]
        ]);
        $menuTree = $this->toTree($menu);
        $navigation = $this->db->select('nav', '*');
        $navigation = $this->toClass($navigation, $this->toKVMenu($menu));
        $navigation = $this->sortNav($navigation);


        
        if(empty($this->param['tpl'])){
        	$tpl = 'template';
        }else{
        	$tpl = $this->param['tpl'];
        }

        $file = 'setting.json';
        if(!is_file($file)){
            $contents = '[]';          
            file_put_contents($file, $contents);
        }
        $string = file_get_contents("setting.json");
        $settings = json_decode($string, true);


        $setting = array();
        foreach ($settings as $key => $value) {
            $setting[$value['key']]=$value['value'];
        }


        ob_start();

        $this->fetch('view/'.$tpl, [
            'menuTree' => $menuTree,
            'navigation' => $navigation,
            'setting' => $setting,
        ]);
          
        $html = ob_get_contents();
        ob_end_clean();
        if (isset($this->param['preview']) && true == $this->param['preview']) {
            echo $html;
        } else {
            $file = 'index.html';
            file_put_contents('../'.$file, $html);
            echo '<div style="width:100%;text-align:center"><h2 >更新成功</h2><br><a href="index.php">返回</a> &nbsp;&nbsp;<a href="/'.$file.'" target="_blank">查看结果</a></div>';
        }
    }


    /**
     * 无限级分类
     * 
     * @param $menu
     * @param $pid 
     * 
     * @return array
     */
    private function toTree($menu, $pid = 0)
    {
        $treeMenu = [];
        foreach ($menu as $value) {
            if ($value['pid'] == $pid) {
                $treeMenu[] = array_merge($value, [
                    'child' => $this->toTree($menu, $value['id'])
                ]);
            }
        }
        return $treeMenu;
    }

    /**
     * 分类整理成k=>v结构
     * @param $menu array
     * @return array
     */
    private function toKVMenu($menu)
    {
        $kvMenu = [];
        foreach ($menu as $val) {
            $kvMenu[$val['id']] = $val;
        }
        return $kvMenu;
    }

    /**
     * 分类汇总
     */
    private function toClass($nav, $kvMenu)
    {
        $classNav = [];

        foreach ($nav as $item) {
            if (!isset($classNav[$item['category_id']])) {
                $classNav[$item['category_id']] = [
                    'category_id' => $item['category_id'],
                    'category_name' => $kvMenu[$item['category_id']]['category_name'],
                    'sort' => $kvMenu[$item['category_id']]['sort']
                ];
            }
            $classNav[$item['category_id']]['nav'][] = $item;
        }

        return $classNav;
    }


    /**
     * 倒叙排序
     */
    private function sortNav($nav)
    {
        foreach ($nav as  $key => $value) {
            array_multisort(array_column($value['nav'], 'nav_sort'), SORT_DESC, $nav[$key]['nav']);
        }

        array_multisort(array_column($nav, 'sort'), SORT_ASC, $nav);
        return $nav;
    }
}
