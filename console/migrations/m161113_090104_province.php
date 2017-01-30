<?php

use yii\db\Migration;

class m161113_090104_province extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%province}}', [
            'province_id' => $this->string(20)->notNull()->unique(),
            'province_name' => $this->string(100)->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'PRIMARY KEY (province_id)',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%province}}');
    }
}
