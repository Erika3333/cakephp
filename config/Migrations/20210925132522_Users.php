<?php
use Migrations\AbstractMigration;

class Users extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $table = $this->table('users', ['id' => false, 'primary_key' => ['user_id']]);
        $table->addColumn('user_id', 'integer', [ 'autoIncrement' => true ])
                ->addColumn('username', 'string')
                ->addColumn('line', 'string', ['null' => true])
                ->addColumn('group', 'integer', ['null' => true])
                ->addColumn('role', 'integer', ['default' => 1])
                ->addColumn('password', 'string',)
                ->addColumn('created', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
                ->save();
    }
    
    public function down()
    {
        $this->dropTable('users');
    }
}
