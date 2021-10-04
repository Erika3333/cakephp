<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Controller\Component;
use Cake\Event\Event; 

class EventsController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'index']);
    }

    public function index()
    {
        $this->loadComponent('EventSql');
        $events = $this->EventSql->eventSql();

        $this->set('events', $events);
    }

    public function add() 
    {
        if( $this->request->is('post') ) {
            $getPost['data'] = $this->request->data('data');;
            $getPost['title'] = $this->request->data('title');
            $getPost['comment'] = $this->request->data('comment');
            $getPost['group'] = $this->request->data('group');
            $getPost['userId'] = 1;

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
                ['controller' => 'Events', 'action' => 'index']
            );
        }
    }


    public function calender() 
    {
        // イベントComponent取得
        $this->loadComponent('EventSql');
        $events = $this->EventSql->eventSql();

        $getDate = date('Y-m-d');
        $postForm = $this->request->is('get');
        $postlastMonth = $this->request->query('last_month');
        $postNextMonth = $this->request->query('next_month');

        // 先月または、翌月がポストされた時の処理
        if (isset($postForm)) {
            // 先月のボタンがクリックされたとき
            if( $postlastMonth ) {
                $getDate = date('Y-m-d', strtotime('-1 month'));
            }
            // 先月のボタンがクリックされたとき
            if( $postNextMonth ) {
                $getDate = date('Y-m-d', strtotime('+1 month'));
            }
        }

        // 1ヶ月カレンダー配列作成     
        $getDate = date('Y-m-d'); 
        
        $thisYear = date('Y', strtotime($getDate));
        $thisMonth = date('m', strtotime($getDate));
        
        $thisDate = date('Y-m-d', strtotime($getDate));

        $firstDate = 1;
        $lastDate = date('t', strtotime($getDate));
        $firstWeekNumber = date('w', strtotime($thisYear.'-'.$thisMonth.'-'.$firstDate));

        $calenderArray = [];
        $displayNumber = 0;

        for( $dayLoop = $firstDate; $dayLoop <= $lastDate; $dayLoop++ ) {
            if( $dayLoop == $firstDate ) {            
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

        //　カレンダー ＋ イベント　配列作成
        $count = 0;
        $eventCalneder = [];
        foreach($calenderArray as $calkey => $callender ) {
            $count++;
            $eventCalneder[$count] = $callender; 
            foreach($events as $key => $event ) {   
                // var_dump($event);        
                if($callender['Y-m-d'] == $event['data']) {
                    $eventCalneder[$count]['event'] = $event['title'];
                    $eventCalneder[$count]['day'] = $callender['day'];

                } else {
                    $eventCalneder[$count]['event'] = '';
                    $eventCalneder[$count]['day'] = $callender['day'];
                }
            }
        }

        $this->set('getDate', $getDate);
        $this->set('thisYear', $thisYear);
        $this->set('thisMonth', $thisMonth);
        $this->set('eventCalneder', $eventCalneder);
    }
}

