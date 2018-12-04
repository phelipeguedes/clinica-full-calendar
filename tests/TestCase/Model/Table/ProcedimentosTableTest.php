<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProcedimentosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProcedimentosTable Test Case
 */
class ProcedimentosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProcedimentosTable
     */
    public $Procedimentos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.procedimentos',
        'app.atendentes',
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
        $config = TableRegistry::getTableLocator()->exists('Procedimentos') ? [] : ['className' => ProcedimentosTable::class];
        $this->Procedimentos = TableRegistry::getTableLocator()->get('Procedimentos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Procedimentos);

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
