<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Consultas Model
 *
 * @property \App\Model\Table\AtendentesTable|\Cake\ORM\Association\BelongsTo $Atendentes
 * @property \App\Model\Table\ClientesTable|\Cake\ORM\Association\BelongsTo $Clientes
 * @property \App\Model\Table\ProcedimentosTable|\Cake\ORM\Association\BelongsTo $Procedimentos
 *
 * @method \App\Model\Entity\Consulta get($primaryKey, $options = [])
 * @method \App\Model\Entity\Consulta newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Consulta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Consulta|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Consulta|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Consulta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Consulta[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Consulta findOrCreate($search, callable $callback = null, $options = [])
 */
class ConsultasTable extends Table
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

        $this->setTable('consultas');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Atendentes', [
            'foreignKey' => 'atendente_id'
        ]);
        $this->belongsTo('Clientes', [
            'foreignKey' => 'cliente_id'
        ]);
        $this->belongsTo('Procedimentos', [
            'foreignKey' => 'procedimento_id'
        ]);
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 100)
            ->allowEmpty('title');
        /*    
        $validator
            ->date('start')
            ->allowEmpty('start');

        $validator
            ->date('end')
            ->allowEmpty('end');
        */
        $this->addBehavior('Timestamp');
        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['atendente_id'], 'Atendentes'));
        $rules->add($rules->existsIn(['cliente_id'], 'Clientes'));
        $rules->add($rules->existsIn(['procedimento_id'], 'Procedimentos'));

        return $rules;
    }
}
