<?php
App::uses('AppController', 'Controller');
/**
 * Students Controller
 *
 * @property Student $Student
 * @property PaginatorComponent $Paginator
 */
class StudentsController extends AppController {

    public $uses = array (
        'Student',
        'Grade',
        'Classroom'
    );
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
		$firstgrade = $this->Grade->find('first');
		//$classrooms = $this->Classroom->find('list',array('conditions'=>array('grade_id'=>$firstgrade['Grade']['id'])));
		$classrooms = $this->Classroom->find('list',array('conditions'=>array('grade_id'=>$firstgrade['Grade']['id'])));
		$grades = $this->Student->Grade->find('list');
		$this->set(compact('classrooms', 'grades'));
	}
	public function teacherIndex() {
		$this->checkRole('教师');
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
		$firstgrade = $this->Grade->find('first');
		//$classrooms = $this->Classroom->find('list',array('conditions'=>array('grade_id'=>$firstgrade['Grade']['id'])));
		$classrooms = $this->Classroom->find('list',array('conditions'=>array('grade_id'=>$firstgrade['Grade']['id'])));
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
	public function view($id = null) {
        $this->checkRole('管理员');
		if (!$this->Student->exists($id)) {
			throw new NotFoundException(__('Invalid student'));
		}
		$options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
		$this->set('student', $this->Student->find('first', $options));
	}
	public function TeacherView($id = null) {
        $this->checkRole('教师');
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
	public function add() {
        $this->checkRole('管理员');
		if ($this->request->is('post')) {
			$this->Student->create();
			if ($this->Student->save($this->request->data)) {
				$this->Session->setFlash(__('The student has been saved.'));
				return $this->redirect(array('controller'=>'classrooms','action' => 'view',$this->request->data['Student']['classroom_id']));
			} else {
				$this->Session->setFlash(__('The student could not be saved. Please, try again.'));
			}
		}
        $firstgrade = $this->Grade->find('first');
		$classrooms = $this->Classroom->find('list',array('conditions'=>array('grade_id'=>$firstgrade['Grade']['id'])));
		$grades = $this->Student->Grade->find('list');
		$this->set(compact('classrooms', 'grades'));
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
		if (!$this->Student->exists($id)) {
			throw new NotFoundException(__('Invalid student'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Student->save($this->request->data)) {
				$this->Session->setFlash(__('The student has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The student could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
			$this->request->data = $this->Student->find('first', $options);
            $student = $this->request->data;
            $classrooms = $this->Classroom->find('list',array('conditions'=>array('grade_id'=>$student['Grade']['id'])));
            $grades = $this->Student->Grade->find('list');
            $this->set(compact('classrooms', 'grades'));
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
		$this->Student->id = $id;
		if (!$this->Student->exists()) {
			throw new NotFoundException(__('Invalid student'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Student->delete()) {
			$this->Session->setFlash(__('The student has been deleted.'));
		} else {
			$this->Session->setFlash(__('The student could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	/**
	 * login method
	 * string void 
	 * Enter description here ...
	 */
}
