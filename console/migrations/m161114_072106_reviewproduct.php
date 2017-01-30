<?php

use yii\db\Migration;

class m161114_072106_reviewproduct extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%reviewproduct}}', [
            'reviewproduct_id' => $this->primaryKey(),
            'id_customer' => $this->integer()->notNull(),            
            'id_product' => $this->integer()->notNull(),            


            'customer_name' => $this->string(100)->notNull(),
            'customer_email' => $this->string(100)->notNull(),
            'content' => $this->string()->notNull(),
            'rating' => $this->smallInteger(),

            'parent_review_id' => $this->integer(),


            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey(
            'fk-reviewproduct-id_customer',
            'reviewproduct',
            'id_customer',
            'customer',
            'customer_id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-reviewproduct-id_product',
            'reviewproduct',
            'id_product',
            'product',
            'product_id',
            'CASCADE'
        );
    }

    public function down()
    {

        $this->dropForeignKey(
            'fk-reviewproduct-id_customer',
            'reviewproduct'
        );

         $this->dropForeignKey(
            'fk-reviewproduct-id_product',
            'reviewproduct'
        );
        $this->dropTable('{{%reviewproduct}}');
    }
}
