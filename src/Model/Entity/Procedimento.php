<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Procedimento Entity
 *
 * @property int $id_procedimento
 * @property string $descricao
 *
 * @property \App\Model\Entity\Atendente $atendente
 * @property \App\Model\Entity\Cliente $cliente
 */
class Procedimento extends Entity
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
        'descricao' => true,
        'atendente' => true,
        'cliente' => true
    ];
}
