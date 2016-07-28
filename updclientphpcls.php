<?php
namespace App\Util;

class TcpLog {

    /**
     * \App\Util\TcpLog::send($msg);
     * @param $msg
     * @return bool|string
     */
    public static function send($msg) {
        $len = strlen($msg);
        if(!$msg || !$len) {
            return '';
        }
        $serverHost = '10.59.80.13'; //13dev机器
        $serverPort = '9991';
        $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);

        socket_sendto($sock, $msg, $len, 0, $serverHost, $serverPort);
        //usleep(1);
        $con = @socket_recv($sock, $buf, 2048, MSG_WAITALL);
        if($con!=1) {
            return fasle;
        }
        socket_close($sock);
        return true;
    }


}
