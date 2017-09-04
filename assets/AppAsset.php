<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use app\services\UrlService;
use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'bootstrap/css/bootstrap.min.css',
    ];
//    public $js = [
//        'jquery/jquery-3.2.1.min.js',
//        'bootstrap/js/bootstrap.min.js'
//    ];
//    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
//    ];

    public function registerAssetFiles($view)
    {
        //加版本号，获得最新静态文件
        $release='20170904';
        $this->css = [
            UrlService::buildUrl("bootstrap/css/bootstrap.min.css",['v' => $release]),
            UrlService::buildUrl('css/app.css'),
        ];

        $this->js = [
            UrlService::buildUrl('jquery/jquery-3.2.1.min.js'),
            UrlService::buildUrl('bootstrap/js/bootstrap.min.js'),
        ];
        parent::registerAssetFiles($view);
    }
}
