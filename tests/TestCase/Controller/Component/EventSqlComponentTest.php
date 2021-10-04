<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\EventSqlComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\EventSqlComponent Test Case
 */
class EventSqlComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\EventSqlComponent
     */
    public $EventSql;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->EventSql = new EventSqlComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EventSql);

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
