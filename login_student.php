<?php
//禁用错误报告
error_reporting(0);
session_start();

$con = mysqli_connect('localhost','root','1011','system');
if (!$con) {
    die("连接失败:".mysqli_connect_error());
}

$userid = $_POST['userid'];
$userpwd = $_POST['userpwd'];
$username = $_POST['username'];

$sql = "select * from student WHERE stuID='$userid' AND stuPWD='$userpwd'AND student.stuNAME = '$username'";
$result = mysqli_query($con, $sql);
$rows = mysqli_fetch_array($result);
$_SESSION['username'] = $username;
$_SESSION['userid'] = $userid;
if($rows){
    echo "<script type='text/javascript'>alert('登陆成功');location='student.php';</script>";
}else{
    echo "<script type='text/javascript'>alert('信息填写有误');location='login_student.html';</script>";
}
//if($rows) {
//    //拿着提交过来的用户名和密码去数据库查找，看是否存在此学号以及其密码
//    if ($userid == $rows["stuID"] && $userpwd == $rows["stuPWD"]) {
//        //echo "验证成功！<br>";
//        echo "<script type='text/javascript'>alert('登陆成功');location='student.php';</script>";
//    } else {
////        echo "用户名或者密码错误<br>";
//        echo "<script type='text/javascript'>alert('学号或者密码错误');location='login_student.html';</script>";
//        //echo "<a href='login.html'>返回</a>";
//    }
//}
?>