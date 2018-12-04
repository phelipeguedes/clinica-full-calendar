<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClientesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClientesTable Test Case
 */
class ClientesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ClientesTable
     */
    public $Clientes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.clientes',
        'app.aniversarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Clientes') ? [] : ['className' => ClientesTable::class];
        $this->Clientes = TableRegistry::getTableLocator()->get('Clientes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Clientes);

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
}
