<?php
App::uses('AppController', 'Controller');
/**
 * Classrooms Controller
 *
 * @property Classroom $Classroom
 * @property PaginatorComponent $Paginator
 */
class ClassroomsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','RequestHandler');

/**
 * index method
 *
 * @return void
 */
	public function index() {
        $this->checkRole('管理员');
		$this->Classroom->recursive = 0;
		$this->set('classrooms', $this->Paginator->paginate());
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
		if (!$this->Classroom->exists($id)) {
			throw new NotFoundException(__('Invalid classroom'));
		}
		$options = array('conditions' => array('Classroom.' . $this->Classroom->primaryKey => $id));
		$this->set('classroom', $this->Classroom->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
        $this->checkRole('管理员');
		if ($this->request->is('post')) {
			$this->Classroom->create();
			if ($this->Classroom->save($this->request->data)) {
				$this->Session->setFlash(__('The classroom has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The classroom could not be saved. Please, try again.'));
			}
		}
		$grades = $this->Classroom->Grade->find('list');
		$this->set(compact('grades'));
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
		if (!$this->Classroom->exists($id)) {
			throw new NotFoundException(__('Invalid classroom'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Classroom->save($this->request->data)) {
				$this->Session->setFlash(__('The classroom has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The classroom could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Classroom.' . $this->Classroom->primaryKey => $id));
			$this->request->data = $this->Classroom->find('first', $options);
		}
		$grades = $this->Classroom->Grade->find('list');
		$this->set(compact('grades'));
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
		$this->Classroom->id = $id;
		if (!$this->Classroom->exists()) {
			throw new NotFoundException(__('Invalid classroom'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Classroom->delete()) {
			$this->Session->setFlash(__('The classroom has been deleted.'));
		} else {
			$this->Session->setFlash(__('The classroom could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
/**
 * index method
 *
 * @return void
 */
	public function TeacherIndex() {
        $this->checkRole('教师');
		$this->Classroom->recursive = 0;
		$this->set('classrooms', $this->Paginator->paginate());
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
		if (!$this->Classroom->exists($id)) {
			throw new NotFoundException(__('Invalid classroom'));
		}
		$options = array('conditions' => array('Classroom.' . $this->Classroom->primaryKey => $id));
		$this->set('classroom', $this->Classroom->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function TeacherAdd() {
        $this->checkRole('教师');
		if ($this->request->is('post')) {
			$this->Classroom->create();
			if ($this->Classroom->save($this->request->data)) {
				$this->Session->setFlash(__('The classroom has been saved.'));
				return $this->redirect(array('action' => 'TeacherIndex'));
			} else {
				$this->Session->setFlash(__('The classroom could not be saved. Please, try again.'));
			}
		}
		$grades = $this->Classroom->Grade->find('list');
		$this->set(compact('grades'));
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
		if (!$this->Classroom->exists($id)) {
			throw new NotFoundException(__('Invalid classroom'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Classroom->save($this->request->data)) {
				$this->Session->setFlash(__('The classroom has been saved.'));
				return $this->redirect(array('action' => 'TeacherIndex'));
			} else {
				$this->Session->setFlash(__('The classroom could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Classroom.' . $this->Classroom->primaryKey => $id));
			$this->request->data = $this->Classroom->find('first', $options);
		}
		$grades = $this->Classroom->Grade->find('list');
		$this->set(compact('grades'));
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
		$this->Classroom->id = $id;
		if (!$this->Classroom->exists()) {
			throw new NotFoundException(__('Invalid classroom'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Classroom->delete()) {
			$this->Session->setFlash(__('The classroom has been deleted.'));
		} else {
			$this->Session->setFlash(__('The classroom could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'TeacherIndex'));
	}

    public function ajaxList($id = null){
        if ($this->request->is('ajax')) {
            $this->layout = null;
            $classrooms = $this->Classroom->find('list',array('conditions'=>array('grade_id'=>$id)));
            print_r(json_encode($classrooms));
            exit();
        }
    }
}
