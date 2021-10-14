<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event; 

/**
 * Users Controller
 *
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

    public function initialize()
    {
        parent::initialize();
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'logout']);
        
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
            $this->Auth->setUser($user);
            return $this->redirect($this->Auth->redirectUrl());
        }
            $this->Flash->error(__('ユーザ名もしくはパスワードが間違っています'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                
                $this->Flash->success(__('登録完了！再度ログインしてください！'));

                return $this->redirect(['action' => 'login']);
            }
            $this->log(var_dump($user->errors(),true),LOG_DEBUG);
            $this->Flash->error(__('登録できませんでした。'));
        }
        
        $group_array[] = '-選択してください-';
        $group_array[] = '手登根';
        $group_array[] = 'grop配列が入る';

        $this->set('group_array', $group_array);
        $this->set(compact('user'));
    }

    public function index()
    {
        $connection = ConnectionManager::get('default');
        $users = $connection->execute('SELECT * FROM users')->fetchAll('assoc');

        $userId = $this->Auth->user('user_id');
        for($userLoop = 0; $userLoop < count($users); $userLoop++) {
            if ($users[$userLoop]['user_id'] == $userId) {
                $displayUser['userid'] = $users[$userLoop]['user_id'];
                $displayUser['username'] = $users[$userLoop]['username'];
                $displayUser['line'] = $users[$userLoop]['line'];
            }
        }
        // var_dump($displayUser);

        $this->set('users', $users);
        $this->set('displayUser', $displayUser);
    }

    public function edit()
    {
        $connection = ConnectionManager::get('default');
        $users = $connection->execute('SELECT * FROM users')->fetchAll('assoc');

        $userId = $this->Auth->user('user_id');
        for($userLoop = 0; $userLoop < count($users); $userLoop++) {
            if ($users[$userLoop]['user_id'] == $userId) {
                $displayUser['userid'] = $users[$userLoop]['user_id'];
                $displayUser['username'] = $users[$userLoop]['username'];
                $displayUser['line'] = $users[$userLoop]['line'];
            }
        }

        if ($this->request->is('post')) {
            $getPost['username'] = $this->request->getData('username');
            $getPost['line'] = $this->request->getData('line');
            // var_dump($getPost);
        } else {
            // return $this->redirect(['action' => 'index']);
        }
        

        $this->set('displayUser', $displayUser);
    }
}
