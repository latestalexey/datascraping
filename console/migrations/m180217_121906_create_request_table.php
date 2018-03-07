<?php

use yii\db\Migration;

/**
 * Handles the creation of table `request`.
 */
class m180217_121906_create_request_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%request}}', [
            'id' => $this->primaryKey(), 
            'slug'=>$this->string(16)->notNull(),
            
            'status' => $this->integer()->notNull()->defaultValue(0),

            'first_name'=>$this->string(32)->notNull(),
            'last_name'=>$this->string(32)->notNull(),

            'email'=>$this->string(32)->notNull(),
            'phone'=>$this->string(32)->notNull(),

            'company_name'=>$this->string(64)->notNull(),
            'job_title'=>$this->string(64),
            
            'location_id' => $this->integer(),

            'project_name'=>$this->string(32)->notNull(),
            'websites'=>$this->text()->notNull(),
            'type'=>$this->integer()->notNull(), 
            'extraction_fields'=>$this->text()->notNull(),
            'records'=>$this->integer()->notNull(),
            'frequency'=>$this->integer()->notNull(),
            'attachment'=>$this->string(256),
            'description'=>$this->text(),
            
            'created_at' => $this->integer()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->notNull()->defaultValue(0),
            
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%request}}');
    }
}
