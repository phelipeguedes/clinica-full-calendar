<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Consulta Entity
 *
 * @property int $id_consulta
 * @property string $title
 * @property \Cake\I18n\FrozenDate $start
 * @property \Cake\I18n\FrozenDate $end
 * @property int $atendente_id
 * @property int $cliente_id
 * @property int $procedimento_id
 *
 * @property \App\Model\Entity\Atendente $atendente
 * @property \App\Model\Entity\Cliente $cliente
 * @property \App\Model\Entity\Procedimento $procedimento
 */
class Consulta extends Entity
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
        'title' => true,
        'start' => true,
        'end' => true,
        'atendente_id' => true,
        'cliente_id' => true,
        'procedimento_id' => true,
        'atendente' => true,
        'cliente' => true,
        'procedimento' => true
    ];
}
