<?php

use yii\db\Migration;

class m161117_161005_orderitem extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%orderitem}}', [
            'id_order' => $this->integer()->notNull(),
            'id_product' => $this->integer()->notNull(),     

            'product_price' => $this->integer()->notNull(),
            'product_quantity' => $this->smallInteger()->notNull(), 
            'product_total' => $this->integer()->notNull(),
 
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'PRIMARY KEY (id_order,id_product)',
        ], $tableOptions);

        $this->addForeignKey(
            'fk-orderitem-id_order',
            'orderitem',
            'id_order',
            'order',
            'order_id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-orderitem-id_product',
            'orderitem',
            'id_product',
            'product',
            'product_id',
            'CASCADE'
        );

    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-orderitem-id_order',
            'orderitem'
        );
        $this->dropForeignKey(
            'fk-orderitem-id_product',
            'orderitem'
        );
        $this->dropTable('{{%orderitem}}');
    }
}
