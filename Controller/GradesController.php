<?php
App::uses('AppController', 'Controller');
/**
 * Grades Controller
 *
 * @property Grade $Grade
 * @property PaginatorComponent $Paginator
 */
class GradesController extends AppController {

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
		$this->Grade->recursive = 0;
		$this->set('grades', $this->Paginator->paginate());
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
		if (!$this->Grade->exists($id)) {
			throw new NotFoundException(__('Invalid grade'));
		}
		$options = array('conditions' => array('Grade.' . $this->Grade->primaryKey => $id));
		$this->set('grade', $this->Grade->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->checkRole('管理员');
		if ($this->request->is('post')) {
			$this->Grade->create();
			if ($this->Grade->save($this->request->data)) {
				$this->Session->setFlash(__('The grade has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The grade could not be saved. Please, try again.'));
			}
		}
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
		if (!$this->Grade->exists($id)) {
			throw new NotFoundException(__('Invalid grade'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Grade->save($this->request->data)) {
				$this->Session->setFlash(__('The grade has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The grade could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Grade.' . $this->Grade->primaryKey => $id));
			$this->request->data = $this->Grade->find('first', $options);
		}
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
		$this->Grade->id = $id;
		if (!$this->Grade->exists()) {
			throw new NotFoundException(__('Invalid grade'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Grade->delete()) {
			$this->Session->setFlash(__('The grade has been deleted.'));
		} else {
			$this->Session->setFlash(__('The grade could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function TeacherIndex() {
		$this->Grade->recursive = 0;
		$this->set('grades', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function TeacherView($id = null) {
		$this->checkRole('教师');
		if (!$this->Grade->exists($id)) {
			throw new NotFoundException(__('Invalid grade'));
		}
		$options = array('conditions' => array('Grade.' . $this->Grade->primaryKey => $id));
		$this->set('grade', $this->Grade->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function TeacherAdd() {
		$this->checkRole('教师');
		if ($this->request->is('post')) {
			$this->Grade->create();
			if ($this->Grade->save($this->request->data)) {
				$this->Session->setFlash(__('The grade has been saved.'));
				return $this->redirect(array('action' => 'TeacherIndex'));
			} else {
				$this->Session->setFlash(__('The grade could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function TeacherEdit($id = null) {
		$this->checkRole('教师');
		if (!$this->Grade->exists($id)) {
			throw new NotFoundException(__('Invalid grade'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Grade->save($this->request->data)) {
				$this->Session->setFlash(__('The grade has been saved.'));
				return $this->redirect(array('action' => 'TeacherIndex'));
			} else {
				$this->Session->setFlash(__('The grade could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Grade.' . $this->Grade->primaryKey => $id));
			$this->request->data = $this->Grade->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function TeacherDelete($id = null) {
		$this->checkRole('教师');
		$this->Grade->id = $id;
		if (!$this->Grade->exists()) {
			throw new NotFoundException(__('Invalid grade'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Grade->delete()) {
			$this->Session->setFlash(__('The grade has been deleted.'));
		} else {
			$this->Session->setFlash(__('The grade could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'TeacherIndex'));
	}
}
