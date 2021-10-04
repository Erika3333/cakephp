<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\UserSqlComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\UserSqlComponent Test Case
 */
class UserSqlComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\UserSqlComponent
     */
    public $UserSql;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->UserSql = new UserSqlComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserSql);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
