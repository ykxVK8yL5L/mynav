<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>编辑 - 导航管理</title>
    <!-- ZUI 标准版压缩后的 CSS 文件 -->
    <link rel="stylesheet" href="../assets/zui/css/zui.min.css">
    <!-- ZUI Javascript 依赖 jQuery -->
    <script src="../assets/zui/lib/jquery/jquery.js"></script>
    <!-- ZUI 标准版压缩后的 JavaScript 文件 -->
    <script src="../assets/zui/js/zui.min.js"></script>
    <!-- uploader -->
    <link href="../assets/zui/lib/uploader/zui.uploader.min.css" rel="stylesheet">
    <script src="../assets/zui/lib/uploader/zui.uploader.min.js"></script>
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
                <div class="col-xs-6">
                    <div class="input-control">
                        <input name="nav_name" type="text" class="form-control" placeholder="站名" required>
                    </div>
                </div>
                <div class="col-xs-6">
                    <select class="form-control" name="category_id" required>
                        <option value="">请选择分类</option>
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
            </div>
            <br>
            <div class="row">
                <div class="col-xs-12">
                    <textarea name="nav_desc" class="form-control" rows="3" placeholder="描述" required></textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-6">
                    <input name="nav_link" type="url" class="form-control" placeholder="链接" required>
                </div>
                <div class="col-xs-3">
                    <select class="form-control" name="nav_target" required>
                        <option value="_parent">在父框架集中打开被链接文档</option>
                        <option value="_top">在整个窗口中打开被链接文档</option>
                        <option value="_blank" selected>在新窗口中打开被链接文档</option>
                        <option value="_self">默认。在相同的框架中打开被链接文档</option>
                    </select>
                </div>
                <div class="col-xs-3">
                    <input name="nav_sort" type="number" class="form-control" placeholder="排序" required>
                </div>

            </div>
            <br>
            <div class="row">
                <div id="uploader" class="uploader ">
                    <div class="uploader-message text-center">
                        <div class="content"></div>
                        <button type="button" class="close">×</button>
                    </div>
                    <div class="file-list col-xs-9" data-drag-placeholder="请拖拽文件到此处"></div>
                    <div class="col-xs-1">
                        <input value="" type="hidden" name='nav_icon' password="false"></input>
                    </div>
                    <button type="button" class="btn btn-primary uploader-btn-browse col-xs-2"><i class="icon icon-cloud-upload"></i> 选择文件</button>
                </div>
            </div>
            <br />
            <div class="row text-center">
                <button type="submit" class="btn btn-primary">修改</button>
                <button type="reset" class="btn">重置</button>
            </div>
        </form>
    </div>

</body>
<script>
    var formData = <?php echo json_encode($nav, JSON_UNESCAPED_UNICODE); ?>;
    var keys = Object.keys(formData);
    for (var i = 0; i < keys.length; i++) {
        $('input[name=' + keys[i] + ']').val(formData[keys[i]])
        $('textarea[name=' + keys[i] + ']').val(formData[keys[i]])
        if ($('select[name=' + keys[i] + ']').length > 0) {
            $('select[name=' + keys[i] + '] option[value=' + formData[keys[i]] + ']').prop("selected", "selected");
        }
    }

    staticFiles = []
    if ($('input[name=nav_icon]').val()) {
        staticFiles.push({
            name: 'nav_icon.png', // 文件名，例如"myfile.gif"
            url: $('input[name=nav_icon]').val(), // 文件名，例如"myfile.gif"
            type: 'image/png' // 文件类型，例如"image/jpeg"
        })
    }
    uploader = $('#uploader').uploader({
        autoUpload: false, // 当选择文件后立即自动进行上传操作
        url: '?control=upload', // 文件上传提交地址
        limitFilesCount: 1,
        removeUploaded: true,
        deleteActionOnDone: function(file, doRemoveFile) {
            $('input[name=nav_icon]').val('');
            doRemoveFile();
        },
        uploadedMessage: false,
        staticFiles: staticFiles,
        filters: {
            // 只允许上传图片或图标（.ico）
            mime_types: [{
                title: '图片',
                extensions: 'png'
            }],
            // 最大上传文件为 1MB
            max_file_size: '1mb',
            // 不允许上传重复文件
            prevent_duplicates: true
        },
        onFileUploaded: function(file, responseObject) {
            resp = JSON.parse(responseObject.response)
            $('input[name=nav_icon]').val(resp.url)
        },
        onUploadComplete: function(files) {
            if ($('input[name=nav_icon]').val() == '') {
                return
            }
            $.ajax({
                url: '?control=nav&action=update',
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
                            window.location.href = '?control=nav&action=index'
                        }, 2000)
                    } else {
                        new $.zui.Messager(resp.msg, {
                            type: 'danger'
                        }).show();
                    }
                }
            })
        }
    });

    $('form').on('submit', function(event) {
        if ($(".file").attr('data-status')) {
            $('#uploader').data('zui.uploader').start();
        }else{
            $('input[name=nav_icon]').val('') ;
            $.ajax({
                url: '?control=nav&action=update',
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
                            window.location.href = '?control=nav&action=index'
                        }, 1000)
                    } else {
                        new $.zui.Messager(resp.msg, {
                            type: 'danger'
                        }).show();
                    }
                }
            })
        }
        console.log(event)
        return false;
    })
</script>

</html>