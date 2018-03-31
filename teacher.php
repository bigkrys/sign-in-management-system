<?php
/**
 * Created by PhpStorm.
 * User: krys
 * Date: 2018/3/8
 * Time: 16:18
 * function:教师页面
 */
//禁用错误报告
error_reporting(0);
session_start();
$username = $_SESSION['username'];
$userid = $_SESSION['userid'];
$_SESSION['username'] = $username;
$_SESSION['userid'] = $userid;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>教师页面</title>
    <link rel="icon" type="img/x-ico" href="img/L.ico" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/teacher.css"/>
    <script src="js/bootstrap.js" type="text/javascript" charset="utf-8"></script>

</head>

<body>
<div class="content">
    <div class="upside">
        <div class="upleft">
            <div class="button">
                <a href="teachangepwd.html" class="changepwd">修改密码</a>
            </div>
        </div>
        <div class="upright">
            <div class="hello">hello!</div>
            <div id="name">
                <?php echo $username;?>老师
            </div>
        </div>
    </div>

    <div class="downside">
        <div class="downleft">
            <div class="class">
				<span>班级管理</span>
                <div class="btn1">
                <a href="addclass.php" class="btn2">添加班级</a>
                <a href="index.html" class="btn2">查看班级</a>
                </div>
            </div>
        </div>
        <div class="downcenter">
            <div class="course">
				<span>课程管理</span>
                <div class="btn1">
                <a href="addcourse.php" class="btn2">添加课程</a>
                <a href="index.html" class="btn2">查看课程</a>
                </div>
            </div>
        </div>
        <div class="downright">
            <div class="qiandao">
                <a href="index.html" class="checkin">发布签到</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>

