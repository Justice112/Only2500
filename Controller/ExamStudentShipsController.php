<?php
App::uses('AppController', 'Controller');
/**
 * ExamStudentShips Controller
 *
 * @property ExamStudentShip $ExamStudentShip
 * @property PaginatorComponent $Paginator
 */
class ExamStudentShipsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $uses = array (
		'Student',
		'Classroom',
		'Grade',
		'ExamStudentShip',
		'Exam',
        'SelectionStudentShip',
        'Selection'
	);
	public $paginate = array(
        'contain' => array('Student')
    );
	

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->checkRole('管理员');
		$this->ExamStudentShip->recursive = 0;
		$this->set('examStudentShips', $this->Paginator->paginate());
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
		if (!$this->ExamStudentShip->exists($id)) {
			throw new NotFoundException(__('Invalid exam student ship'));
		}
		$options = array('conditions' => array('ExamStudentShip.' . $this->ExamStudentShip->primaryKey => $id));
		$this->set('examStudentShip', $this->ExamStudentShip->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id=null) {
		$this->checkRole('管理员');
		$this->Session->write('exam_id',$id);
		$students ;
		if ($this->request->is('get')) {
			if(!isset($this->request->query['classroom_id'])&&!isset($this->request->query['grade_id'])){
				$students = $this->Student->find('all');
			}
			else if(!isset($this->request->query['classroom_id'])){
				$students = $this->Student->find('all',array(
			   		'conditions' => array('Student.grade_id'=>$this->request->query['grade_id'])
				));
			}
			else {
				$students = $this->Student->find('all',array(
			   		'conditions' => array('Student.grade_id'=>$this->request->query['grade_id'],'Student.classroom_id' =>$this->request->query['classroom_id'] )
				));
				
			}
		}
		if($this->request->is('post')){
			if (!$this->Exam->exists($id)) {
				throw new NotFoundException(__('Invalid exam'));
			}
	       	$this_exam = $this->Exam->findById($id);   
	        $all_selection = $this->Selection->findAllByCourseId($this_exam['Course']['id']);
	        $all_selection_id = null;
	        foreach($all_selection as $one_selection){
	            $all_selection_id[]=$one_selection['Selection']['id'];
	        }
			foreach ($this->data['student_id'] as $student_id ){
				if(!$this->ExamStudentShip->findByStudentIdAndExamId($student_id,$id)){
					$exam_student_ships = array('exam_id'=>$id,'student_id'=>$student_id,'grade'=>null,'left_time'=>$this_exam['Course']['exam_time']*60);
	                $this->ExamStudentShip->create($exam_student_ships);
	                $this->ExamStudentShip->save($exam_student_ships);
	                $this->randomSelection($this->ExamStudentShip->id,$all_selection_id,$this_exam['Course']['selection_number']);
				}
			}
			$this->redirect('/exams/view/'.$id);
		}
		//分页输出学生信息
		$this->set('students', $students);
		$grade_id = $this->Student->Grade->find('first');
		$classrooms = $this->Classroom->find('list',array('conditions'=>array('grade_id'=>$grade_id['Grade']['id'])));
		$grades = $this->Student->Grade->find('list');
		$this->set(compact('classrooms', 'grades'));
		//添加数据
		
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
		if (!$this->ExamStudentShip->exists($id)) {
			throw new NotFoundException(__('Invalid exam student ship'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ExamStudentShip->save($this->request->data)) {
				$this->Session->setFlash(__('The exam student ship has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The exam student ship could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ExamStudentShip.' . $this->ExamStudentShip->primaryKey => $id));
			$this->request->data = $this->ExamStudentShip->find('first', $options);
		}
		$exams = $this->ExamStudentShip->Exam->find('list');
		$students = $this->ExamStudentShip->Student->find('list');
		$this->set(compact('exams', 'students'));
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
		$this->ExamStudentShip->id = $id;
		if (!$this->ExamStudentShip->exists()) {
			throw new NotFoundException(__('Invalid exam student ship'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ExamStudentShip->delete()) {
			$this->Session->setFlash(__('The exam student ship has been deleted.'));
		} else {
			$this->Session->setFlash(__('The exam student ship could not be deleted. Please, try again.'));
		}
		return $this->redirect($this->referer());
	}

    public function randomSelection($ship_id,$all_selection_id,$selection_number){
        shuffle($all_selection_id);
        $result = array_slice($all_selection_id,0,$selection_number);
        $selection_student_ships = null;
        foreach($result as $selection_id){
            $selection_student_ships[] = array(
                'selection_id'=>$selection_id,
                'exam_student_ship_id'=>$ship_id
            );
        }
        $this->SelectionStudentShip->saveMany($selection_student_ships);
    }
	public function TeacherIndex() {
		$this->checkRole('教师');
		$this->ExamStudentShip->recursive = 0;
		$this->set('examStudentShips', $this->Paginator->paginate());
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
		if (!$this->ExamStudentShip->exists($id)) {
			throw new NotFoundException(__('Invalid exam student ship'));
		}
		$options = array('conditions' => array('ExamStudentShip.' . $this->ExamStudentShip->primaryKey => $id));
		$this->set('examStudentShip', $this->ExamStudentShip->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function TeacherAdd($id=null) {
		$this->checkRole('教师');
		$this->Session->write('exam_id',$id);
		$students ;
		if ($this->request->is('get')) {
			if(!isset($this->request->query['classroom_id'])&&!isset($this->request->query['grade_id'])){
				$students = $this->Student->find('all');
			}
			else if(!isset($this->request->query['classroom_id'])){
				$students = $this->Student->find('all',array(
			   		'conditions' => array('Student.grade_id'=>$this->request->query['grade_id'])
				));
			}
			else {
				$students = $this->Student->find('all',array(
			   		'conditions' => array('Student.grade_id'=>$this->request->query['grade_id'],'Student.classroom_id' =>$this->request->query['classroom_id'] )
				));
				
			}
		}
		if($this->request->is('post')){
			if (!$this->Exam->exists($id)) {
				throw new NotFoundException(__('Invalid exam'));
			}
	       	$this_exam = $this->Exam->findById($id);   
	        $all_selection = $this->Selection->findAllByCourseId($this_exam['Course']['id']);
	        $all_selection_id = null;
	        foreach($all_selection as $one_selection){
	            $all_selection_id[]=$one_selection['Selection']['id'];
	        }
			foreach ($this->data['student_id'] as $student_id ){
				if(!$this->ExamStudentShip->findByStudentIdAndExamId($student_id,$id)){
					$exam_student_ships = array('exam_id'=>$id,'student_id'=>$student_id,'grade'=>null,'left_time'=>$this_exam['Course']['exam_time']*60);
	                $this->ExamStudentShip->create($exam_student_ships);
	                $this->ExamStudentShip->save($exam_student_ships);
	                $this->randomSelection($this->ExamStudentShip->id,$all_selection_id,$this_exam['Course']['selection_number']);
				}
			}
			$this->redirect('/exams/TeacherView/'.$id);
		}
		//分页输出学生信息
		$this->Student->recursive = 0;
		$this->set('students', $students);
		$grade_id = $this->Student->Grade->find('first');
		$classrooms = $this->Classroom->find('list',array('conditions'=>array('grade_id'=>$grade_id['Grade']['id'])));
		$grades = $this->Student->Grade->find('list');
		$this->set(compact('classrooms', 'grades'));
		//添加数据
		
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
		if (!$this->ExamStudentShip->exists($id)) {
			throw new NotFoundException(__('Invalid exam student ship'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ExamStudentShip->save($this->request->data)) {
				$this->Session->setFlash(__('The exam student ship has been saved.'));
				return $this->redirect(array('action' => 'TeacherIndex'));
			} else {
				$this->Session->setFlash(__('The exam student ship could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ExamStudentShip.' . $this->ExamStudentShip->primaryKey => $id));
			$this->request->data = $this->ExamStudentShip->find('first', $options);
		}
		$exams = $this->ExamStudentShip->Exam->find('list');
		$students = $this->ExamStudentShip->Student->find('list');
		$this->set(compact('exams', 'students'));
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
		$this->ExamStudentShip->id = $id;
		if (!$this->ExamStudentShip->exists()) {
			throw new NotFoundException(__('Invalid exam student ship'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ExamStudentShip->delete()) {
			$this->Session->setFlash(__('The exam student ship has been deleted.'));
		} else {
			$this->Session->setFlash(__('The exam student ship could not be deleted. Please, try again.'));
		}
		return $this->redirect($this->referer());
	}

}
