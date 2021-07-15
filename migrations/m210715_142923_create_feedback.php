<?php

use yii\db\Migration;

/**
 * Class m210715_142923_create_feedback
 */
class m210715_142923_create_feedback extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('feedbacks', [
            'id' => $this->primaryKey()->notNull()->append('AUTO_INCREMENT'),
            'name' => $this->string(),
            'phone' => $this->char(50),
            'email' => $this->string(),
            'resume' => $this->string(),
            'created_at' => $this->integer(),
            'updated_ad' => $this->integer(),
//            'dateadd' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'vacancy_id' => $this->integer(),
        ]);

        $this->addForeignKey('FK_feedback_vacancy_vacancy_id', 'feedbacks', 'vacancy_id', 'vacancies', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_feedback_vacancy_vacancy_id', 'feedbacks');
        $this->dropTable('vacancies');
    }

}
