<?php
App::uses('AppController', 'Controller');
/**
 * Selections Controller
 *
 * @property Selection $Selection
 * @property PaginatorComponent $Paginator
 */
class SelectionsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $use=array('Teacher','CourseTeacherShip');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->checkRole('管理员');
		$this->Selection->recursive = 0;
		$this->set('selections', $this->Paginator->paginate());
	}
	public function TeacherIndex() {
		$this->checkRole('教师');
			//$courses = $this->Selection->Course->find('list');		
		$this->Selection->recursive = 0;
		$this->set('selections', $this->Paginator->paginate());
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
		if (!$this->Selection->exists($id)) {
			throw new NotFoundException(__('Invalid selection'));
		}
		$options = array('conditions' => array('Selection.' . $this->Selection->primaryKey => $id));
		$this->set('selection', $this->Selection->find('first', $options));
	}
	public function TeacherView($id = null) {
		$this->checkRole('教师');
		if (!$this->Selection->exists($id)) {
			throw new NotFoundException(__('Invalid selection'));
		}
		$options = array('conditions' => array('Selection.' . $this->Selection->primaryKey => $id));
		$this->set('selection', $this->Selection->find('first', $options));
	}
	

/**
 * add method
 *
 * @return void
 */
	public function add($id=NULL) {
		$this->checkRole('管理员');
		if ($this->request->is('post')) {
			$this->Selection->create();
			if ($this->Selection->save($this->request->data)) {
				$this->Session->setFlash(__('The selection has been saved.'));
				return $this->redirect(array('controller'=>'courses','action' => 'view',$this->request->data['Selection']['course_id'])); 
			} else {
				$this->Session->setFlash(__('The selection could not be saved. Please, try again.'));
			}
		}
		$course = $this->Selection->Course->findById($id);
		$this->set('course',$course);
	}
	public function TeacherAdd() {
		$this->checkRole('教师');
		if ($this->request->is('post')) {
			$this->Selection->create();
			if ($this->Selection->save($this->request->data)) {
				$this->Session->setFlash(__('The selection has been saved.'));
				return $this->redirect(array('controller'=>'courses','action' => 'teacherView',$this->request->data['Selection']['course_id']));
			} else {
				$this->Session->setFlash(__('The selection could not be saved. Please, try again.'));
			}
		}
		$courses = $this->Selection->Course->find('list');
		$this->set(compact('courses'));
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
		if (!$this->Selection->exists($id)) {
			throw new NotFoundException(__('Invalid selection'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if($this->request->data['Selection']['picture']==null) {
				$theSelection=$this->Selection->findById($id);
				$this->request->data['Selection']['picture']=$theSelection['Selection']['picture'];
			}
			if ($this->Selection->save($this->request->data)) {
				$this->Session->setFlash(__('The selection has been saved.'));
				return $this->redirect(array('controller'=>'courses','action' => 'view',$this->request->data['Selection']['course_id']));
			} else {
				$this->Session->setFlash(__('The selection could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Selection.' . $this->Selection->primaryKey => $id));
			$this->request->data = $this->Selection->find('first', $options);
		}
		$courses = $this->Selection->Course->find('list');
		$this->set(compact('courses'));
	}
	public function TeacherEdit($id = null) {
		$this->checkRole('教师');
		if (!$this->Selection->exists($id)) {
			throw new NotFoundException(__('Invalid selection'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if($this->request->data['Selection']['picture']==null) {
				$theSelection=$this->Selection->findById($id);
				$this->request->data['Selection']['picture']=$theSelection['Selection']['picture'];
			}
			if ($this->Selection->save($this->request->data)) {
				$this->Session->setFlash(__('The selection has been saved.'));
				return $this->redirect(array('controller'=>'courses','action' => 'teacherView',$this->request->data['Selection']['course_id']));
			} else {
				$this->Session->setFlash(__('The selection could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Selection.' . $this->Selection->primaryKey => $id));
			$this->request->data = $this->Selection->find('first', $options);
		}
		$courses = $this->Selection->Course->find('list');
		$this->set(compact('courses'));
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
		$this->Selection->id = $id;
		$theSelection=$this->Selection->findById($id);
		$theCourseId=$theSelection['Selection']['course_id'];
		if (!$this->Selection->exists()) {
			throw new NotFoundException(__('Invalid selection'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Selection->delete()) {
			$this->Session->setFlash(__('The selection has been deleted.'));
		} else {
			$this->Session->setFlash(__('The selection could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('controller'=>'courses','action' => 'view',$theCourseId));
	}
	public function TeacherDelete($id = null) {
		$this->checkRole('教师');
		$this->Selection->id = $id;
		if (!$this->Selection->exists()) {
			throw new NotFoundException(__('Invalid selection'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Selection->delete()) {
			$this->Session->setFlash(__('The selection has been deleted.'));
		} else {
			$this->Session->setFlash(__('The selection could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'TeacherIndex'));
	}
 	public function uploadImg (){
        $targetFolder = '/webroot/images/selectionImg'; // Relative to the root
        $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
        $verifyToken = md5('Jiaqi.Feng' . $_POST['timestamp']);
        $targetName = time().rand(0,999).'.jpg';

        if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $targetFile = rtrim($targetPath,'/') . '/' .$targetName;

            // Validate the file type
            $fileTypes = array('jpg','jpeg','gif','png'); // File extensions
            $fileParts = pathinfo($_FILES['Filedata']['name']);

            if (in_array($fileParts['extension'],$fileTypes)) {
                move_uploaded_file($tempFile,$targetFile);
                echo $targetName;
                exit();
            } else {
                echo 'Invalid file type.';
                exit();
            }
        }
    }
	
}
