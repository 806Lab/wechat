<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://designmodo.github.io/Flat-UI/dist/css/flat-ui.css">
    <script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
</head>
<style>
    td{
        font-size: small;
    }
</style>
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
                <a class="navbar-brand" href="#">本科教务</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/wechat/index.php/seam/classtable">查课表</a></li>
                    <li class="active"><a href="/wechat/index.php/seam/scores">查成绩</a></li>
                    <li><a href="/wechat/index.php/seam/innovative_credit">创新学分</a></li>
                    <li><a href="/wechat/index.php/seam/bind">绑定</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <form method="post" action="/wechat/index.php/seam/scores">
        <?php echo $semesters?>
        <button type="submit" style="width: 100%" class="btn btn-primary">查询</button>
    </form>
    <script>
        semester = document.getElementById("XNXQ");
        semester.setAttribute("style", "width: 100%");
        semester.setAttribute("data-toggle", "select");
        semester.setAttribute("class", "form-control select select-default mrs mbm");
        for (var i = 0; i < semester.length; i++){
            if (semester[i].value == "<?php echo $semester; ?>"){
                semester[i].selected = true;
            }
        }
    </script>
    <table class="table table-striped table-hover table-bordered">
        <?php echo $scores ?>
    </table>
    <script src="/wechat/assets/js/flat-ui.min.js"></script>
    <script src="/wechat/assets/js/application.js"></script>
</div>
</body>
</html>