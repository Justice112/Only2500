<?php
App::uses('AppModel', 'Model');
/**
 * Student Model
 *
 * @property Classroom $Classroom
 * @property Grade $Grade
 * @property ExamStudentShip $ExamStudentShip
 * @property SelectionStudentShip $SelectionStudentShip
 */
class Student extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Classroom' => array(
			'className' => 'Classroom',
			'foreignKey' => 'classroom_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Grade' => array(
			'className' => 'Grade',
			'foreignKey' => 'grade_id',
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
		'ExamStudentShip' => array(
			'className' => 'ExamStudentShip',
			'foreignKey' => 'student_id',
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
