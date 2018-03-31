<?php
/**
 * Created by PhpStorm.
 * User: krys
 * Date: 2018/3/29
 * Time: 19:48
 * function:连接微信接口
 */
//echo "hello!";
define('TOKEN','KRYS');
$obj=new Weixin();

if(!isset($_GET['echostr'])){

    $obj->receive();

}else{
    $obj->checkSignature();
}

class weixin{

    public  function checkSignature()
    {
        $signature = $_GET["signature"];   //加密签名
        $timestamp = $_GET["timestamp"]; //时间戳
        $nonce = $_GET["nonce"];	//随机数

        $token = TOKEN; //token


        $tmpArr = array($token, $timestamp, $nonce);//组成新数组
        sort($tmpArr, SORT_STRING);//重新排序
        $tmpStr = implode( $tmpArr );//转换成字符串
        $tmpStr = sha1( $tmpStr );  //再将字符串进行加密


        if( $tmpStr == $signature ){

            echo  $_GET['echostr'];
        }else{
            return false;
        }
    }

    public  function receive(){
        $obj = $GLOBALS['HTTP_REW_POST_DATA'];
        $postSql = simplexml_load_string($obj,'SimpleXMLElement',LIBXML_NOCDATA);
        $this->logger("接受:".$obj);

    }
    private function logger($content){
        $logSize = 100000;
        $log = "log.txt";
        if(file_exists($log)&&filesize($log) > $logSize){
            unlink($log);
        }
        file_put_contents($log,date('h:i:s')."  ".$content.'\n',FILE_APPEND);

    }


}

?>