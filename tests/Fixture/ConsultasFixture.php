<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ConsultasFixture
 *
 */
class ConsultasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_consulta' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'title' => ['type' => 'string', 'length' => 100, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'start' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'end' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'atendente_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'cliente_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'procedimento_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_consulta'], 'length' => []],
            'fk_atendentes' => ['type' => 'foreign', 'columns' => ['atendente_id'], 'references' => ['atendentes', 'id_atendente'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_clientes' => ['type' => 'foreign', 'columns' => ['cliente_id'], 'references' => ['clientes', 'id_cliente'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_procedimentos' => ['type' => 'foreign', 'columns' => ['procedimento_id'], 'references' => ['procedimentos', 'id_procedimento'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id_consulta' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'start' => '2018-11-19',
                'end' => '2018-11-19',
                'atendente_id' => 1,
                'cliente_id' => 1,
                'procedimento_id' => 1
            ],
        ];
        parent::init();
    }
}
