<?php
use Migrations\AbstractMigration;

class Events extends AbstractMigration
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
        $table = $this->table('events', ['id' => false, 'primary_key' => ['event_id']]);
        $table->addColumn('event_id', 'integer', [ 'autoIncrement' => true ])
                ->addColumn('data', 'date')
                ->addColumn('title', 'string')
                ->addColumn('comment', 'text', ['null' => true])
                ->addColumn('group', 'integer',)
                ->addColumn('user_id', 'integer',)
                ->addColumn('created', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
                ->save();        
    }

    public function down()
    {
        $this->dropTable('events');
    }
}
