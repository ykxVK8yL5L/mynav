<?php


namespace app;


class Category extends Base
{
    public function index()
    {
        $list = $this->db->select('category', '*', [
            "ORDER" => ["id" => "DESC"]
        ]);
        return $this->fetch('view/category/index', [
            'list' => $list
        ]);
    }

    public function create()
    {
        $category = $this->db->select('category', '*', ['pid' => 0]);
        return $this->fetch('view/category/add', [
            'category' => $category
        ]);
    }

    public function save()
    {
        $stat = $this->db->insert('category', [
            "pid" => $this->param['pid'],
            "sort" => $this->param['sort'],
            "category_name" => $this->param['category_name'],
        ]);
        if ($stat) {
            return $this->successJson($this->param);
        } else {
            return $this->failJson('添加失败');
        }
    }

    public function edit()
    {
        $data = $this->db->get('category', '*', ['id' => $this->param['id']]);
        $category = $this->db->select('category', '*', ['pid' => 0]);
        return $this->fetch('view/category/edit', [
            'data' => $data,
            'category' => $category
        ]);
    }

    public function update()
    {
        $stat = $this->db->update(
            'category',
            [
                "category_name" => $this->param['category_name'],
                "sort" => $this->param['sort'],
                "pid" => $this->param['pid'],
            ],
            [
                "id" => $this->param['id']
            ]
        );
        if ($stat) {
            return $this->successJson($this->db->get('category', '*', ['id' => $this->param['id']]));
        } else {
            return $this->failJson('修改失败');
        }
    }

    /**
     * 删除
     */
    public function delete()
    {
        $category = $this->db->get('category', '*', ['id' => $this->param['id']]);
        if (empty($category)) {
            return $this->failJson('分类不存在');
        }

        $subCategory = $this->db->get('category', '*', ['pid' => $this->param['id']]);
        if ($subCategory) {
            return $this->failJson('该分类下还有分类');
        }

        $nav = $this->db->get('nav', '*', ['category_id' => $this->param['id']]);
        if ($nav) {
            return $this->failJson('该分类下还有站点');
        }

        if ($this->db->delete('category', ['id' => $this->param['id']])) {
            return $this->successJson('删除成功');
        }
        return $this->failJson('删除失败');
    }
}
