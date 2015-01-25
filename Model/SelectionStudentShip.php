<?php
App::uses('AppModel', 'Model');
/**
 * SelectionStudentShip Model
 *
 * @property Student $Student
 * @property Selection $Selection
 * @property ExamStudentShip $ExamStudentShip
 */
class SelectionStudentShip extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
	
//		'Student' => array(
//			'className' => 'Student',
//			'foreignKey' => 'student_id',
//			'conditions' => '',
//			'fields' => '',
//			'order' => ''
//		),
		'Selection' => array(
			'className' => 'Selection',
			'foreignKey' => 'selection_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ExamStudentShip' => array(
			'className' => 'ExamStudentShip',
			'foreignKey' => 'exam_student_ship_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
