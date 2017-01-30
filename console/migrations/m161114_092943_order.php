<?php

use yii\db\Migration;

class m161114_092943_order extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%order}}', [
            'order_id' => $this->primaryKey(),
            'id_customer' => $this->integer(),     

            'customer_name' => $this->string(100)->notNull(),
            'mobile' => $this->string(20)->notNull(), 
            'address' => $this->string()->notNull(), 
            'email' => $this->string(120)->notNull(),

            'customer_ship' => $this->string(100)->notNull(),
            'mobile_ship' => $this->string(20)->notNull(), 
            'address_ship' => $this->string()->notNull(), 
            'email_ship' => $this->string(120)->notNull(), 

            'request' => $this->string(), 

            'id_payment' => $this->string(20)->notNull(),
            'id_deliver' => $this->string(20)->notNull(),

            'total' => $this->integer()->notNull(),   

            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey(
            'fk-order-id_customer',
            'order',
            'id_customer',
            'customer',
            'customer_id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-order-id_payment',
            'order',
            'id_payment',
            'payment',
            'payment_id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-order-id_deliver',
            'order',
            'id_deliver',
            'deliver',
            'deliver_id',
            'CASCADE'
        );
    }

    public function down()
    {

        $this->dropForeignKey(
            'fk-order-id_customer',
            'order'
        );
        $this->dropForeignKey(
            'fk-order-id_payment',
            'order'
        );
        $this->dropForeignKey(
            'fk-order-id_deliver',
            'order'
        );
        $this->dropTable('{{%order}}');
    }
}
