<?php
App::uses('AppModel', 'Model');
/**
 * ExamStudentShip Model
 *
 * @property Exam $Exam
 * @property Student $Student
 * @property SelectionStudentShip $SelectionStudentShip
 */
class ExamStudentShip extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Exam' => array(
			'className' => 'Exam',
			'foreignKey' => 'exam_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Student' => array(
			'className' => 'Student',
			'foreignKey' => 'student_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'SelectionStudentShip' => array(
			'className' => 'SelectionStudentShip',
			'foreignKey' => 'exam_student_ship_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => '',
            'dependent'  => true
		)
	);

}
