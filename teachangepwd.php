<?php
/**
 * Created by PhpStorm.
 * User: krys
 * Date: 2018/3/10
 * Time: 19:53
 * function:教师页面修改密码
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

$sql = "select * from teacher WHERE teaPWD='$oldpwd'";
$result = mysqli_query($con, $sql);
$rows = mysqli_fetch_array($result);

if($rows){
    $sql1 = "update teacher set teaPWD='$newpwd'WHERE teaPWD='$oldpwd'";
    $result1 = mysqli_query($con,$sql1);

    if($result1){
        echo "<script type='text/javascript'>alert('修改密码成功');location='teacher.php'</script>";

    }else{
        echo "<script type='text/javascript'>alert('数据插入失败');location='teachangepwd.html'</script>";

    }
}else{
    echo "<script type='text/javascript'>alert('输入的旧密码错误，请重新输入');location='teachangepwd.html';</script>";
}

?>

