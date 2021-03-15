<!doctype html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>导航管理</title>
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
    <div class="container-fluid">
        <h2 id="date" style="text-align: center"></h2>
    </div>
</body>
<script>
    setInterval(function() {
        var date = new Date()
        var dateStr = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate() + ' ' + date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds()
        $('#date').html(dateStr)
    }, 1000)
</script>

</html>