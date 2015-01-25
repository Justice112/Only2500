<?php
App::uses('AppController', 'Controller');
/**
 * Admins Controller
 *
 * @property Admin $Admin
 * @property PaginatorComponent $Paginator
 */
class AdminsController extends AppController {
	function beforeFilter(){
		$this->checkRole('管理员');
	}
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $uses = array('Student','Grade','Classroom');
/**
 * index methods
 *
 * @return void
 */
	public function index() {
		if($this->request->is('get')){	
			if(!isset($this->request->query['classroom_id'])&&!isset($this->request->query['grade_id'])){
				$this->Paginator->settings = array(
					'limit'=>20
				);
			}
			else if(!isset($this->request->query['classroom_id'])){
				$this->Paginator->settings = array(
			   		'conditions' => array('Student.grade_id'=>$this->request->query['grade_id']),
					'limit'=>20
				);
			}
			else {
				$this->Paginator->settings = array(
			   		'conditions' => array('Student.grade_id'=>$this->request->query['grade_id'],'Student.classroom_id' =>$this->request->query['classroom_id'] ),
					'limit'=>20
				);
				
			}
		}
		$this->Student->recursive = 0;
		$this->set('students', $this->Paginator->paginate());	
		$grade_id = $this->Student->Grade->find('first');
		$classrooms = $this->Classroom->find('list',array('conditions'=>array('grade_id'=>$grade_id['Grade']['id'])));
		$grades = $this->Student->Grade->find('list');
		$this->set(compact('classrooms', 'grades'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function viewStudent($id = null) {
		if (!$this->Student->exists($id)) {
			throw new NotFoundException(__('Invalid student'));
		}
		$options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
		$this->set('student', $this->Student->find('first', $options));
	}
	/**
 * add method
 *
 * @return void
 */
public function addStudent() {
		if ($this->request->is('post')) {
			$this->Student->create();
			if ($this->Student->save($this->request->data)) {
				$this->Session->setFlash(__('学生添加成功！'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('学生添加失败，请重试.'));
			}
		}
		$classrooms = $this->Student->Classroom->find('list');
		$grades = $this->Student->Grade->find('list');
		$this->set(compact('classrooms', 'grades'));
	}

/**
	
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Admin->exists($id)) {
			throw new NotFoundException(__('Invalid admin'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Admin->save($this->request->data)) {
				$this->Session->setFlash(__('The admin has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The admin could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Admin.' . $this->Admin->primaryKey => $id));
			$this->request->data = $this->Admin->find('first', $options);
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
		$this->Admin->id = $id;
		if (!$this->Admin->exists()) {
			throw new NotFoundException(__('Invalid admin'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Admin->delete()) {
			$this->Session->setFlash(__('The admin has been deleted.'));
		} else {
			$this->Session->setFlash(__('The admin could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
