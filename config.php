<?php
/**
 * Created by PhpStorm.
 * User: krys
 * Date: 2018/3/8
 * Time: 14:19
 * function:用以PHP链接数据库！
 */
function connect(){
    session_start();
    error_reporting(0);
//链接数据库
    $con = mysqli_connect('localhost','root','1011','system');
    if (!$con) {
        die("连接失败:".mysqli_connect_error());
    }else{
        echo 链接数据库成功;
    }
}
?>