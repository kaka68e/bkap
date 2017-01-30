<?php

use yii\db\Migration;

class m161206_142301_post extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%post}}', [
            'post_id' => $this->primaryKey(),
            'post_name' => $this->string(100)->notNull()->unique(),            
            'post_slug' => $this->string(100)->notNull()->unique(), 

            'image' => $this->string(),          
            'description' => $this->string(),          
            'content' => $this->text()->notNull(),   

            'meta_keyword' => $this->string(),          
            'meta_description' => $this->string(),
            'total_view' => $this->integer(),

            'id_categorypost' => $this->integer()->notNull(),        

            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'date_created_at' => $this->date()->notNull(),
            'date_updated_at' => $this->date()->notNull(),
        ], $tableOptions);

        $this->addForeignKey(
            'fk-post-id_categorypost',
            'post',
            'id_categorypost',
            'categorypost',
            'categorypost_id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-post-id_categorypost',
            'orderitem'
        );
        $this->dropTable('{{%post}}');
    }
}
