<?php
$host = "127.0.0.1";
$port = '9999';

function jiraLogin($user, $pwd, $host, $port) {
	$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
	if($socket === false) {
		return false;
	}
	socket_set_option($socket, SOL_SOCKET, SO_SNDTIMEO, ['sec' => 5, 'usec' => 0]);
    socket_set_option($socket, SOL_SOCKET, SO_RCVTIMEO, ['sec' => 5, 'usec' => 0]);
	$con = @socket_connect($socket, $host, $port);
	if(!$con){
		//socket_strerror(socket_last_error($socket);
		@socket_close($socket);
		return false;
	}
	$userPwd = trim($user . "||" . $pwd);
	$hear=socket_read($socket, 1024);
	socket_write($socket, $userPwd, strlen($userPwd));
	echo $hear . PHP_EOL;
	$res = socket_read($socket, 1024);
	//socket_shutdown($socket);
	socket_close($socket);
	return $res;
}

$res = jiraLogin('chengjinsheng', 'Jelly', $host, $port);
echo $res . PHP_EOL;
if($res == 'ok') {
	echo "success";
} else {
	echo 'fail';
}
