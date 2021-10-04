<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher; 

/**
 * User Entity
 *
 * @property int $user_id
 * @property string $username
 * @property string|null $line
 * @property int|null $group
 * @property int $role
 * @property string $password
 * @property \Cake\I18n\FrozenTime $created
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'username' => true,
        'line' => true,
        'group' => true,
        'role' => true,
        'password' => true,
        'created' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];

    protected function _setPassword($password)
    {
        $hasher = new DefaultPasswordHasher();
        $hashPassword = $hasher->hash($password);
    
        if(strlen($password) > 0)
        {
            return $hashPassword;
        }
    }
}

