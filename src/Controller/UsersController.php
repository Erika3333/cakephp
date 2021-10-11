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

    public function index()
    {
        $connection = ConnectionManager::get('default');
        $users = $connection->execute('SELECT * FROM users')->fetchAll('assoc');

        for($i = 0; $i < count($users); $i++) {
            $user = $users[$i];
        }

        $today = date('Y/m/d');

        $this->set('users', $users);
        $this->set('today', $today);
        $this->set('user', $user);
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

}
