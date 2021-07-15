<?php

use yii\db\Migration;

/**
 * Class m210715_140852_create_vacancy
 */
class m210715_140852_create_vacancy extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('vacancies', [
            'id' => $this->primaryKey()->notNull()->append('AUTO_INCREMENT'),
            'title' => $this->string(),
            'description' => $this->text(),
            'created_at' => $this->integer(),
            'updated_ad' => $this->integer()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('vacancies');
    }

}
