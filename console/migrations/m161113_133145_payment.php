<?php

use yii\db\Migration;

class m161113_133145_payment extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%payment}}', [
            'payment_id' => $this->string(20)->notNull()->unique(),
            'payment_name' => $this->string(100)->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'PRIMARY KEY (payment_id)',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%payment}}');
    }
}
