<?php
namespace App\Util;

class TcpLog {

    protected static $instance = null;
    protected $msgData = [];

    public static function getInstance() {
        if(!self::$instance) {
            self::$instance = new static;
        }
        return self::$instance;
    }
    /**
     * \App\Util\TcpLog::send($msg);
     * @param $msg
     * @return bool|string
     */
    public static function send($msg) {
        static $isInit = false;
        $instance = self::getInstance();
        if(!$isInit) {
            $isInit = true;
            register_shutdown_function(array($instance, 'sendCon'));
        }
        $instance->msgData[] = $msg;
        return true;
    }

    public function sendCon() {
        $serverHost = '10.59.80.13'; //13dev机器
        $serverPort = '9991';
        $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        socket_set_option($sock, SOL_SOCKET, SO_SNDTIMEO, ['sec' => 1, 'usec' => 0]);
        socket_set_option($sock, SOL_SOCKET, SO_RCVTIMEO, ['sec' => 1, 'usec' => 0]);
        foreach ($this->msgData as $k=>$msg) {
            $len = strlen($msg);
            if(!$msg || !$len) {
                return '';
            }
            socket_sendto($sock, $msg, $len, 0, $serverHost, $serverPort);
            unset($this->msgData[$k]);
        }
        if($sock) {
            socket_close($sock);
        }

    }

}
