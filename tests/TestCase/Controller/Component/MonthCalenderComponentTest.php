<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\MonthCalenderComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\MonthCalenderComponent Test Case
 */
class MonthCalenderComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\MonthCalenderComponent
     */
    public $MonthCalender;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->MonthCalender = new MonthCalenderComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MonthCalender);

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
