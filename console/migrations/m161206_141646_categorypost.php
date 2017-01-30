<?php

use yii\db\Migration;

class m161206_141646_categorypost extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%categorypost}}', [
            'categorypost_id' => $this->primaryKey(),
            'categorypost_name' => $this->string(100)->notNull()->unique(),            
            'categorypost_slug' => $this->string(100)->notNull()->unique(),  
            'parent_id' => $this->smallInteger()->notNull()->defaultValue(0),

            'image' => $this->string(),          
            'description' => $this->string(),          
            'order_by' => $this->smallInteger()->unique(),
            
            'meta_keyword' => $this->string(),          
            'meta_description' => $this->string(),          

            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%categorypost}}');
    }
}
