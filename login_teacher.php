<?php
//禁用错误报告
error_reporting(0);


$con = mysqli_connect('localhost','root','1011','system');
if (!$con) {
    die("连接失败:".mysqli_connect_error());
}

$userid = $_POST['userid'];
$userpwd = $_POST['userpwd'];

$sql = "select * from teacher WHERE teaID='$userid' AND teaPWD='$userpwd'";
$result = mysqli_query($con, $sql);
$rows = mysqli_fetch_array($result);
$_SESSION['username'] = $username;
if($rows){
    echo "<script type='text/javascript'>alert('登陆成功');location='teacher.php';</script>";
}else{
    echo "<script type='text/javascript'>alert('学号或者密码错误');location='login_teacher.html';</script>";
}
//if($rows) {
//    //拿着提交过来的用户名和密码去数据库查找，看是否存在此用户名以及其密码
//    if ($userid == $rows["teaID"] && $userpwd == $rows["teaPWD"]) {
//        //echo "验证成功！<br>";
//        echo "<script type='text/javascript'>alert('登陆成功');location='teacher.php';</script>";
//    } else {
////        echo "用户名或者密码错误<br>";
//        echo "<script type='text/javascript'>alert('用户名或者密码错误');location='login_teacher.html';</script>";
//        //echo "<a href='login.html'>返回</a>";
//    }
//}
?>