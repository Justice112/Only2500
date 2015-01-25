<?php
App::uses('AppController', 'Controller');
/**
 * CourseTeacherShips Controller
 *
 * @property CourseTeacherShip $CourseTeacherShip
 * @property PaginatorComponent $Paginator
 */
class CourseTeacherShipsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	//权限验证
	function beforeFilter(){
		$this->checkRole('管理员');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CourseTeacherShip->recursive = 0;
		$this->set('courseTeacherShips', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CourseTeacherShip->exists($id)) {
			throw new NotFoundException(__('Invalid course teacher ship'));
		}
		$options = array('conditions' => array('CourseTeacherShip.' . $this->CourseTeacherShip->primaryKey => $id));
		$this->set('courseTeacherShip', $this->CourseTeacherShip->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
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
		if (!$this->CourseTeacherShip->exists($id)) {
			throw new NotFoundException(__('Invalid course teacher ship'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CourseTeacherShip->save($this->request->data)) {
				$this->Session->setFlash(__('The course teacher ship has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course teacher ship could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CourseTeacherShip.' . $this->CourseTeacherShip->primaryKey => $id));
			$this->request->data = $this->CourseTeacherShip->find('first', $options);
		}
		$courses = $this->CourseTeacherShip->Course->find('list');
		$teachers = $this->CourseTeacherShip->Teacher->find('list');
		$this->set(compact('courses', 'teachers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CourseTeacherShip->id = $id;
		if (!$this->CourseTeacherShip->exists()) {
			throw new NotFoundException(__('Invalid course teacher ship'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CourseTeacherShip->delete()) {
			$this->Session->setFlash(__('The course teacher ship has been deleted.'));
		} else {
			$this->Session->setFlash(__('The course teacher ship could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
