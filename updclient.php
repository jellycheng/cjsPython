<?php

#$serverHost = '10.59.80.13';
$serverHost = '10.28.80.101'; #'127.0.0.1';
$serverPort = '9991';
$sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
$msg = '我提交的内容hijelly';
$len = strlen($msg);
var_dump($sock);
//发送内容
socket_sendto($sock, $msg, $len, 0, $serverHost, $serverPort);
//usleep(1);
$con = @socket_recv($sock, $buf, 2048, MSG_WAITALL);
if($con!=1) {
    $con .= "未接收内容";
}
socket_close($sock);


echo $con . "|end" . PHP_EOL;
