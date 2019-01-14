<?php

use Phinx\Migration\AbstractMigration;

class CreateUsersTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function change()
    {
        $users = $this->table('users');
        $users->addColumn('username', 'string', ['limit' => 20])
                ->addColumn('password', 'string', ['limit' => 40])
                ->addColumn('email', 'string', ['limit' => 100])
                ->addColumn('first_name', 'string', ['limit' => 30])
                ->addColumn('last_name', 'string', ['limit' => 30])
                ->addColumn('created', 'datetime')
                ->addColumn('updated', 'datetime', ['null' => true])
                ->addIndex(['username', 'email'], ['unique' => true])
                ->save();
    }
}