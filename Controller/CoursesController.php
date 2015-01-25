<?php
App::uses('AppController', 'Controller');
/**
 * Courses Controller
 *
 * @property Course $Course
 * @property PaginatorComponent $Paginator
 */
class CoursesController extends AppController {
    public $uses = array (
        'Course',
        'Selection'
    );

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
//	//权限验证
//	function beforeFilter(){
//		$this->checkRole('管理员');
//	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->checkRole('管理员');
		$this->Course->recursive = 0;
		$this->set('courses', $this->Paginator->paginate());
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
		$this->Session->write('course_id',$id);
		if (!$this->Course->exists($id)) {
			throw new NotFoundException(__('Invalid course'));
		}
		$options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
		$this->set('course', $this->Course->find('first', $options));
	}
/**
 * TeacherView method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function TeacherView($id = null) {
		$this->checkRole('教师');	
		$this->Session->write('course_id',$id);
		if (!$this->Course->exists($id)) {
			throw new NotFoundException(__('Invalid course'));
		}
		$options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
		$this->set('course', $this->Course->find('first', $options));
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->checkRole('管理员');
		if ($this->request->is('post')) {
			$this->Course->create();
			if ($this->Course->save($this->request->data)) {
				$this->Session->setFlash(__('The course has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course could not be saved. Please, try again.'));
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
		if (!$this->Course->exists($id)) {
			throw new NotFoundException(__('Invalid course'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Course->save($this->request->data)) {
				$this->Session->setFlash(__('The course has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
			$this->request->data = $this->Course->find('first', $options);
            $this->set('maxnumber',$this->Selection->find('count',array('conditions' => array('course_id' => $id))));
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
		$this->Course->id = $id;
		if (!$this->Course->exists()) {
			throw new NotFoundException(__('Invalid course'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Course->delete()) {
			$this->Session->setFlash(__('The course has been deleted.'));
		} else {
			$this->Session->setFlash(__('The course could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
