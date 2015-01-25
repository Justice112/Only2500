<?php
App::uses('AppController', 'Controller');
class TestController extends AppController {
	public $uses = array (
        'Student',
        'Exam',
        'ExamStudentShip',
        'Selection',
        'Course',
        'SelectionStudentShip'
	);
	public $helpers = array (
        'Html',
        'Form',
        'Ajax',
        'Javascript'
	);
	public $components = array (
        'Session',
        'Cookie',
        'Email',
        'RequestHandler'
	);
	
	public function beforeFilter(){
		$this->checkRole('学生');
	}
	
	public function ready(){
		$this->layout='front';
        $this->Session->delete('user_time');
		$student = $this->Student->findById($this->Session->read('user_id'));
		$studentexams = null;
		foreach($student['ExamStudentShip'] as $ess){
            $exam = $this->Exam->findById($ess['exam_id']);
			if(isset($ess['grade'])){
                if($exam['Course']['open_score']){
                    $statue = $ess['grade'];
                }
				else{
                    $statue = '不公开分数';
                }
			}
			else{
                if($ess['status']){
                    $statue = '正在考试';
                }
                else{
                    $statue = '未考试';
                }
			}
            $studentexams[] = array('Exam'=>$exam,'status'=>$statue);
		}
		$this->set('student', $student);
		$this->set('exams',$studentexams);
        if ($this->request->is ( 'post' )) {
            $choice_exam = $this->ExamStudentShip->findByStudentIdAndExamId($this->Session->read('user_id'),$this->data['Exam']['id']);
            if(isset($choice_exam['ExamStudentShip']['grade'])||(strtotime($choice_exam['Exam']['exam_date'])-strtotime(date("Y-m-d"))<0)){
                $this->Session->setFlash('本次考试已经结束');
                $this->redirect(array('action'=>'ready'));
                exit();
            }
            else if(strtotime($choice_exam['Exam']['exam_date'])-strtotime(date("Y-m-d"))>0){
                $this->Session->setFlash('本次考试还未开始');
                $this->redirect(array('action'=>'ready'));
                exit();
            }
            $choice_exam['ExamStudentShip']['status']=true;
            $this->ExamStudentShip->save($choice_exam['ExamStudentShip']);
            $this->Session->write('exam_student_ship_id',$choice_exam['ExamStudentShip']['id']);
            $this->redirect(array('action'=>'test',1));
        }
	}
	
	public function test($id=null){
		$this->layout = 'front';
        $this->Session->delete('user_time');
        $check_time_result = $this->checkTime();
        if($check_time_result=='error'||$check_time_result == 'post'){
            $this->redirect('/users/logout');
        }
	    $selectionstudentship = $this->SelectionStudentShip->find('first',
            array(
                'conditions' => array('SelectionStudentShip.exam_student_ship_id' => $this->Session->read('exam_student_ship_id')),
                'order' => array('SelectionStudentShip.id'),
                'limit' => 1,
                'page' => $id
            )
        );
        $unanswer = $this->SelectionStudentShip->find('count',
            array(
                'conditions' => array(
                    'SelectionStudentShip.exam_student_ship_id' => $this->Session->read('exam_student_ship_id'),
                    'SelectionStudentShip.answer' => null
                )
            )
        );
        $this->set('selectionstudentship',$selectionstudentship);
        $t = $this->ExamStudentShip->findById($this->Session->read('exam_student_ship_id'));
        $this->set('left_time',$t['ExamStudentShip']['left_time']);
        $exam = $this->Exam->findById($t['Exam']['id']);
        $this->set('exam',$exam);
        $this->set('recent_number',$id);
        $this->set('unanswer',$unanswer);
        if ($this->request->is ( 'post' )) {
                $selectionstudentship['SelectionStudentShip']['answer']=$this->data['answer'];
                $this->SelectionStudentShip->save($selectionstudentship);
            if($id < $exam['Course']['selection_number']){
                $this->redirect(array('controller'=>'test','action'=>'test',$id+1));
            }
            else if($id == $exam['Course']['selection_number']){
                $this->redirect(array('action'=>'summary'));
            }
        }
    }

	public function summary(){
        $this->layout = 'front';
        $this_exam_student_ship = $this->ExamStudentShip->findById($this->Session->read('exam_student_ship_id'));
        $this_course = $this->Course->findById($this_exam_student_ship['Exam']['course_id']);
        $score = 100/$this_course['Course']['selection_number'];
        $grade = 0;
        foreach($this_exam_student_ship['SelectionStudentShip'] as $selection_student_ship){
            $select = $this->Selection->findById($selection_student_ship['selection_id']);
            $correct_answer = $select['Selection']['answer'];
            if($selection_student_ship['answer'] == $correct_answer){
                $grade += $score;
            }
        }
        $this_exam_student_ship['ExamStudentShip']['grade'] = $grade;
        $this_exam_student_ship['ExamStudentShip']['left_time'] =  $this_course['Course']['exam_time']*60 - $this_exam_student_ship['ExamStudentShip']['left_time'];
        $this->ExamStudentShip->save($this_exam_student_ship);
        $this->redirect(array('action'=>'result',$this_exam_student_ship['ExamStudentShip']['id']));
    }

    public function ajaxCheck(){
        $this->layout = null;
        if ($this->request->is ('ajax')) {
            $result = $this->checkTime();
            print_r($result);
            exit();
        }
    }

    public function checkTime(){
        $this_exam_student_ship = $this->ExamStudentShip->findById($this->Session->read('exam_student_ship_id'));
        if(!$this->Session->check('user_time')){
            $this->Session->write('user_time',time());
        }
        $addTime = (time() - $this->Session->read('user_time'));
        $this->Session->write ( 'user_time', time());
        $this_exam_student_ship['ExamStudentShip']['left_time'] -=$addTime;
        if (!$this_exam_student_ship){
            return 'error';
        }
        else if($this_exam_student_ship['ExamStudentShip']['left_time']<0){
            $this_exam_student_ship = $this->ExamStudentShip->findById($this->Session->read('exam_student_ship_id'));
            $this_course = $this->Course->findById($this_exam_student_ship['Exam']['course_id']);
            $score = 100/$this_course['Course']['selection_number'];
            $grade = 0;
            foreach($this_exam_student_ship['SelectionStudentShip'] as $selection_student_ship){
                $select = $this->Selection->findById($selection_student_ship['selection_id']);
                $correct_answer = $select['Selection']['answer'];
                if($selection_student_ship['answer'] == $correct_answer){
                    $grade += $score;
                }
            }
            $this_exam_student_ship['ExamStudentShip']['grade'] = $grade;
            $this->ExamStudentShip->save($this_exam_student_ship);
            return 'post';
        }
        $this->ExamStudentShip->save($this_exam_student_ship);
        return $this_exam_student_ship['ExamStudentShip']['left_time'];
    }

    public function result($id = null){
        $this->layout='front';
        $student = $this->Student->findById($this->Session->read('user_id'));
        $this->set('student', $student);
        $exam_student_ship = $this->ExamStudentShip->findByIdAndStudentId($id,$this->Session->read('user_id'));
        if(!isset($exam_student_ship)){
            $this->redirect('/test/ready');
        }
        else{
            $this->set('exam_student_ship',$exam_student_ship);
            $course = $this->Course->findById($exam_student_ship['Exam']['course_id']);
            if($course['Course']['open_score']){
                $this->set('course',$course);
            }
            else{
                $this->redirect('/test/ready');
            }
        }
    }
}
