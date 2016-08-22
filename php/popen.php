<?php
/**
resource popen ( string $command命令, string $mode模式r或w)打开进程文件指针,进程的管道	
*/
$cmd = "ls -a";
$cmd = "ipconfig /all";
$content = exeCmd($cmd);
echo $content . PHP_EOL;

function exeCmd($cmd) {
	$hd = popen($cmd, 'r');
	$content = '';
	while (!feof($hd)) { 
		$content .= fread($hd, 1024);//2096   读取文件
	}
	pclose($hd);
	return $content;
}

#启动一个守护进程命令
$handle = popen("tail -f /data1/logs/app/sp/rpc/160*/*.log 2>&1", 'r');
while(!feof($handle)) {
    $buffer = fgets($handle, 1024);//从文件指针中读取一行
    echo $buffer . PHP_EOL;
    ob_flush();
    flush();
}
pclose($handle);

/**
$filename = "c:\\files\\somepic.gif";
$handle = fopen($filename, "rb");
$contents = fread($handle, filesize($filename));
fclose($handle);
*/
