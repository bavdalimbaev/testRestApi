<?php


namespace app\controllers;


use app\resource\Feedback;
use yii\data\ActiveDataProvider;

class FeedbackController extends ActiveController
{
    public $modelClass = Feedback::class;

    public function actions()
    {
        $actions = parent::actions();
//        unset($actions['index']);
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        return $actions;
    }

    public function prepareDataProvider()
    {
        return new ActiveDataProvider([
            'query' => $this->modelClass::find()->andWhere([
                'vacancy_id' => \Yii::$app->request->get('vacancyId')
                ]),
            ]);
    }

}