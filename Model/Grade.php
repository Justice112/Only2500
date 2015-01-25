<?php
App::uses('AppModel', 'Model');
/**
 * Grade Model
 *
 * @property Classroom $Classroom
 * @property Student $Student
 */
class Grade extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Classroom' => array(
			'className' => 'Classroom',
			'foreignKey' => 'grade_id',
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
		'Student' => array(
			'className' => 'Student',
			'foreignKey' => 'grade_id',
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
