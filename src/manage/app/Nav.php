<?php

namespace app;

class Nav extends Base
{
    public function index()
    {
        $list = $this->db->select(
            'nav',
            [
                '[><]category' => ['category_id' => 'id']
            ],
            [
                'nav.id',
                'nav.nav_name',
                'nav.nav_desc',
                'nav.category_id',
                'nav.nav_icon',
                'nav.nav_target',
                'nav.nav_link',
                'nav.nav_sort',
                'category.category_name',
            ],
            [
                "ORDER" => ["nav.id" => "DESC"]
            ]
        );

        $this->fetch('view/index/index', [
            'list' => $list
        ]);
    }

    /**
     * 添加页面
     */
    public function create()
    {
        $category = $this->categoryToTree($this->db->select('category', '*'));
        $this->fetch('view/index/add', [
            'category' => $category
        ]);
    }

    /**
     * 添加
     */
    public function save()
    {
        $stat = $this->db->insert('nav', [
            "category_id" => $this->param['category_id'],
            "nav_name" => $this->param['nav_name'],
            "nav_desc" => $this->param['nav_desc'],
            "nav_icon" => $this->param['nav_icon'] ?? '',
            "nav_link" => $this->param['nav_link'],
            "nav_target" => $this->param['nav_target'],
            "nav_sort" => $this->param['nav_sort'],
        ]);
        if ($stat) {
            return $this->successJson($this->param);
        } else {
            return $this->failJson('添加失败');
        }
    }

    /**
     * 修改页面
     */
    public function edit()
    {
        $category = $this->categoryToTree($this->db->select('category', '*'));
        $nav = $this->db->get('nav', '*', ['id' => $this->param['id']]);
        $this->fetch('view/index/edit', [
            'category' => $category,
            'nav' => $nav
        ]);
    }

    /**
     * 修改
     */
    public function update()
    {
        $stat = $this->db->update(
            'nav',
            [
                "category_id" => $this->param['category_id'],
                "nav_name" => $this->param['nav_name'],
                "nav_desc" => $this->param['nav_desc'],
                "nav_icon" => $this->param['nav_icon'] ?? '',
                "nav_link" => $this->param['nav_link'],
                "nav_target" => $this->param['nav_target'],
                "nav_sort" => $this->param['nav_sort'],
            ],
            [
                "id" => $this->param['id']
            ]
        );
        if ($stat) {
            return $this->successJson($this->db->get('nav', '*', ['id' => $this->param['id']]));
        } else {
            return $this->failJson('修改失败');
        }
    }

    /**
     * 删除
     */
    public function delete()
    {
        $nav = $this->db->get('nav', '*', ['id' => $this->param['id']]);
        if (empty($nav)) {
            return $this->failJson('该条目不存在');
        }
        if ($this->db->delete('nav', ['id' => $this->param['id']])) {
            $this->successJson([], '删除成功');
        } else {
            $this->failJson('删除失败');
        }
    }
}
