<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order`.
 */
class m180217_121956_create_order_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(), 
            'slug'=>$this->string(16)->notNull(),
            
            'user_id' => $this->integer()->notNull(),
            'request_id' => $this->integer(),
            
            'amount' => $this->money(),

            'status' => $this->integer()->notNull()->defaultValue(0),

            'created_by' => $this->integer()->notNull()->defaultValue(1),
            'updated_by' => $this->integer()->notNull()->defaultValue(1),
            
            'created_at' => $this->integer()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->notNull()->defaultValue(0),
            
        ], $tableOptions);

        // creates index for column `user_id`
        $this->createIndex(
            'fki-order-user-id',
            '{{%order}}',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-order-user-id',
            '{{%order}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `request_id`
        $this->createIndex(
            'fki-order-request-id',
            '{{%order}}',
            'request_id'
        );
        // add foreign key for table `request`
        $this->addForeignKey(
            'fk-order-request-id',
            '{{%order}}',
            'request_id',
            '{{%request}}',
            'id',
            'CASCADE'
        );


        // creates index for column `created_by`
        $this->createIndex(
            'fki-order-created-by',
            '{{%order}}',
            'created_by'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-order-created-by',
            '{{%order}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            'fki-order-updated-by',
            '{{%order}}',
            'updated_by'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-order-updated-by',
            '{{%order}}',
            'updated_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%order}}');
    }
}
