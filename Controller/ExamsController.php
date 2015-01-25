<?php
App::uses('AppController', 'Controller');
/**
 * Exams Controller
 *
 * @property Exam $Exam
 * @property PaginatorComponent $Paginator
 */
class ExamsController extends AppController {
	public $uses = array (
			'Exam',
			'Student',
			'ExamStudentShip',
			'Teacher'
			
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
		$this->Exam->recursive = 0;
		$this->set('exams', $this->Paginator->paginate());
	}
	public function TeacherIndex() {
		$this->checkRole('教师');
		$this->Paginator->settings = array(
        'conditions' => array('Exam.teacher_id' => $this->Session->read('user_id')),
        'limit' => 20
		);
		$this->Exam->recursive = 0;
		$this->set('exams', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Session->write('exam_id',$id);
		$this->checkRole('管理员');
		if (!$this->Exam->exists($id)) {
			throw new NotFoundException(__('Invalid exam'));
		}
		$options = array('conditions' => array('Exam.' . $this->Exam->primaryKey => $id));
		$this->set('exam', $this->Exam->find('first', $options));
		$this->set('examStudentShips',$this->ExamStudentShip->findAllByExamId($id,null,array('Student.number'=>'asc')));
	}
	public function TeacherView($id = null) {
		$this->Session->write('exam_id',$id);
		$this->checkRole('教师');
		if (!$this->Exam->exists($id)) {
			throw new NotFoundException(__('Invalid exam'));
		}
		$options = array('conditions' => array('Exam.' . $this->Exam->primaryKey => $id));
		$this->set('exam', $this->Exam->find('first', $options));
		$this->set('examStudentShips',$this->ExamStudentShip->findAllByExamId($id,null,array('Student.number'=>'asc')));
	}
	
/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->checkRole('管理员');
		if ($this->request->is('post')) {
			$this->Exam->create();
			if ($this->Exam->save($this->request->data)) {
				$last_insert_id=$this->Exam->id;
				$this->Session->setFlash(__('添加考试成功'));
				//添加完考试信息后添加考试学生
				return $this->redirect(array('controller'=>'Exams','action' => 'view',$this->Exam->id));
			} else {
				$this->Session->setFlash(__('添加失败，请重试！'));
			}
		}
		$teachers = $this->Exam->Teacher->find('list');
		$courses = $this->Exam->Course->find('list');
		$this->set(compact('teachers', 'courses'));
	}
		public function TeacherAdd() {
			$this->checkRole('教师');
		if ($this->request->is('post')) {
			$this->Exam->create();
			if ($this->Exam->save($this->request->data)) {
				$last_insert_id=$this->Exam->id;
				$this->Session->setFlash(__('添加考试成功'));
				//添加完考试信息后添加考试学生
				return $this->redirect(array('controller'=>'Exams','action' => 'TeacherView',$this->Exam->id));
			} else {
				$this->Session->setFlash(__('添加失败，请重试！'));
			}
		}
		$teachers = $this->Exam->Teacher->find('list');
		$courses = $this->Exam->Course->find('list');
		$this->set(compact('teachers', 'courses'));
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
		if (!$this->Exam->exists($id)) {
			throw new NotFoundException(__('Invalid exam'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Exam->save($this->request->data)) {
				$this->Session->setFlash(__('The exam has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The exam could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Exam.' . $this->Exam->primaryKey => $id));
			$this->request->data = $this->Exam->find('first', $options);
		}
		$teachers = $this->Exam->Teacher->find('list');
		$courses = $this->Exam->Course->find('list');
		$this->set(compact('teachers', 'courses'));
	}
	public function TeacherEdit($id = null) {
		$this->checkRole('教师');
		if (!$this->Exam->exists($id)) {
			throw new NotFoundException(__('Invalid exam'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			if ($this->Exam->save($this->request->data)) {
				$this->Session->setFlash(__('The exam has been saved.'));
				return $this->redirect(array('action' => 'TeacherIndex'));
			} else {
				$this->Session->setFlash(__('The exam could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Exam.' . $this->Exam->primaryKey => $id));
			$this->request->data = $this->Exam->find('first', $options);
		}
		$teachers = $this->Exam->Teacher->find('list');
		$courses = $this->Exam->Course->find('list');
		$this->set(compact('teachers', 'courses'));
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
		$this->Exam->id = $id;
		if (!$this->Exam->exists()) {
			throw new NotFoundException(__('Invalid exam'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Exam->delete()) {
			$this->Session->setFlash(__('The exam has been deleted.'));
		} else {
			$this->Session->setFlash(__('The exam could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}	public function TeacherDelete($id = null) {
		$this->Exam->id = $id;
		if (!$this->Exam->exists()) {
			throw new NotFoundException(__('Invalid exam'));
		}
		$this->request->allowMethod('post', 'TeacherDelete');
		if ($this->Exam->delete()) {
			$this->Session->setFlash(__('The exam has been deleted.'));
		} else {
			$this->Session->setFlash(__('The exam could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'TeacherIndex'));
	}
}
