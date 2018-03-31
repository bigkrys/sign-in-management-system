<?php
/**
 * Created by PhpStorm.
 * User: krys
 * Date: 2018/3/21
 * Time: 18:36
 * function:学生进行签到并加入后台处理（主要是将学生信息加入到数据库中）
 */
error_reporting(0);
session_start();

$con = mysqli_connect('localhost','root','1011','system');
if (!$con) {
    die("连接失败:".mysqli_connect_error());
}
$userid = $_POST['userid'];
$userclass = $_POST['class'];
$cno = $_POST['cno'];
$curtime = date("Y-m-d H:i:s");
//echo $curtime;



    $sql = "SELECT cname FROM course WHERE cno='$cno'";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_fetch_array($result);
//echo $rows[0];
    $cname = $rows[0];
//echo $cname;

    $sql1 = "SELECT teaID FROM tc WHERE cno='$cno'";
    $result1 = mysqli_query($con,$sql1);
    $rows1 = mysqli_fetch_array($result1);
    $teaID = $rows1[0];
//echo  $teaID;

    $sql2 = "SELECT teaName FROM teacher WHERE  teaID='$teaID'";
    $result2 = mysqli_query($con,$sql2);
    $rows2 = mysqli_fetch_array($result2);
    $teaName = $rows2[0];
//echo $teaName;

    $sql3 = "SELECT stuCLASS FROM student WHERE  stuID='$userid'";
    $result3 = mysqli_query($con,$sql3);
    $rows3 = mysqli_fetch_array($result3);
    $stuCLASS = $rows3[0];
//echo $stuCLASS;

    $sql4 = "SELECT stuNAME FROM student WHERE  stuID='$userid'";
    $result4 = mysqli_query($con,$sql4);
    $rows4 = mysqli_fetch_array($result4);
    $stuNAME = $rows4[0];
//echo $stuNAME;

    $sql5 = "INSERT INTO qd(stuID,stuNAME,qdtime,cno,cname,teaID,teaNAME,stuCLASS)
                     VALUES ('$userid','$stuNAME','$curtime','$cno','$cname','$teaID','$teaName','$stuCLASS')";


    $sql6 = "SELECT * FROM sc WHERE  cno='$cno'";
    $result6 = mysqli_query($con,$sql6);
    $row6 = mysqli_fetch_array($result6);

    if(!$row6){
        $sql7 = "INSERT INTO sc(stuID,cno)VALUES ('$userid','$cno')";
        mysqli_query($con,$sql7);
    }
    if( mysqli_query($con,$sql5)){
        echo "<script type='text/javascript'>alert('签到成功');location='student.php'</script>";

    }
//require_once 'check.php';


//mysqli_close($con);

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>进行签到</title>
    <link rel="icon" type="img/x-ico" href="img/L.ico" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <script src="js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
    <style type="text/css">
        body{
            height: auto;
            width: auto;
            background-color: #f5cd8b;
        }

        .wrapper{
            width: 100%;
            height: 100%;
            opacity: 0.8;
        }
        .p0{
            padding-top: 3%;
            text-align: center;
            font-size: 25px;
        }
        .content{
            width: 100%;
            height: 100%;
            padding: 5% 35%;
            text-align: center;
            font-size: large;
        }
        .p1{
            padding-top: 8%;
        }
        .p2{
            padding-top: 13%;
            padding-left: 17%;
        }
        .content input{
            display: inline-block;
            border-radius: 5%;
            -moz-border-radius: 5%;
            -webkit-border-radius:5%;
        }

        @media only screen and (min-width: 100px) and (max-width: 340px) {

            .content{
                width: 100%;
                height: 100%;
                padding: 2% 15%;
                text-align: center;
                font-size: large;
            }
            .p1{
                padding-top: 8%;
            }
            .p2{
                padding-top: 13%;
                padding-left: 17%;
            }
            .content input{
                display: inline-block;
                border-radius:5%;
                -moz-border-radius: 5%;
                -webkit-border-radius: 5%;
            }
        }

    </style>
</head>
<body>
<div class="wrapper">
    <div class="content">
        <form action="qd.php" method="post">
            <p>
                <span>课程编号</span>  &emsp;&emsp;<input type="text"name="cno"/>
            </p>
            <p class="p1">
                <span>班级</span>  &emsp;&emsp;<input type="text"  name="class"/>
            </p>
            <p class="p1">
                <span>学号</span>  &emsp;&emsp;<input type="text"  name="userid"/>
            </p>
            <p class="p1">
                <input type="submit" value="提交" class="btn btn-default " />

            </p>

        </form>
    </div>
</div>
</body>
</html>
