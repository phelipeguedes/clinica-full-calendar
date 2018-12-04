<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Eventos Controller
 *
 * @property \App\Model\Table\EventosTable $Eventos
 *
 * @method \App\Model\Entity\Evento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EventosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $eventos = $this->paginate($this->Eventos);
        $atendentesTable = TableRegistry::get('Atendentes')->find();
        $clientesTable = TableRegistry::get('Clientes')->find();
        $procedimentosTable = TableRegistry::get('Procedimentos');

        $atendentes = $atendentesTable->find('list', ['valueField' => 'nome']);
        $clientes = $clientesTable->find('list', ['valueField' => 'nome']);
        $procedimentos = $procedimentosTable->find('list', ['valueField' => 'descricao']); 

        $this->set(compact('atendentes', 'clientes', 'procedimentos'));

    }

    public function mostrarAniversarios()
    {   $this->render(false);
        
        $eventos = $this->Eventos->find()
        ->select(['title', 'start'])
        ->all();
        
        /*
        foreach ($eventos as $evento) {
            $title = $evento->title;
            $start = $evento->start;
            $end = $evento->end;
        }
        */

        echo json_encode($eventos);    
                 
        $this->set(compact('eventos'));
    }

    /**
     * View method
     *
     * @param string|null $id Evento id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $evento = $this->Eventos->get($id, [
            'contain' => []
        ]);

        $this->set('evento', $evento);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $evento = $this->Eventos->newEntity();
        if ($this->request->is('post')) {
            $evento = $this->Eventos->patchEntity($evento, $this->request->getData());
            if ($this->Eventos->save($evento)) {
                $this->Flash->success(__('The evento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The evento could not be saved. Please, try again.'));
        }

        $eventos = $this->paginate($this->Eventos);
        $atendentesTable = TableRegistry::get('Atendentes')->find();
        $clientesTable = TableRegistry::get('Clientes')->find();
        $procedimentosTable = TableRegistry::get('Procedimentos');

        $atendentes = $atendentesTable->find('list', ['valueField' => 'nome']);
        $clientes = $clientesTable->find('list', ['valueField' => 'nome']);
        $procedimentos = $procedimentosTable->find('list', ['valueField' => 'descricao']); 

        $this->set(compact('atendentes', 'clientes', 'procedimentos'));
        $this->set(compact('evento'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Evento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $evento = $this->Eventos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $evento = $this->Eventos->patchEntity($evento, $this->request->getData());
            if ($this->Eventos->save($evento)) {
                $this->Flash->success(__('The evento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The evento could not be saved. Please, try again.'));
        }
        $this->set(compact('evento'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Evento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $evento = $this->Eventos->get($id);
        if ($this->Eventos->delete($evento)) {
            $this->Flash->success(__('The evento has been deleted.'));
        } else {
            $this->Flash->error(__('The evento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function addProcedimento() {
        $this->render(false);
        if($this->request->is('ajax')) {
            $data = $this->request->data();
            echo "caiu aqui";    
        }
        
    }
}
