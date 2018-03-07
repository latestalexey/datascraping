<?php

use yii\db\Migration;

use common\models\Location;

/**
 * Handles the creation of table `location`.
 */
class m170912_123339_create_location_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%location}}', [
            'id' => $this->primaryKey(), 
            'parent_id' => $this->integer(),
            'slug' => $this->string(128)->notNull()->unique(),
            'path'=>$this->string(255)->notNull()->defaultValue('/'),
            
            'name' => $this->string(128)->notNull(),
            'description' => $this->string(255),
            'keywords' => $this->string(255),

            'geoip_id'=>$this->integer(),

            'type' => $this->integer(),
            'lat' => $this->float(),
            'lng' => $this->float(),
            'accuracy'=>$this->float(),
            'default'=>$this->smallInteger()->notNull()->defaultValue(0),

            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'order_num' => $this->integer()->defaultValue(0),
            
            'created_by' => $this->integer()->notNull()->defaultValue(1),
            'updated_by' => $this->integer()->notNull()->defaultValue(1),
            
            'created_at' => $this->integer()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->notNull()->defaultValue(0),

        ], $tableOptions);

        // creates index for column `parent_id`
        $this->createIndex(
            'fki-location-parent-id',
            '{{%location}}',
            'parent_id'
        );

        // add foreign key for table `location`
        $this->addForeignKey(
            'fk-location-parent-id',
            '{{%location}}',
            'parent_id',
            '{{%location}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            'fki-location-created-by',
            '{{%location}}',
            'created_by'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-location-created-by',
            '{{%location}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            'fki-location-updated-by',
            '{{%location}}',
            'updated_by'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-location-updated-by',
            '{{%location}}',
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
        $this->dropTable('{{%location}}');
    }
}