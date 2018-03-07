<?php

use yii\db\Migration;

/**
 * Handles the creation of table `proxy`.
 */
class m180222_185411_create_proxy_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%proxy}}', [
            'id' => $this->primaryKey(), 

            'slug'=>$this->string(16)->notNull(),
            'type' => $this->integer()->notNull()->defaultValue(0), 
            
            'location_id' => $this->integer()->notNull(),
            
            'ip'=>$this->string(32),
            'port'=>$this->integer(),
            'protocol'=>$this->integer(),

            'username'=>$this->string(32),
            'password'=>$this->string(32),

            'uptime'=>$this->integer(),
            'speed'=>$this->money(),
            'ping'=>$this->integer(),
            

            'status' => $this->integer()->notNull()->defaultValue(0),

            'description'=>$this->text(),
            'company_id'=>$this->integer(),
            'paid_to' => $this->integer()->notNull()->defaultValue(0),

            'created_at' => $this->integer()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->notNull()->defaultValue(0),

            
        ], $tableOptions);

        // creates index for column `location_id`
        $this->createIndex(
            'fki-proxy-location-id',
            '{{%proxy}}',
            'location_id'
        );
        // add foreign key for table `location`
        $this->addForeignKey(
            'fk-proxy-location-id',
            '{{%proxy}}',
            'location_id',
            '{{%location}}',
            'id',
            'CASCADE'
            
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%proxy}}');
    }
}
