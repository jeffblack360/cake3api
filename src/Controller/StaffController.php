<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Staff Controller
 *
 * @property \App\Model\Table\StaffTable $Staff
 */
class StaffController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Address', 'Store']
        ];
        $this->set('staff', $this->paginate($this->Staff));
        $this->set('_serialize', ['staff']);
    }

    /**
     * View method
     *
     * @param string|null $id Staff id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $staff = $this->Staff->get($id, [
            'contain' => ['Address', 'Store']
        ]);
        $this->set('staff', $staff);
        $this->set('_serialize', ['staff']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $staff = $this->Staff->newEntity();
        if ($this->request->is('post')) {
            $staff = $this->Staff->patchEntity($staff, $this->request->data);
            if ($this->Staff->save($staff)) {
                $this->Flash->success(__('The staff has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The staff could not be saved. Please, try again.'));
            }
        }
        $staffs = $this->Staff->Staffs->find('list', ['limit' => 200]);
        $address = $this->Staff->Address->find('list', ['limit' => 200]);
        $store = $this->Staff->Store->find('list', ['limit' => 200]);
        $this->set(compact('staff', 'staffs', 'address', 'store'));
        $this->set('_serialize', ['staff']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Staff id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $staff = $this->Staff->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $staff = $this->Staff->patchEntity($staff, $this->request->data);
            if ($this->Staff->save($staff)) {
                $this->Flash->success(__('The staff has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The staff could not be saved. Please, try again.'));
            }
        }
        $address = $this->Staff->Address->find('list', ['limit' => 200]);
        $store = $this->Staff->Store->find('list', ['limit' => 200]);
        $this->set(compact('staff', 'address', 'store'));
        $this->set('_serialize', ['staff']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Staff id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $staff = $this->Staff->get($id);
        if ($this->Staff->delete($staff)) {
            $this->Flash->success(__('The staff has been deleted.'));
        } else {
            $this->Flash->error(__('The staff could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
