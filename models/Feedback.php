<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "feedbacks".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $resume
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $vacancy_id
 *
 * @property Vacancy $vacancy
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedbacks';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
//            [
//                'class' => BlameableBehavior::class,
//                'updatedByAttribute' => false
//            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'email', 'vacancy_id'], 'required'],
            [['vacancy_id'], 'integer'],
            [['name', 'email', 'resume'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 50],
            [['created_at', 'updated_at'], 'integer'],
            [['vacancy_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vacancy::class, 'targetAttribute' => ['vacancy_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'resume' => 'Resume',
            'created_at' => 'Created_At',
            'updated_at' => 'Updated_At',
            'vacancy_id' => 'Vacancy ID',
        ];
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

    /**
     * {@inheritdoc}
     * @return \app\models\query\FeedbackQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\FeedbackQuery(get_called_class());
    }
}
