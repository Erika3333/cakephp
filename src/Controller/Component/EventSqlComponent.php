<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * EventSql component
 */
class EventSqlComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function eventSql() {
        $eventSql = [];

        $connection = ConnectionManager::get('default');
        $sql =  <<<SQL_TEXT
        SELECT
            events.event_id,
            events.data,
            events.title,
            events.comment,
            events.group,
            events.user_id,
            events.created
        FROM events
        ORDER BY data DESC
        SQL_TEXT;
        $event_db = $connection->prepare($sql);
        $event_db->execute();
        $events = $event_db->fetchAll('assoc');
        return $events;
    } 

    public function eventAdd($getPost) {

    } 
}
