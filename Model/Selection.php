<?php
App::uses('AppModel', 'Model');
/**
 * Selection Model
 *
 * @property Course $Course
 * @property SelectionStudentShip $SelectionStudentShip
 */
class Selection extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Course' => array(
			'className' => 'Course',
			'foreignKey' => 'course_id',
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
			'foreignKey' => 'selection_id',
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
