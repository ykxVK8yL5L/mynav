<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改分类 - 导航管理</title>
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
        <form class="form" action="?control=nav&action=update" method="post">
            <input type="hidden" name="id">
            <div class="row">
                <div class="col-xs-12">
                    <div class="input-control">
                        <input name="category_name" type="text" class="form-control" placeholder="站名" required>
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
                            <?php if (isset($item['sub_category'])) : ?>
                                <?php foreach ($item['sub_category'] as $item) : ?>
                                    <option value="<?php echo $item['id']; ?>">
                                        |------ <?php echo $item['category_name']; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-xs-6">
                    <div class="input-control">
                        <input name="sort" type="text" class="form-control" placeholder="排序" required value="<?php echo $item['sort'] ?>">
                    </div>
                </div>
            </div>
            <br>

            <div class="row text-center">
                <button type="submit" class="btn btn-primary">修改</button>
                <button type="reset" class="btn">重置</button>
            </div>
        </form>
    </div>

</body>
<script>
    var formData = <?php echo json_encode($data, JSON_UNESCAPED_UNICODE); ?>;
    var keys = Object.keys(formData);
    for (var i = 0; i < keys.length; i++) {
        $('input[name=' + keys[i] + ']').val(formData[keys[i]])
        $('textarea[name=' + keys[i] + ']').val(formData[keys[i]])
        if ($('select[name=' + keys[i] + ']').length > 0) {
            $('select[name=' + keys[i] + '] option[value=' + formData[keys[i]] + ']').prop("selected", "selected");
        }
    }

    $('form').on('submit', function(event) {
        $.ajax({
            url: '?control=category&action=update',
            data: $('form').serializeArray(),
            dataType: 'json',
            method: 'POST',
            success: function(resp) {
                console.log(resp)
                if (resp.code == 0) {
                    new $.zui.Messager('修改成功。', {
                        type: 'success'
                    }).show();
                    setTimeout(function() {
                        window.location.href = '?control=category&action=index'
                    }, 2000)
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