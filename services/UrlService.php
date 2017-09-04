<?php
/**
 * Created by PhpStorm.
 * User: 4
 * Date: 2017/9/4
 * Time: 14:27
 */

namespace app\services;



//统一管理链接，并规范书写
use yii\helpers\Url;

class UrlService
{
    //返回一个内部链接
    public static function buildUrl($url,$params = []){
        return Url::toRoute(array_merge([$url],$params));
    }

    //返回一个空连接
    public static function buildNullUrl(){
        return "javascript:void(0);";
    }
}