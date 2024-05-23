<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ResetPassword extends Migration
{
    public function up()
    {
        $this->forge->addColumn('usuarios', [
            'reset_token' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'after' => 'password'
            ],
            'reset_expiration' => [
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'reset_token'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('usuarios', 'reset_token');
        $this->forge->dropColumn('usuarios', 'reset_expiration');
    }
}
