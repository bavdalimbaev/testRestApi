<?php


namespace app\resource;

use app\models\Vacancy;

class Feedback extends \app\models\Feedback
{
    public function fields()
    {
        return ['id', 'name', 'phone', 'email'];
    }

    public function extraFields()
    {
        return ['vacancy'];
    }

    /**
     * Gets query for [[Vacancy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVacancy()
    {
        return $this->hasOne(Vacancy::class, ['id' => 'vacancy_id']);
    }

}