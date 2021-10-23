<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * UserSql component
 */
class UserSqlComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function userSql() {
        $userSql = [];

        $connection = ConnectionManager::get('default');
        $sql =  <<<SQL_TEXT
        SELECT
            users.user_id,
            users.username,
            users.line,
            users.group,
            users.role
        FROM users
        SQL_TEXT;
        $user_db = $connection->prepare($sql);
        $user_db->execute();
        $users = $user_db->fetchAll('assoc');
        return $users;
    }
    
}
