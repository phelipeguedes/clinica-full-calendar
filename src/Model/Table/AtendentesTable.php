<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Atendentes Model
 *
 * @method \App\Model\Entity\Atendente get($primaryKey, $options = [])
 * @method \App\Model\Entity\Atendente newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Atendente[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Atendente|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Atendente|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Atendente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Atendente[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Atendente findOrCreate($search, callable $callback = null, $options = [])
 */
class AtendentesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('atendentes');
        $this->setDisplayField('id_atendente');
        $this->setPrimaryKey('id_atendente');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id_atendente')
            ->allowEmpty('id_atendente', 'create');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 100)
            ->allowEmpty('nome');

        return $validator;
    }
}
