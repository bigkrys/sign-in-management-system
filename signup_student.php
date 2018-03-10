<?php
session_start();
header("Content-type:text/html;charset=utf-8");
//获取刚刚注册所以填入的信息
$userid = $_POST['userid'];
$userpwd = $_POST['userpwd'];
$username = $_POST['username'];
$usersex = $_POST['usersex'];
$userdepartment = $_POST['userdepartment'];
$userclass = $_POST['userclass'];
//连接数据库
$link = mysqli_connect('localhost','root','1011','system');
if (!$link) {
    die("连接失败:".mysqli_connect_error());
}
$sql = "select * from student";
$result = mysqli_query($link, $sql);
$rows = mysqli_fetch_array($result);

//如果学号已经注册将无法进行注册
if(mysqli_fetch_array(mysqli_query($link,"select * from student where stuID = '$userid'")))
{
    echo "<script>alert('学号已存在,请进行登录');window.location.href='login_student.html'</script>";
    // 判断用户名是否已经被注册
}

$sql= "insert into student(stuID, stuPWD, stuNAME, stuSEX,stuDEPARTMENT,stuCLASS)values('$userid','$userpwd','$username','$usersex','$userdepartment','$userclass')";
//插入数据库
if(!(mysqli_query($link,$sql))){
    echo "<script>alert('数据插入失败');location='signup_student.html';</script>";
}else{
    echo "<script type='text/javascript'>alert('注册成功，请进行登录');location='login_student.html';</script>";
}
?>