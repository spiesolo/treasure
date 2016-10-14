<?php

use yii\db\Migration;

class m161010_060051_createtables extends Migration
{
    public function up()
    {

        $tableOptions = null;
        if ($this->db->drivername == 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('sensors', [
            'ID' => $this->primaryKey(),
            'MacSN' => $this->string()->unique()->notNull(),
            'MacName' => $this->string()->notNull(),
            'TransInterval' => $this->integer()->notNull(),
            'OnLine' => $this->integer(32),
            'Ver' => $this->string(32),
            'IP' => $this->string(64),
            'NewTime' => $this->datetime(),
            'RelatedEquipment' => $this->string(),
            'Alarm' => $this->integer()->notNull(),
            'CurTemperature' => $this->float(),
            'CurHumidity' => $this->float(),
            'TempLowLimit' => $this->float(),
            'TempHighLimit' => $this->float(),
            'HumiLowLimit' => $this->float(),
            'HumiHighLimit' => $this->float(),
            'TempLowerThreshold' => $this->float()->notNull(),
            'TempUpperThreshold' => $this->float()->notNull(),
            'HumiLowerThreshold' => $this->float()->notNull(),
            'HumiUpperThreshold' => $this->float()->notNull(),
            ], $tableOptions);



        $this->createTable('SD_area', [
            'ID' => $this->primaryKey(),
            'a_sn' => $this->string()->unique()->notNull(),
            'a_parent_sn' => $this->string()->notNull(),
            'a_name' => $this->string()->unique()->notNull(),
            'a_remark' => $this->string(),
            'a_status' => $this->integer(),
            ], $tableOptions);

        $this->createTable('SD_employee', [
            'ID' => $this->primaryKey(),
            'e_pin' => $this->string(32)->unique()->notNull(),
            'e_name' => $this->string(64),
            'e_sex' => $this->string(8),
            'e_age' => $this->smallinteger(),
            'e_idcard' => $this->string(32),
            'e_mobile' => $this->string(32),
            'e_dept_no' => $this->string(),
            'e_duty' => $this->string(),
            'e_class' => $this->string(32),
            'e_title' => $this->string(32),
            'e_pri' => $this->string(8),
            'e_grp' => $this->string(8),
            'e_tz' => $this->string(32),
            'e_fingerprint' => $this->string(32),
            'e_face' => $this->string(32),
            'e_card' => $this->string(32),
            'e_passwd' => $this->string(32),
            'e_photo' => $this->string(),
            'e_checkin_dt' => $this->datetime(),
            'e_resign_dt' => $this->datetime(),
            'e_black_flag' => $this->string(8),
            'e_status' => $this->integer(),
            ], $tableOptions);

        $this->createTable('SD_department', [
            'ID' => $this->primaryKey(),
            'd_sn' => $this->string()->unique()->notNull(),
            'd_parent_sn' => $this->string()->notNull(),
            'd_name' => $this->string()->unique()->notNull(),
            'd_label' => $this->string(),
            'd_admin' => $this->string(64),
            'd_duty' => $this->string(),
            'd_remark' => $this->string(),
            'd_status' => $this->integer(),
            ], $tableOptions);


        $this->createTable('SD_face', [
            'ID' => $this->primaryKey(),
            'fa_owner_pin' => $this->string(32)->notNull(),
            'fa_index' => $this->smallinteger()->notNull(),
            'fa_size' => $this->smallinteger()->notNull(),
            'fa_content' => $this->string(4096)->notNull(),
            'fa_machine' => $this->string(),
            'fa_version' => $this->string(32),
            'fa_status' => $this->integer(),
            ], $tableOptions);


        // add unique index for table `SD_face`
        $this->createIndex(
            'idx-unq-SD_face-fa_owner_pin-fa_index',
            'SD_face',
            ['fa_owner_pin',
            'fa_index'],
            true
        );


        $this->createTable('SD_fingerprint', [
            'ID' => $this->primaryKey(),
            'fp_owner_pin' => $this->string(32)->notNull(),
            'fp_index' => $this->smallinteger()->notNull(),
            'fp_size' => $this->smallinteger()->notNull(),
            'fp_content' => $this->string(4096)->notNull(),
            'fp_machine' => $this->string(),
            'fp_version' => $this->string(32),
            'fp_status' => $this->integer(),
            ], $tableOptions);

        // add unique index for table `SD_fingerprint`
        $this->createIndex(
            'idx-unq-SD_fingerprint-fp_owner_pin-fp_index',
            'SD_fingerprint',
            ['fp_owner_pin',
            'fp_index'],
            true
        );

        $this->createTable('SD_signin', [
            'ID' => $this->primaryKey(),
            's_owner_pin' => $this->string(32)->notNull(),
            's_signtime' => $this->datetime()->notNull(),
            's_workstatus' => $this->smallinteger()->notNull(),
            's_verifytype' => $this->smallinteger()->notNull(),
            's_workcode' => $this->smallinteger()->notNull(),

            's_machinesn' => $this->string(64),
            's_owner_name' => $this->string(64),
            's_owner_deptno' => $this->string(),
            's_owner_deptname' => $this->string(),
            's_status' => $this->integer(),
            ], $tableOptions);


        $this->createTable('SD_runlog', [
            'ID' => $this->primaryKey(),
            'r_type' => $this->integer()->notNull(),
            'r_content' => $this->string(2048)->notNull(),
            'r_logtime' => $this->datetime()->notNull(),
            'r_operator' => $this->string(64)->notNull(),
            'r_operateitem' => $this->string(64)->notNull(),
            'r_status' => $this->integer(),
            ], $tableOptions);


        $this->createTable('SD_pc2machine', [
            'ID' => $this->primaryKey(),
            'p_machinesn' => $this->string(64)->notNull(),
            'p_orderid' => $this->integer()->notNull(),
            'p_ordercontent' => $this->string(4096)->notNull(),
            'p_ordertime' => $this->datetime(),
            'p_sendouttime' => $this->datetime(),
            'p_responsetime' => $this->datetime(),
            'p_responsevalue' => $this->string(16),
            'p_execflag' => $this->string(16),
            'p_status' => $this->integer(),
            ], $tableOptions);

        // add unique index for table `SD_pc2machine`
        $this->createIndex(
            'idx-unq-SD_pc2machine-p_machinesn-p_orderid',
            'SD_pc2machine',
            ['p_machinesn',
            'p_orderid'],
            true
        );


        $this->createTable('SD_machine', [
            'ID' => $this->primaryKey(),
            'm_sn' => $this->string()->notNull(),
            'm_firmware' => $this->string(64),
            'm_usercount' => $this->smallinteger(),
            'm_tmpcount' => $this->smallinteger(),
            'm_signcount' => $this->smallinteger(),
            'm_ipaddress' => $this->string(64),
            'm_fpversion' => $this->string(64),
            'm_faceversion' => $this->string(64),
            'm_needfaceamount' => $this->smallinteger(),
            'm_facecount' => $this->smallinteger(),
            'm_functionflag' => $this->string(8),

            'm_stamp' => $this->string(32),
            'm_opstamp' => $this->string(32),
            'm_errordelay' => $this->smallinteger(),
            'm_delay' => $this->smallinteger(),
            'm_transtimes' => $this->string(),
            'm_transinterval' => $this->string(),
            'm_transflag' => $this->string(),
            'm_realtimetrans' => $this->string(8),
            'm_encrypt' => $this->string(8),

            'm_newtime' => $this->datetime(),
            'm_onlineinfo' => $this->string(16),
            'm_style' => $this->string(),
            'm_name' => $this->string(),
            'm_address' => $this->string(),

            'm_pushver' => $this->string(32),
            'm_language' => $this->string(8),
            'm_pushcommkey' => $this->string(),

            'm_area_ID' => $this->integer(),
            'm_status' => $this->integer(),
            ], $tableOptions);

        // add serialno unique index for table `SD_machine`
        $this->createIndex(
            'idx-unq-SD_machine-m_sn',
            'SD_machine',
            'm_sn',
            true
        );

        // add area_ID foreign key for table `SD_machine`. no cascade
        $this->addForeignKey(
            'fk-SD_machine-m_area_ID',
            'SD_machine',
            'm_area_ID',
            'SD_area',
            'ID'
        );

        // add area_ID index for table `SD_machine`
        $this->createIndex(
            'idx-SD_machine-m_area_ID',
            'SD_machine',
            'm_area_ID'
        );


        $this->createTable('SD_link_area_employee', [
            'ID' => $this->primaryKey(),
            'l_area_ID' => $this->integer()->notNull(),
            'l_employee_ID' => $this->integer()->notNull(),
            'l_status' => $this->integer(),
            ], $tableOptions);


        // add foreign key for table `SD_link_area_employee`
        $this->addForeignKey(
            'fk-link-l_area_ID',
            'SD_link_area_employee',
            'l_area_ID',
            'SD_area',
            'ID',
            'CASCADE',
            'CASCADE'
        );

        // add foreign key for table `SD_link_area_employee`
        $this->addForeignKey(
            'fk-link-l_employee_ID',
            'SD_link_area_employee',
            'l_employee_ID',
            'SD_employee',
            'ID',
            'CASCADE',
            'CASCADE'
        );


        // add unique index for table `SD_link_area_employee`
        $this->createIndex(
            'idx-unq-link-l_area_ID-l_employee_ID',
            'SD_link_area_employee',
            ['l_area_ID',
            'l_employee_ID'],
            true
        );
    }

    public function down()
    {
        // drop foreign keys
        $this->dropForeignKey('fk-SD_machine-m_area_ID', 'SD_machine');
        $this->dropForeignKey('fk-link-l_area_ID', 'SD_link_area_employee');
        $this->dropForeignKey('fk-link-l_employee_ID', 'SD_link_area_employee');

        // drop indexes
        $this->dropIndex('idx-unq-SD_face-fa_owner_pin-fa_index', 'SD_face');
        $this->dropIndex('idx-unq-SD_fingerprint-fp_owner_pin-fp_index', 'SD_fingerprint');
        $this->dropIndex('idx-unq-SD_pc2machine-p_machinesn-p_orderid', 'SD_pc2machine');
        $this->dropIndex('idx-unq-SD_machine-m_sn','SD_machine');
        $this->dropIndex('idx-SD_machine-m_area_ID','SD_machine');
        $this->dropIndex('idx-unq-link-l_area_ID-l_employee_ID','SD_link_area_employee');

        // drop tables
        $this->dropTable('SD_face');
        $this->dropTable('SD_fingerprint');
        $this->dropTable('SD_signin');
        $this->dropTable('SD_runlog');
        $this->dropTable('SD_pc2machine');
        $this->dropTable('SD_machine');
        $this->dropTable('SD_employee');
        $this->dropTable('SD_department');
        $this->dropTable('SD_link_area_employee');
        $this->dropTable('SD_area'); // put it here for foreign key limit.

        $this->dropTable('sensors'); // put it here for foreign key limit.

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
