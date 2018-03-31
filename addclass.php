<?php
/**
 * Created by PhpStorm.
 * User: krys
 * Date: 2018/3/31
 * Time: 16:04
 * function:教师进行添加班级
 */
error_reporting(0);
session_start();
$userid = $_SESSION['userid'];
$con = mysqli_connect('localhost','root','1011','system');
if (!$con) {
    die("连接失败:".mysqli_connect_error());
}
$department = $_POST['department'];
$classno = $_POST['classno'];
$grade = $_POST['grade'];
$classname = $_POST['classname'];
$classnum = $_POST['classnum'];

//if($cno==""||$cname==""||$credit==""){
//    echo "<script>alert('任一项都不能为空请重新填入！');location = 'addcourse.php';</script>";
//}
if($department!=""&&$classno!=""&&$grade!=""&&$classname!=""&&$classnum!=""){

    $sql = "SELECT * FROM class WHERE classNo = '$classno'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    if(!$row){
        //插入记录
        $sql1 = "INSERT INTO class (className,department,grade,classNo,classNum) VALUES ('$classname','$department','$grade','$classno','$classnum')";
        if( mysqli_query($con,$sql1)){
            $sql2 = "INSERT INTO tcl (teaID,classNO) VALUES ('$userid','$classno')";
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
        <form action="addclass.php" method="post">
            <p><span>所属院系</span><input type="text" name="department" id="department"/> </p>
            <p><span>班级编号</span><input type="text" name="classno" id="classno"></p>
            <p><span>所属年级</span><input type="text" name="grade" id="grade" placeholder="后两个数字"/> </p>
            <p><span>班级名字</span><input type="text" name="classname" id="classname" placeholder="请写上年级"/></p>
            <p><span>班级人数</span><input type="text" name="classnum" id="classnum"/></p>
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
        var text1 = document.getElementById("department").value;
        var text2 = document.getElementById("classno").value;
        var text3 = document.getElementById("grade").value;
        var text4 = document.getElementById("classname").value;
        var text5 = document.getElementById("classnum").value;
        if(text1==""||text1==null){
            alert("所属二级院系不能为空");
        }
        if(text2==""||text2==null){
            alert("班级编号不能为空");
        }
        if(text3==""||text3==null){
            alert("年级不能为空");
        }
        if(text1==""||text1==null){
            alert("班级名字不能为空");
        }
        if(text1==""||text1==null){
            alert("班级人数不能为空");
        }
    }
</script>
</html>
