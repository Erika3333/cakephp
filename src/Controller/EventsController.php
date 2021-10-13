<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Controller\Component;
use Cake\Event\Event; 

class EventsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'logout']);
    }
    public function index()
    {
        $this->loadComponent('EventSql');
        $events = $this->EventSql->eventSql();

        $this->loadComponent('UserSql');
        $users = $this->UserSql->userSql();        

        $display = [];
        for ($eventLoop = 0; $eventLoop < count($events); $eventLoop++) {
            $display[$eventLoop]['data'] = $events[$eventLoop]['data'];
            $display[$eventLoop]['title'] = $events[$eventLoop]['title'];
            $display[$eventLoop]['comment'] = $events[$eventLoop]['comment'];
            $display[$eventLoop]['group'] = $events[$eventLoop]['group'];
            $display[$eventLoop]['user_id'] = $events[$eventLoop]['user_id'];

            for ($userLoop = 0 ; $userLoop < count($users); $userLoop++) {
                
                if( $events[$eventLoop]['user_id'] == $users[$userLoop]['user_id'] ) {
                    $events[$eventLoop]['user_id'] = $users[$userLoop]['username'];
                } 
            }
        }

        $this->set('events', $events);
    }

    public function add() 
    {
        $userId = $this->Auth->user('user_id');

        if( $this->request->is('post') ) {
            $getPost['data'] = $this->request->getData('data');
            $getPost['title'] = $this->request->getData('title');
            $getPost['comment'] = $this->request->getData('comment');
            $getPost['group'] = $this->request->getData('group');
            $getPost['userId'] = $userId;

            $connection = ConnectionManager::get('default');
            $sql =  <<<SQL_TEXT
            INSERT INTO events
            VALUES
                (nextval('events_event_id_seq'::regclass), 
                :eventData, 
                :eventTitle, 
                :eventComment, 
                :eventGroup, 
                :eventUserId);
            SQL_TEXT;

            $event_db = $connection->prepare($sql);
            $event_db->bindValue(1, $getPost['data']);
            $event_db->bindValue(2, $getPost['title']);
            $event_db->bindValue(3, $getPost['comment']);
            $event_db->bindValue(4, $getPost['group']);
            $event_db->bindValue(5, $getPost['userId']);
            $event_db->execute();
            $events = $event_db->fetchAll('assoc');
        
            $this->set('events', $events);

            return $this->redirect(
                ['controller' => 'Events', 'action' => 'calender']
            );
        }
    }


    public function calender() 
    {
        // イベントComponent取得
        $this->loadComponent('EventSql');
        $events = $this->EventSql->eventSql();

        
        $getDate = date('Y-m-d'); 
        if( $this->request->is('get') && $this->request->getQuery('next_month')) {
            $getDate = $this->request->getQuery('next_month');
        }
        if( $this->request->is('get') && $this->request->getQuery('last_month')) {
            $getDate = $this->request->getQuery('last_month');
        }

        
        $thisYear = date('Y', strtotime($getDate));
        $thisMonth = date('m', strtotime($getDate));
        
        $thisDate = date('Y-m-d', strtotime($getDate));

        $firstDate = 1;
        $lastDate = date('t', strtotime($getDate));
        $firstWeekNumber = date('w', strtotime($thisYear.'-'.$thisMonth.'-'.$firstDate));

        $calenderArray = [];
        $displayNumber = 0;

        for($dayLoop = $firstDate; $dayLoop <= $lastDate; $dayLoop++) {
            if($dayLoop == $firstDate ) {            
                for( $weekNumber = 0; $weekNumber <= $firstWeekNumber-1; $weekNumber++ ) {
                    $displayNumber++;
                    $calenderArray[$displayNumber]['day'] = ''; 
                    $calenderArray[$displayNumber]['Y-m-d'] = ''; 
                }
            }
            $displayNumber++;
            $calenderArray[$displayNumber]['day'] = str_pad($dayLoop, 2, '0', STR_PAD_LEFT);
            $calenderArray[$displayNumber]['Y-m-d'] = $thisYear.'-'.$thisMonth.'-'.str_pad($dayLoop, 2, '0', STR_PAD_LEFT); 
        }
       
        //　カレンダー配列 ＋ イベント配列　
        $count = 0;
        $eventCalneder = [];
        foreach($calenderArray as $calkey => $callender) {
            $count++;
            $eventCalneder[$count]['event'] = '';
            $eventCalneder[$count]['day'] = $callender['day']; 

            $a = 0;
            if($events) {
                foreach($events as $key => $event) {
                    if($callender['Y-m-d'] == $event['data']) {
                        
                        $a++;
                        $eventCalneder[$count]['event'] = $event['title'];
                        $eventCalneder[$count]['day'] = $callender['day'];
                    }
                }
            }
        }

        $this->set('eventCalneder', $eventCalneder);
        $this->set('getDate', $getDate);
        $this->set('thisYear', $thisYear);
        $this->set('thisMonth', $thisMonth);
        
    }
}

