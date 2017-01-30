<?php

use yii\db\Migration;

class m161113_142538_product extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%product}}', [
            'product_id' => $this->primaryKey(),
            'product_name' => $this->string(100)->notNull()->unique(),            
            'product_slug' => $this->string(100)->notNull()->unique(),

            'image' => $this->string(),

            'price_push_up' => $this->integer()->notNull(),
            'price_real' => $this->integer()->notNull(),
            'quantity' => $this->integer()->notNull(),
            'start_sale' => $this->date(),
            'end_sale' => $this->date(),

            'id_category' => $this->integer()->notNull(),
            'id_supplier' => $this->string(20)->notNull(),

            'meta_keyword' => $this->string(),          
            'meta_description' => $this->text(),          
            'tags' => $this->string(),         

            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey(
            'fk-product-id_category',
            'product',
            'id_category',
            'category',
            'category_id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-product-id_supplier',
            'product',
            'id_supplier',
            'supplier',
            'supplier_id',
            'CASCADE'
        );
    }

    public function down()
    {

        $this->dropForeignKey(
            'fk-product-id_category',
            'product'
        );

         $this->dropForeignKey(
            'fk-product-id_supplier',
            'product'
        );
        $this->dropTable('{{%product}}');
    }
}
