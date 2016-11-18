<?php

use yii\db\Migration;

class m161118_041606_consttable extends Migration
{
    public function up()
    {

        $tableOptions = null;
        if ($this->db->drivername == 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }


        $this->createTable('SD_role', [            
            'r_value' => $this->string(32)->notNull(),
            'r_name' => $this->string(255)->notNull(),            
            ], $tableOptions);
            
        $this->createTable('SD_sex', [            
            's_value' => $this->string(32)->notNull(),
            's_name' => $this->string(255)->notNull(),            
            ], $tableOptions);

        $this->batchInsert('{{%SD_role}}',['r_value', 'r_name'],
            [['r_value' => '0',  'r_name' => '普通用户'],
            ['r_value' => '2',  'r_name' => '登记员'],
            ['r_value' => '6',  'r_name' => '管理员'],
            ['r_value' => '10', 'r_name' => '用户自定义'],
            ['r_value' => '14', 'r_name' => '超级管理员']]);
        $this->batchInsert('{{%SD_sex}}',['s_value', 's_name'],
            [['s_value' => '0', 's_name' => '男'],
            ['s_value' => '1', 's_name' => '女']]);

    }

    public function down()
    {
        // drop tables
        $this->dropTable('SD_role');
        $this->dropTable('SD_sex');
        return true;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
