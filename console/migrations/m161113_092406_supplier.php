<?php

use yii\db\Migration;

class m161113_092406_supplier extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%supplier}}', [
            'supplier_id' => $this->string(20)->notNull()->unique(),
            'supplier_name' => $this->string(100)->notNull()->unique(),
            'mobile' => $this->string(20)->notNull(),
            'id_province' => $this->string(20)->notNull(),
            'address' => $this->string(150)->notNull(),

            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'PRIMARY KEY (supplier_id)',
        ], $tableOptions);

        $this->addForeignKey(
            'fk-supplier-id_province',
            'supplier',
            'id_province',
            'province',
            'province_id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-supplier-id_province',
            'supplier'
        );
        $this->dropTable('{{%supplier}}');
    }
}
