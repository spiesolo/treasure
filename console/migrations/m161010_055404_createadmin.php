<?php

use yii\db\Migration;

class m161010_055404_createadmin extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        // generate admin user with password 'admin'
        $auth_key = Yii::$app->security->generateRandomString();
        $password_hash = Yii::$app->security->generatePasswordHash('admin');

        $this->insert('{{%user}}',
            ['username' => 'admin', 'auth_key' => $auth_key,
             'password_hash' => $password_hash, 'email' => 'admin@example.com']);

    }

    public function down()
    {

       $this->delete('{{%user}}', ['username' => 'admin']);
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
