<?php
/**
 * Created by PhpStorm.
 * User: krys
 * Date: 2018/3/31
 * Time: 17:30
 * function:教师查看班级
 */
error_reporting(0);
session_start();
$userid = $_SESSION['userid'];
$con = mysqli_connect('localhost','root','1011','system');
if (!$con) {
    die("连接失败:".mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>查看班级</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="img/x-ico" href="img/L.ico" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <script src="js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
    <style type="text/css">
        body{
            background-color: #b8f1cc;

        }
        .container{
            padding-top: 30px;

        }
    </style>
</head>
<body>
<div class="container">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>序号</th>
            <th>班级编号</th>
            <th>班级名字</th>
            <th>所属院系</th>
            <th>班级人数</th>

        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT DISTINCT classNo,className,department,classNum FROM class WHERE  sID='$userid'";
        $result = mysqli_query($con,$sql);
        $count = mysqli_num_rows($result);
        $i=1;
        while(        $row = mysqli_fetch_array($result)){

            echo "<tr>
                         <th>$i</th>
                        <th>$row[cno]</th>
                        <th>$row[cname]</th>
                        <th>$row[teaNAME]</th>

                     </tr>";

            $i++;
        }
        ?>

        </tbody>
    </table>
</div>
</body>
</html>
