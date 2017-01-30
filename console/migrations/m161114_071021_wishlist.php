<?php

use yii\db\Migration;

class m161114_071021_wishlist extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%wishlist}}', [
            'id_customer' => $this->integer()->notNull(),
            'id_product' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'PRIMARY KEY (id_customer,id_product)',
        ], $tableOptions);

        $this->addForeignKey(
            'fk-wishlist-id_customer',
            'wishlist',
            'id_customer',
            'customer',
            'customer_id',
            'CASCADE'
        );

         $this->addForeignKey(
            'fk-wishlist-id_product',
            'wishlist',
            'id_product',
            'product',
            'product_id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-wishlist-id_customer',
            'wishlist'
        );

         $this->dropForeignKey(
            'fk-wishlist-id_product',
            'wishlist'
        );
        $this->dropTable('{{%wishlist}}');
    }
}
