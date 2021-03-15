<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加分类 - 导航管理</title>
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
    <div class="nav-edit container">
        <!-- HTML 代码 -->
        <form class="form" action="?control=cateory&action=save" method="post">
            <div class="row">
                <div class="col-xs-12">
                    <div class="input-control">
                        <input name="category_name" type="text" class="form-control" placeholder="分类名称" required>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-6">
                    <select class="form-control" name="pid" required>
                        <option value="0">顶级分类</option>
                        <?php foreach ($category as $item) : ?>
                            <option value="<?php echo $item['id']; ?>">|-- <?php echo $item['category_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-xs-6">
                    <div class="input-control">
                        <input name="sort" type="text" class="form-control" placeholder="排序" required value="999">
                    </div>
                </div>
            </div>

            <br>
            <div class="row text-center">
                <button type="submit" class="btn btn-primary">添加</button>
                <button type="reset" class="btn">重置</button>
            </div>
        </form>
    </div>

</body>
<script>
    $('form').on('submit', function(event) {
        $.ajax({
            url: '?control=category&action=save',
            data: $('form').serializeArray(),
            dataType: 'json',
            method: 'POST',
            success: function(resp) {
                console.log(resp)
                if (resp.code == 0) {
                    new $.zui.Messager('添加成功。', {
                        type: 'success'
                    }).show();
                    setTimeout(function() {
                        window.location.href = '?control=category&action=index'
                    }, 1000)
                } else {
                    new $.zui.Messager(resp.msg, {
                        type: 'danger'
                    }).show();
                }
            }
        })
        console.log(event)
        return false;
    })
</script>

</html>