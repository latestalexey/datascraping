<?php

use yii\db\Migration;

/**
 * Handles the creation of table `transaction`.
 */
class m180228_172711_create_transaction_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%transaction}}', [
            'id' => $this->primaryKey(), 

            'slug'=>$this->string(16)->notNull(),
            'type' => $this->integer()->notNull()->defaultValue(0), // тип транзакции пополнение, списание и т.п.
            'paytype'=> $this->integer()->notNull()->defaultValue(2), // способ оплаты, по умолчанию внутреннее перемещение

            'user_id' => $this->integer()->notNull(),
            'order_id' => $this->integer(),
            
            'status' => $this->integer()->notNull()->defaultValue(0),

            'amount'=>$this->money()->notNull(),
            'description'=>$this->text(),

            'created_at' => $this->integer()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->notNull()->defaultValue(0),

            'invoice_id' => $this->string(64),
            
        ], $tableOptions);

        // creates index for column `user_id`
        $this->createIndex(
            'fki-transaction-user-id',
            '{{%transaction}}',
            'user_id'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-transaction-user-id',
            '{{%transaction}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `order_id`
        $this->createIndex(
            'fki-transaction-order-id',
            '{{%transaction}}',
            'order_id'
        );
        // add foreign key for table `order`
        $this->addForeignKey(
            'fk-transaction-order-id',
            '{{%transaction}}',
            'order_id',
            '{{%order}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%transaction}}');
    }
}
