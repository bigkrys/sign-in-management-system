<?php
/**
 * Created by PhpStorm.
 * User: krys
 * Date: 2018/3/8
 * Time: 15:18
 * function:学生进行签到的页面
 */
//禁用错误报告
error_reporting(0);
session_start();
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>学生签到页面</title>
    <link rel="icon" type="img/x-ico" href="img/L.ico" />

    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/student.css"/>
    <script src="js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        //将body的高度设置为当前页面的高度，用来自适应
    </script>
</head>
<body>
<div class="content">
    <div class="upside">
        <div class="upleft">
            <div class="button">
                <a href="stuchangepwd.html" class="changepwd">修改密码</a>
            </div>
        </div>
        <div class="upright">
            <div class="hello">hello!</div>
            <div id="name">
                <?php echo $username;?>
            </div>
        </div>
    </div>

    <div class="downside">
        <div class="downleft">
            <div class="read">
                <a href="index.html" class="readcou">查看课程</a>
            </div>
        </div>
        <div class="downright">
            <div class="qiandao">
                <a href="index.html" class="checkin">进行签到</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>

