<?php
App::uses('AppController', 'Controller');
/**
 * SelectionStudentShips Controller
 *
 * @property SelectionStudentShip $SelectionStudentShip
 * @property PaginatorComponent $Paginator
 */
class SelectionStudentShipsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->checkRole('管理员');
		$this->SelectionStudentShip->recursive = 0;
		$this->set('selectionStudentShips', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->checkRole('管理员');
		if (!$this->SelectionStudentShip->exists($id)) {
			throw new NotFoundException(__('Invalid selection student ship'));
		}
		$options = array('conditions' => array('SelectionStudentShip.' . $this->SelectionStudentShip->primaryKey => $id));
		$this->set('selectionStudentShip', $this->SelectionStudentShip->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->checkRole('管理员');
		if ($this->request->is('post')) {
			$this->SelectionStudentShip->create();
			if ($this->SelectionStudentShip->save($this->request->data)) {
				$this->Session->setFlash(__('The selection student ship has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The selection student ship could not be saved. Please, try again.'));
			}
		}
		$students = $this->SelectionStudentShip->Student->find('list');
		$selections = $this->SelectionStudentShip->Selection->find('list');
		$examStudentShips = $this->SelectionStudentShip->ExamStudentShip->find('list');
		$this->set(compact('students', 'selections', 'examStudentShips'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->checkRole('管理员');
		if (!$this->SelectionStudentShip->exists($id)) {
			throw new NotFoundException(__('Invalid selection student ship'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SelectionStudentShip->save($this->request->data)) {
				$this->Session->setFlash(__('The selection student ship has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The selection student ship could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SelectionStudentShip.' . $this->SelectionStudentShip->primaryKey => $id));
			$this->request->data = $this->SelectionStudentShip->find('first', $options);
		}
		$students = $this->SelectionStudentShip->Student->find('list');
		$selections = $this->SelectionStudentShip->Selection->find('list');
		$examStudentShips = $this->SelectionStudentShip->ExamStudentShip->find('list');
		$this->set(compact('students', 'selections', 'examStudentShips'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->checkRole('管理员');
		$this->SelectionStudentShip->id = $id;
		if (!$this->SelectionStudentShip->exists()) {
			throw new NotFoundException(__('Invalid selection student ship'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SelectionStudentShip->delete()) {
			$this->Session->setFlash(__('The selection student ship has been deleted.'));
		} else {
			$this->Session->setFlash(__('The selection student ship could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
