<?php


namespace app\controllers;


use yii\filters\auth\HttpBearerAuth;

class ActiveController extends \yii\rest\ActiveController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['only'] = ['create', 'update', 'delete'];
        $behaviors['authenticator']['authMethods'] = [
            HttpBearerAuth::class
        ];

        return $behaviors;
    }


//    Проверка на собственность авторизованного пользователя
//    public function checkAccess($action, $model = null, $params = [])
//    {
//        if(in_array($action, ['update', 'delete']) && $model->user_id !== \Yii::$app->user->id) {
//            throw new ForbiddenHttpException("У вас нет прав для редактирования");
//        }
//    }
}