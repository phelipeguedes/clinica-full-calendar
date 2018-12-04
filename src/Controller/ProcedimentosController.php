<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Procedimentos Controller
 *
 * @property \App\Model\Table\ProcedimentosTable $Procedimentos
 *
 * @method \App\Model\Entity\Procedimento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProcedimentosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Atendentes', 'Clientes']
        ];
        $procedimentos = $this->paginate($this->Procedimentos);

        $this->set(compact('procedimentos'));
    }

    /**
     * View method
     *
     * @param string|null $id Procedimento id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $procedimento = $this->Procedimentos->get($id, [
            'contain' => ['Atendentes', 'Clientes']
        ]);

        $this->set('procedimento', $procedimento);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $procedimento = $this->Procedimentos->newEntity();
        if ($this->request->is('post')) {
            $procedimento = $this->Procedimentos->patchEntity($procedimento, $this->request->getData());
            if ($this->Procedimentos->save($procedimento)) {
                $this->Flash->success(__('The procedimento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The procedimento could not be saved. Please, try again.'));
        }
        $atendentes = $this->Procedimentos->Atendentes->find('list', ['limit' => 200]);
        $clientes = $this->Procedimentos->Clientes->find('list', ['limit' => 200]);
        $this->set(compact('procedimento', 'atendentes', 'clientes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Procedimento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $procedimento = $this->Procedimentos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $procedimento = $this->Procedimentos->patchEntity($procedimento, $this->request->getData());
            if ($this->Procedimentos->save($procedimento)) {
                $this->Flash->success(__('The procedimento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The procedimento could not be saved. Please, try again.'));
        }
        $atendentes = $this->Procedimentos->Atendentes->find('list', ['limit' => 200]);
        $clientes = $this->Procedimentos->Clientes->find('list', ['limit' => 200]);
        $this->set(compact('procedimento', 'atendentes', 'clientes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Procedimento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $procedimento = $this->Procedimentos->get($id);
        if ($this->Procedimentos->delete($procedimento)) {
            $this->Flash->success(__('The procedimento has been deleted.'));
        } else {
            $this->Flash->error(__('The procedimento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
