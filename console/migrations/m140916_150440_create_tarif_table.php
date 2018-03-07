<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tarif`.
 */
class m140916_150440_create_tarif_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%tarif}}', [
            'id' => $this->primaryKey(), 
            'slug' => $this->string(128)->notNull()->unique(),

            'name' => $this->string(512)->notNull(),
            'description' => $this->text(255),
            
            'amount' => $this->money(), //стоимость подписки
            'qty' => $this->integer(), //кол-во оплаченых снимков 
            'extra_price' => $this->money(), //цена за снимок сверх тарифа
            
            //атрибуты тестового периода
            'test_period_title' => $this->string(32),
            'test_period_value' => $this->integer(),
            'test_period_unit' => $this->string(32),

            //атрибуты рабочего периода
            'period_title' => $this->string(32),
            'period_value' => $this->integer(),
            'period_unit' => $this->string(32),

            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'visible' => $this->smallInteger()->notNull()->defaultValue(0),

            'created_at' => $this->integer()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->notNull()->defaultValue(0),

        ], $tableOptions);

        
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%tarif}}');
    }
}
