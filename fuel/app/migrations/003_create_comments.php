<?php

namespace Fuel\Migrations;

class Create_comments
{
	public function up()
	{
		\DBUtil::create_table('comments', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'name' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'email' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'website' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'message' => array('null' => false, 'type' => 'text'),
			'post_id' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'user_id' => array('constraint' => '11', 'null' => true, 'type' => 'int'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('comments');
	}
}