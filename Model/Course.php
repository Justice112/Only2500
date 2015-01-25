<?php
App::uses('AppModel', 'Model');
/**
 * Course Model
 *
 * @property CourseTeacherShip $CourseTeacherShip
 * @property Exam $Exam
 * @property Selection $Selection
 */
class Course extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'CourseTeacherShip' => array(
			'className' => 'CourseTeacherShip',
			'foreignKey' => 'course_id',
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
		),
		'Exam' => array(
			'className' => 'Exam',
			'foreignKey' => 'course_id',
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
		),
		'Selection' => array(
			'className' => 'Selection',
			'foreignKey' => 'course_id',
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
