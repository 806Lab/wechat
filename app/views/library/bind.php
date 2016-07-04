<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://designmodo.github.io/Flat-UI/dist/css/flat-ui.css">
    <script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body style="padding-top: 70px">
<div class="container">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">图书馆</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/index.php/library/borrowed_books">已结图书</a></li>
                    <li class="active"><a href="/index.php/library/bind">绑定</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <?php if ($result === false): ?>
        <form class="form-inline" action="/index.php/library/add" method="post">
            <div class="form-group">
                <label>学号</label>
                <input type="text" name="uname" class="form-control">
            </div>
            <div class="form-group">
                <label>密码</label>
                <input type="password" name="passwd" placeholder="学校图书馆系统密码" class="form-control">
            </div>
            <button type="submit" class="btn btn-block btn-lg btn-primary">添加绑定</button>
        </form>
    <?php else: ?>
        <form class="form-inline" action="/index.php/library/delete" method="get">
            <div class="form-group">
                <label>你已绑定用户名:<?php echo $result['uname']?></label>
            </div>
            <button type="submit" class="btn btn-block btn-lg btn-primary">重新绑定</button>
        </form>
    <?php endif; ?>
</div>
</body>
</html>



