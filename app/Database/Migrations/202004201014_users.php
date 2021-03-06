<?php namespace App\Database\Migrations;

class CreateUsers extends \CodeIgniter\Database\Migration {

        public function up()
        {
                $this->forge->addField([
                        'user_id'          => [
                                'type'           => 'INT',
                                'constraint'     => 5,
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE
                        ],
                        'user_id'          => [
                                'type'           => 'INT',
                                'constraint'     => 5,
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE
                        ],
                        'username'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '100',
                        ],
                        'name'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '100',
                        ],
                        'lastname'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '100',
                        ],
                        'gender'        =>[
                                'type'           =>'CHAR'
                        ],
                        'blog_description' => [
                                'type'           => 'TEXT',
                                'null'           => TRUE,
                        ],
                ]);
                $this->forge->addKey('user_id', TRUE);
                $this->forge->createTable('users');
        }

        public function down()
        {
                $this->forge->dropTable('users');
        }
}