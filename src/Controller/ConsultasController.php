<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Consultas Controller
 *
 * @property \App\Model\Table\ConsultasTable $Consultas
 *
 * @method \App\Model\Entity\Consulta[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConsultasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Atendentes', 'Clientes', 'Procedimentos']
        ];
        $consultas = $this->paginate($this->Consultas);

        $this->set(compact('consultas'));
    }

    /**
     * View method
     *
     * @param string|null $id Consulta id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $consulta = $this->Consultas->get($id, [
            'contain' => ['Atendentes', 'Clientes', 'Procedimentos']
        ]);

        $this->set('consulta', $consulta);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $connection = ConnectionManager::get('default');

        $consulta = $this->Consultas->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data();

            $title = $data['title'];
            $start = $data['start'];
            $end = $data['end'];            
            $atendenteId = $data['atendente_id'];
            $clienteId = $data['cliente_id'];
            $procedimentoId = $data['procedimento_id'];

            $consulta = $connection->execute("INSERT INTO consultas (title, start, \"end\", atendente_id, cliente_id, procedimento_id) VALUES ('$title', '$start', '$end', $atendenteId, $clienteId, $procedimentoId)");

            if (($consulta)) {
                //$this->Flash->success(__('Consulta marcada com sucesso.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('Ocorreu um erro. A consulta não foi salva.'));
        }
        
        $atendentes = $this->Consultas->Atendentes->find('list', ['valueField' => 'nome', 'order' => 'nome']);
        $clientes = $this->Consultas->Clientes->find('list', ['valueField' => 'nome']);
        $procedimentos = $this->Consultas->Procedimentos->find('list', ['valueField' => 'descricao']);
        $this->set(compact('consulta', 'atendentes', 'clientes', 'procedimentos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Consulta id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {
        $this->render(false);
        
        $connection = ConnectionManager::get('default');
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data();

            $id = $data['id'];
            $title = $data['title_edit'];
            $start = $data['start_edit'];
            $end = $data['end_edit'];            
            $atendenteId = $data['atendente_id_edit'];
            $clienteId = $data['cliente_id_edit'];
            $procedimentoId = $data['procedimento_id_edit'];

            $consulta = $connection->execute("UPDATE consultas set title = '$title', start = '$start', \"end\" = '$end', atendente_id = $atendenteId, cliente_id = $clienteId, procedimento_id = $procedimentoId WHERE id = $id");

            if (($consulta)) {
                return $this->redirect(['action' => 'add']);
                //$this->Flash->success(__('Consulta alterada com sucesso.'));
            }
            $this->Flash->error(__('Ocorreu um erro. Não foi possível editar a consulta.'));
        }
        
        $atendentes = $this->Consultas->Atendentes->find('list', ['valueField' => 'nome']);
        $clientes = $this->Consultas->Clientes->find('list', ['valueField' => 'nome']);
        $procedimentos = $this->Consultas->Procedimentos->find('list', ['valueField' => 'descricao']);
        $this->set(compact('consulta', 'atendentes', 'clientes', 'procedimentos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Consulta id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $consulta = $this->Consultas->get($id);
        if ($this->Consultas->delete($consulta)) {
            $this->Flash->success(__('The consulta has been deleted.'));
        } else {
            $this->Flash->error(__('The consulta could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /* dados mostrados no calendário (objeto consulta) */
    public function mostrarConsultas($id = null)
    {
        $this->render(false);
        
        $consultas = $this->Consultas->find()
        ->select(['id', 'title', 'start', 'end', 'atendente_id', 'cliente_id', 'procedimento_id']);
        
        if($id != 0) {
            $consultas->WHERE(['atendente_id' => $id]);
        } 

        $consultas->all();    

        echo json_encode($consultas);    
                 
        $this->set(compact('consultas'));
    }
}
