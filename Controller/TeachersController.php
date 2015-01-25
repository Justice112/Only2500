<?php
App::uses('AppController', 'Controller');
/**
 * Teachers Controller
 *
 * @property Teacher $Teacher
 * @property PaginatorComponent $Paginator
 */
class TeachersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $use = array('Course','CourseTeacherShip');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->checkRole('教师');
		$id=$this->Session->read('user_id');
		if (!$this->Teacher->exists($id)) {
			$this->Session->setFlash("您还未登录，请先登录！");
			return $this->redirect(array('controller'=>'users','action'=>'login'));
		}
		$options = array('conditions' => array('Teacher.' . $this->Teacher->primaryKey => $id));
		//$courseteacherships=$this->CourseTeacherShip->find('list',array('options'=>array('CourseTeacherShip.'.$this->CourseTeacherShip->teacher_id=>$id)));
		$this->set('teacher', $this->Teacher->find('first', $options));
		//$this->set(compact($courseteacherships));
	}
public function adminIndex() {
	$this->checkRole('管理员');
		$this->Teacher->recursive = 0;
		$this->set('teachers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->checkRole('教师');
		if (!$this->Teacher->exists($id)) {
			throw new NotFoundException(__('Invalid teacher'));
		}
		$options = array('conditions' => array('Teacher.' . $this->Teacher->primaryKey => $id));
		$this->set('teacher', $this->Teacher->find('first', $options));
		
	}

	public function adminView($id = null) {
		$this->checkRole('管理员');
		if (!$this->Teacher->exists($id)) {
			throw new NotFoundException(__('Invalid teacher'));
		}
		$options = array('conditions' => array('Teacher.' . $this->Teacher->primaryKey => $id));
		$this->set('teacher', $this->Teacher->find('first', $options));
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->checkRole('教师');
		if ($this->request->is('post')) {
			$this->Teacher->create();
			if ($this->Teacher->save($this->request->data)) {
				$this->Session->setFlash(__('The teacher has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The teacher could not be saved. Please, try again.'));
			}
		}
	}
	public function adminAdd() {
		$this->checkRole('管理员');
		if ($this->request->is('post')) {
			$this->Teacher->create();
			if ($this->Teacher->save($this->request->data)) {
				$this->Session->setFlash(__('The teacher has been saved.'));
				return $this->redirect(array('controller'=>'CourseTeacherShips','action' => 'add'));
			} else {
				$this->Session->setFlash(__('The teacher could not be saved. Please, try again.'));
			}
			
		}
			
	}
	public function addCourseTeacherShip() {
		$this->checkRole('管理员');
		if ($this->request->is('post')) {
			$this->CourseTeacherShip->create();
			if ($this->CourseTeacherShip->save($this->request->data)) {
				$this->Session->setFlash(__('The course teacher ship has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course teacher ship could not be saved. Please, try again.'));
			}
		}
		$courses = $this->CourseTeacherShip->Course->find('list');
		$teachers = $this->CourseTeacherShip->Teacher->find('list');
		$this->set(compact('courses', 'teachers'));
	}
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		
		if (!$this->Teacher->exists($id)) {
			throw new NotFoundException(__('Invalid teacher'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Teacher->save($this->request->data)) {
				$this->Session->setFlash(__('The teacher has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The teacher could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Teacher.' . $this->Teacher->primaryKey => $id));
			$this->request->data = $this->Teacher->find('first', $options);
		}
	}
	public function adminEdit($id = null) {
		$this->checkRole('管理员');
		if (!$this->Teacher->exists($id)) {
			throw new NotFoundException(__('Invalid teacher'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Teacher->save($this->request->data)) {
				$this->Session->setFlash(__('The teacher has been saved.'));
				return $this->redirect(array('action' => 'adminIndex'));
			} else {
				$this->Session->setFlash(__('The teacher could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Teacher.' . $this->Teacher->primaryKey => $id));
			$this->request->data = $this->Teacher->find('first', $options);
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
		$this->Teacher->id = $id;
		if (!$this->Teacher->exists()) {
			throw new NotFoundException(__('Invalid teacher'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Teacher->delete()) {
			$this->Session->setFlash(__('The teacher has been deleted.'));
		} else {
			$this->Session->setFlash(__('The teacher could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function adminDelete($id = null) {
		$this->checkRole('管理员');
		$this->Teacher->id = $id;
		if (!$this->Teacher->exists()) {
			throw new NotFoundException(__('Invalid teacher'));
		}
		$this->request->allowMethod('post', 'adminDelete');
		if ($this->Teacher->delete()) {
			$this->Session->setFlash(__('The teacher has been deleted.'));
		} else {
			$this->Session->setFlash(__('The teacher could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'adminIndex'));
	}
}

