<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Atendentes Controller
 *
 * @property \App\Model\Table\AtendentesTable $Atendentes
 *
 * @method \App\Model\Entity\Atendente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AtendentesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $atendentes = $this->paginate($this->Atendentes);

        $this->set(compact('atendentes'));
    }

    /**
     * View method
     *
     * @param string|null $id Atendente id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $atendente = $this->Atendentes->get($id, [
            'contain' => []
        ]);

        $this->set('atendente', $atendente);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $atendente = $this->Atendentes->newEntity();
        if ($this->request->is('post')) {
            $atendente = $this->Atendentes->patchEntity($atendente, $this->request->getData());
            if ($this->Atendentes->save($atendente)) {
                $this->Flash->success(__('The atendente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The atendente could not be saved. Please, try again.'));
        }
        $this->set(compact('atendente'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Atendente id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $atendente = $this->Atendentes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $atendente = $this->Atendentes->patchEntity($atendente, $this->request->getData());
            if ($this->Atendentes->save($atendente)) {
                $this->Flash->success(__('The atendente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The atendente could not be saved. Please, try again.'));
        }
        $this->set(compact('atendente'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Atendente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $atendente = $this->Atendentes->get($id);
        if ($this->Atendentes->delete($atendente)) {
            $this->Flash->success(__('The atendente has been deleted.'));
        } else {
            $this->Flash->error(__('The atendente could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
