<?php
/**
 * Created by PhpStorm.
 * User: krys
 * Date: 2018/3/31
 * Time: 16:04
 * function:教师进行添加课程
 */
error_reporting(0);
session_start();
$userid = $_SESSION['userid'];
$con = mysqli_connect('localhost','root','1011','system');
if (!$con) {
    die("连接失败:".mysqli_connect_error());
}
$cno = $_POST['cno'];
$cname = $_POST['cname'];
$credit = $_POST['credit'];

//if($cno==""||$cname==""||$credit==""){
//    echo "<script>alert('任一项都不能为空请重新填入！');location = 'addcourse.php';</script>";
//}
if($cno!=""&&$cname!=""&&$credit!=""){

    $sql = "SELECT * FROM course WHERE cno = '$cno'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    if(!$row){
        //插入记录
        $sql1 = "INSERT INTO course (cno,cname,credit) VALUES ('$cno','$cname','$credit')";
        if( mysqli_query($con,$sql1)){
            $sql2 = "INSERT INTO tc (teaID,cnO) VALUES ('$userid','$cno')";
            if(mysqli_query($con,$sql2)){
                echo "<script>alert('添加成功');location = 'teacher.php';</script>";

            }

        }

    }else{
        //数据库有此课程编号的
        echo "<script>alert('对不起，您已经添加过此编号！请换一个数字');</script>";
    }


}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>添加课程</title>
    <link rel="icon" type="img/x-ico" href="img/L.ico" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <script src="js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
    <script src="jQuery/jquery-3.1.0.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="wrapper1">
    <div class="content">
        <form action="addcourse.php" method="post">
            <p><span>课程编号</span> <input type="text" name="cno" id="cno"/> </p>
            <p><span>课程名字</span> <input type="text" name="cname" id="cname"></p>
            <p><span>课程学分</span><input type="text" name="credit" id="credit"/></p>
            <p><input type="submit" value="确定提交" onmouseover="check()" class="btn btn-default" /></p>
        </form>
    </div>
</div>

</body>
<style type="text/css">
    body{
        padding: 0px;
        margin: 0px;
        background-color: #f5cd8b;
    }
    .wrapper1{
        padding: 10% 20%;
    }
    span{
        font-size: 23px;
    }
    p{
        padding-top: 5%;
        text-align: center;
    }

</style>
<script type="text/javascript">
    function check(){
        var text1 = document.getElementById("cno").value;
        var text2 = document.getElementById("cname").value;
        var text3 = document.getElementById("credit").value;
        if(text1==""||text1==null){
            alert("课程编号不能为空");
        }
        if(text2==""||text2==null){
            alert("课程名不能为空");
        }
        if(text3==""||text3==null){
            alert("学分不能为空");
        }
    }
</script>
</html>
