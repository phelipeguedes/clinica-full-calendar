<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Procedimentos Model
 *
 * @property |\Cake\ORM\Association\HasMany $Consultas
 *
 * @method \App\Model\Entity\Procedimento get($primaryKey, $options = [])
 * @method \App\Model\Entity\Procedimento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Procedimento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Procedimento|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Procedimento|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Procedimento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Procedimento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Procedimento findOrCreate($search, callable $callback = null, $options = [])
 */
class ProcedimentosTable extends Table
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

        $this->setTable('procedimentos');
        $this->setDisplayField('id_procedimento');
        $this->setPrimaryKey('id_procedimento');

        $this->hasMany('Consultas', [
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
            ->integer('id_procedimento')
            ->allowEmpty('id_procedimento', 'create');

        $validator
            ->scalar('descricao')
            ->maxLength('descricao', 100)
            ->allowEmpty('descricao');

        return $validator;
    }
}
