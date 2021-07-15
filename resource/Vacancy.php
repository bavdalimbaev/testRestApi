<?php


namespace app\resource;


use app\models\Feedback;

class Vacancy extends \app\models\Vacancy
{
    public function fields()
    {
        return ['id', 'title', 'description'];
    }

    public function extraFields()
    {
        return ['create_at'];
    }

    /**
     * Gets query for [[Feedback]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFeedbacks()
    {
        return $this->hasMany(Feedback::class, ['vacancy_id' => 'id']);
    }

}