<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/6
 * Time: 20:11
 */
namespace app\m;
class user{
    function a(){
        $d=new \mysqli('127.0.0.1','root','root','test');//'\'=>顶级空间 new mysqli创建一个mysql的连接对象
        $s = $d->query('select * from user');//查询
        $s = \mysqli_fetch_all($s);//读取
        $d->close();//关闭
        return $s;
}
}