<?php
/**
 * Created by PhpStorm.
 * User: 4
 * Date: 2017/9/4
 * Time: 15:17
 */

namespace app\controllers\common;

use Yii;

//所有控制器的基类，集成常用公用方法
class BaseController
{
    //统一获取post参数的方法
    public function post($key,$default = ''){
        return Yii::$app->request->post($key,$default);
    }
    //统一获取get参数的方法
    public function get($key,$default = ''){
        return Yii::$app->request->get($key,$default);
    }
    //
    protected function renderJSON($code=200,$msg='ok',$data=[]){
        header("Content-type:application/json");
        echo json_encode([
            'code' => $code,
            'msg' => $msg,
            'data' => $data,
            'req_id' => uniqid(),
        ]);
        return Yii::$app -> end();
    }
}