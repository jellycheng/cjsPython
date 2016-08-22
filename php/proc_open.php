<?php

/**
resource proc_open ( string $cmd命令, 
					array $descriptorspec , 
					array &$pipes其中0单元负责写内容1单元负责读内容
					 [, string $cwd工作目录 [, array $env环境变量 [, array $other_options ]]] )
类似popen，但比popen强大
resource popen ( string $command命令, string $mode模式r或w)打开进程文件指针	
$descriptorspec = array(
   0 => array("pipe", "r"),  // 标准输入，子进程从此管道中读取数据
   1 => array("pipe", "w"),  // 标准输出，子进程向此管道中写入数据
   2 => array("file", "/tmp/error-output.txt", "a") // 标准错误，写入到一个文件
);
popen() - 打开进程文件指针
exec() - 执行一个外部程序，string exec(string $command命令 [, array &$output结果[, int &$return_var程序结束状态码]] )返回最后一行内容
system() - 执行外部程序，并且显示输出，string system ( string $command命令 [, int &$return_var程序结束状态码] )
passthru() - 执行外部程序并且显示原始输出，void passthru(string $command命令[, int &$return_var程序结束状态码] )
stream_select()
string shell_exec ( string $cmd命令)返回命令返回结果
proc_terminate(resource $process [, int $signal = 15 ] ):杀除由 proc_open 打开的进程,返回bool值
array proc_get_status ( resource $process )获取由 proc_open() 函数打开的进程的信息，如进程ID，命令，是否停止等
bool proc_nice ( int $increment )修改当前进程优先级

*/
#proc_open()执行一个命令，并且打开用来输入/输出的文件指针

$descriptorspec = array(
   0 => array("pipe", "r"),  // 标准输入，子进程从此管道中读取数据 stdin
   1 => array("pipe", "w"),  // 标准输出，子进程向此管道中写入数据 stdout
   2 => array("file", "/tmp/error-output.txt", "a") // 标准错误，写入到一个文件 stderr
);

$cwd = '/tmp';
$env = array('some_option' => 'hi');
$process = proc_open('php', $descriptorspec, $pipes, $cwd, $env);
if (is_resource($process)) {
    fwrite($pipes[0], '<?php print_r($_ENV); ?>'); //向管道写内容
    fclose($pipes[0]);//关闭

    $con = stream_get_contents($pipes[1]);//从读管道中读内容
    fclose($pipes[1]);//关闭
    // 切记：在调用 proc_close 之前关闭所有的管道以避免死锁。
    $code = proc_close($process); //关闭进程且返回进程退出码
    echo $con . PHP_EOL;
    echo $code . PHP_EOL;
}
