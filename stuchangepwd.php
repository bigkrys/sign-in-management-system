<?php
/**
 * Created by PhpStorm.
 * User: krys
 * Date: 2018/3/10
 * Time: 19:53
 * function:学生页面修改密码
 */
//禁用错误报告
error_reporting(0);
session_start();
//连接数据库
$con = mysqli_connect('localhost','root','1011','system');
if (!$con) {
    die("连接失败:".mysqli_connect_error());
}

$oldpwd = $_POST['oldpwd'];
$newpwd = $_POST['newpwd'];

$sql = "select * from student WHERE stuPWD='$oldpwd'";
$result = mysqli_query($con, $sql);
$rows = mysqli_fetch_array($result);

if($rows){
    $sql1 = "update student set stuPWD='$newpwd'WHERE stuPWD='$oldpwd'";
    $result1 = mysqli_query($con,$sql1);

    if($result1){
        echo "<script type='text/javascript'>alert('修改密码成功');location='student.php'</script>";

    }else{
        echo "<script type='text/javascript'>alert('数据插入失败');location='stuchangepwd.html'</script>";

    }
}else{
    echo "<script type='text/javascript'>alert('输入的旧密码错误，请重新输入');location='stuchangepwd.html';</script>";
}

?>

