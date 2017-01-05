
接口返回无数据的原因是php-fpm配置引起的。
         例如： php-fpm.conf中pm.max_requests = 10000   则一个进程处理请求数到达9999次数，此时再来一次2个及以上并发，就会必现数据为空情况。
原因： php源代码问题，一个进程处理10000之后才重启进程，
解决办法： 修改php源代码可以解决此问题，但有内存溢出风险。


只要使用官网php的源代码均会有此问题（除非修改php源代码）

修改php源代码：
方案一：
    当达到max_requests,进程退出时,sleep 50 毫秒在退出,修改代码如下
         sapi/fpm/fpm/fpm_main.c第2021行:
         加一个usleep(50000);
方案二：
    当达到max_requests,进程退出时,既可以正常退出,也可以强制退出,
    php源码采用的是强退出,sapi/fpm/fpm/fpm_main.c第2021行:
        fcgi_finish_request(&request, 1); 改为fcgi_finish_request(&request, 0);

