<?php
//取得当前工作目录（其实就是命令行执行目录 如php test/cwd.php 就是返回test的所在目录）, 当前工作目录可以使用chdir()来改变目录
echo getcwd();
//php test/cwd.php 就是返回test的所在目录
//php cwd.php 就是返回cwd.php的所在目录
