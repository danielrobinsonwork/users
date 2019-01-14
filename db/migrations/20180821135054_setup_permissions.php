<?php


use Phinx\Migration\AbstractMigration;

class SetupPermissions extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $permissions = $this->table('permissions', ['id' => false, 'primary_key' => ['id']]);
        $permissions->addColumn('id', 'string', ['length' => 30])
                    ->addColumn('display_name', 'string', ['length' => 60])
                    ->save();

        $user_permissions = $this->table('user_permissions', ['id' => false, 'primary_key' => ['user_id', 'permissions_id']]);
        $user_permissions->addColumn('user_id', 'integer')
                         ->addColumn('permissions_id', 'string', ['length' => 30])
                         ->save();
    }
}
