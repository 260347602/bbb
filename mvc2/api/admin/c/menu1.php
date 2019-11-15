<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/15
 * Time: 10:56
 */
namespace api\admin\c;
use api\admin\m\mys;

class menu1 {
    function top(){
        $da = new mys();
        $aa = $da->int();
        echo json_encode($aa);
    }
}