<?php


namespace xhprof\run;


use xhprof\bean\BaseInstance;
use xhprof\filter\InitFilter;
use xhprof\Interceptor\InitInterceptor;
use xhprof\util\ConfigUtil;
use xhprof\util\ShutdownScheduler;

/***
 * 引导程序
 * Class Boostrap
 * @package xhprof\run
 */
class Boostrap
{


    /***
     * 引导程序入口
     */
    public static function run()
    {
        try {
            //注册配置
            self::injectionConfig();
            //开启过滤器 运行拦截器
            InitFilter::getInstance()->register();
            //开启过滤器 运行拦截器
            InitInterceptor::getInstance()->register();
        }catch (\BaseException $exception){
            echo $exception->getMessage();
        }
    }

    /***
     * 注入配置文件
     */
    public static function injectionConfig()
    {
        if ($head = opendir(XHPROF_CONFIG)) {
            while (($file = readdir($head)) !== false) {
                if ($file != ".." && $file != ".") {
                    if (pathinfo($file, PATHINFO_EXTENSION) == "php") {
                        ConfigUtil::load(XHPROF_CONFIG.$file);
                    }
                }
            }
        }
        closedir($head);
    }
}

