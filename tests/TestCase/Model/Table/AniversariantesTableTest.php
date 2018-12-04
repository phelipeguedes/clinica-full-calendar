<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AniversariantesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AniversariantesTable Test Case
 */
class AniversariantesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AniversariantesTable
     */
    public $Aniversariantes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.aniversariantes',
        'app.clientes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Aniversariantes') ? [] : ['className' => AniversariantesTable::class];
        $this->Aniversariantes = TableRegistry::getTableLocator()->get('Aniversariantes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Aniversariantes);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
