<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AniversariosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AniversariosTable Test Case
 */
class AniversariosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AniversariosTable
     */
    public $Aniversarios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.aniversarios',
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
        $config = TableRegistry::getTableLocator()->exists('Aniversarios') ? [] : ['className' => AniversariosTable::class];
        $this->Aniversarios = TableRegistry::getTableLocator()->get('Aniversarios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Aniversarios);

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
