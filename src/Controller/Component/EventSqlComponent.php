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

        // $eventData = '2021-10-10';
        // $eventTitle = '10月タイトル';
        // $eventComment = '10月コメント';
        // $eventGroup = 1;
        // $eventUserId = 1;


        // $connection = ConnectionManager::get('default');
        // $sql =  <<<SQL_TEXT
        // INSERT INTO events
        // VALUES
        //     (nextval('events_event_id_seq'::regclass), 
        //     :eventData, 
        //     :eventTitle, 
        //     :eventComment, 
        //     :eventGroup, 
        //     :eventUserId);
        // SQL_TEXT;

        // $event_db = $connection->prepare($sql);
        // $event_db->bindValue(1, $eventData);
        // $event_db->bindValue(2, $eventTitle);
        // $event_db->bindValue(3, $eventComment);
        // $event_db->bindValue(4, $eventGroup);
        // $event_db->bindValue(5, $eventUserId);
        // $event_db->execute();
        // $events = $event_db->fetchAll('assoc');

        // return $events;
    } 
}
