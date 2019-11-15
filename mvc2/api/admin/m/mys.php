<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/15
 * Time: 10:58
 */
namespace api\admin\m;
use extend\model;

class mys extends model {
    function int(){
        $d = new mysqli('127.0.0.1'.'root','root','mn');

        $s = $d->query('select * from menu');
        $m=[];
        while ($s = $d->query('select * from menu')){
            $m[]=$s;
        }
        $d->close();
        return $m;
    }
}