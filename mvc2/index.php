<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/6
 * Time: 19:39
 */
function __autoload($class){//魔法函数 实例化一个不存在的类时被自动调用
    include_once $class.'.php';
}
$s=isset($_GET['s'])?$_GET['s']:'index/index/init';//三目运算 isset()判断一个变量是否存在
$h=explode('/',$s);//分割字符串
$className='app\\'.$h[0].'\\c\\'.$h[1];
$data = new $className();
$m=$h[2];
$data->$m();