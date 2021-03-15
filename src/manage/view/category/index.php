<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>分类列表 - 导航管理</title>
    <!-- ZUI 标准版压缩后的 CSS 文件 -->
    <link rel="stylesheet" href="../assets/zui/css/zui.min.css">
    <!-- ZUI Javascript 依赖 jQuery -->
    <script src="../assets/zui/lib/jquery/jquery.js"></script>
    <!-- ZUI 标准版压缩后的 JavaScript 文件 -->
    <script src="../assets/zui/js/zui.min.js"></script>
</head>

<body>
    <div class="nav">
        <?php include './view/menu.php'; ?>
    </div>
    <div class="nav-list container">
        <div class="btn-group">
            <a class="btn btn-primary" href="?control=category&action=create">添加</a>
        </div>
        <!-- HTML 代码 -->
        <table class="table datatable">
            <thead>
                <tr>
                    <!-- 以下两列左侧固定 -->
                    <th>#</th>
                    <th>分类名称</th>
                    <!-- 以下三列中间可滚动 -->
                    <th class="flex-col" data-width="100">父级ID</th>
                    <th class="flex-col" data-width="100">排序ID</th>
                    <!-- 以下列右侧固定 -->
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list as $key => $nav) : ?>
                    <tr>
                        <td><?php echo $nav['id'] ?></td>
                        <td><?php echo $nav['category_name'] ?></td>
                        <td><?php echo $nav['pid'] ?></td>
                        <td>
                            <span class="label label-info"><?php echo $nav['sort'] ?></span>
                        </td>
                        <td>
                            <a href="?control=category&action=edit&id=<?php echo $nav['id']; ?>" class="btn btn-sm btn-primary" type="button">编辑</a>
                            <button class="btn btn-sm btn-danger" onclick="delNav(<?php echo $nav['id']; ?>)" type="button">删除</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
<script>
    function delNav(id) {
        $.ajax({
            url: '?control=category&action=delete&id=' + id,
            method: 'DELETE',
            dataType: 'JSON',
            success: function(resp) {
                if (resp.code == 0) {
                    new $.zui.Messager('删除成功。', {
                        type: 'success'
                    }).show();
                    setTimeout(function() {
                        window.location.reload()
                    }, 1000)
                } else {
                    new $.zui.Messager(resp.msg, {
                        type: 'danger'
                    }).show();
                }
            }
        })
    }
</script>

</html>