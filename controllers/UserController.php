<?php
/**
 * Created by PhpStorm.
 * User: 4
 * Date: 2017/9/4
 * Time: 15:39
 */

namespace app\controllers;

use Yii;
use app\controllers\common\BaseController;
use app\models\User;
use app\services\UrlService;

class UserController extends BaseController
{
    public function actionVlogin(){
        $reback_url=UrlService::buildUrl('/');
        $uid=$this->get('uid',0);
        if(!$uid){
            return $this->redirect($reback_url);
        }

        $user_info=User::find()->where(['id' => $uid])->one();
        if(!$user_info){
            return $this->redirect($reback_url);
        }

        //cookie保存用户的登录状态，需要加密
        //用户登录验证码
        $user_auth_token=md5($user_info['id'].$user_info['email'].$user_info['name'].$_SERVER['HTTP_USER_AGENT']);
        $cookie_target=Yii::$app->request->cookie;
        $cookie_target->add(new \yii\web\Cookie([
            'name'=>'NicoleChan_8888',
            'value' => $user_auth_token.'#'.$user_info['id'],
        ]));
        return $this->redirect($reback_url);
    }
}