<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConsultasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConsultasTable Test Case
 */
class ConsultasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ConsultasTable
     */
    public $Consultas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.consultas',
        'app.atendentes',
        'app.clientes',
        'app.procedimentos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Consultas') ? [] : ['className' => ConsultasTable::class];
        $this->Consultas = TableRegistry::getTableLocator()->get('Consultas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Consultas);

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
