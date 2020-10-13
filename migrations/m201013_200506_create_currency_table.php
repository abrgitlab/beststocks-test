<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%currency}}`.
 */
class m201013_200506_create_currency_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%currency}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'rate' => $this->decimal()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%currency}}');
    }
}
