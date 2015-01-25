<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController {
	public $uses = array (
			'Teacher',
			'Student',
			'Admin'
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
	

	public function login() {
		$this->layout='front';
		if($this->Session->read('user_role')!=$role){
			if($this->Session->read('user_role')=='管理员'){
				$this->redirect(array('controller'=>'admins','action'=>'index'));
			}
			else if ($this->Session->read('user_role')=='教师'){
				$this->redirect(array('controller'=>'teachers','action'=>'index'));
			}
			else if($this->Session->read('user_role')=='学生'){
				$this->redirect(array('controller'=>'test','action'=>'ready'));
			}
			exit();
		}
		if ($this->request->is ( 'post' )) {
			/*以下用于创建我们的加密锁控件
			$s_simnew1=new COM("Syunew3A.s_simnew3");
			//这个用于判断系统中是否存在着加密锁。不需要是指定的加密锁,
	        $DevicePath = $s_simnew1->FindPort(0);
	        if( $s_simnew1->LastError != 0 )
	        {
	            // echo "未找到加密锁,请插入加密锁后，再进行操作。";
	           	$this->Session->destroy();
	           	$this->Session->setFlash("未找到加密锁,请插入加密锁后，再进行操作");
				$this->redirect('/users/login');
				exit();
	        }
	        else {
	        	$ID1 = $s_simnew1->GetID_1($DevicePath);
            	$ID2 = $s_simnew1->GetID_2($DevicePath);
	        	if ($ID1=='283804928'&&$ID2=='296848575') { */
					if($this->data['User']['role']=='学生'){ 
						$results = $this->Student->findByNumber ( $this->data ['User'] ['account'] );
						if ($results && $results ['Student'] ['password'] == /*md5*/ ( $this->data ['User'] ['password'] )) {
							$this->Session->write ( 'user_id', $results['Student']['id']);
							$this->Session->write ( 'user_name', $results['Student']['name']);
							$this->Session->write ( 'user_role', '学生');
							$this->redirect('/test/ready');
						} else {
							$this->Session->setFlash ( '登录失败！' );
							$this->set ( 'error', true );
						}
					}
					else if($this->data['User']['role']=='教师'){
						$results = $this->Teacher->findByUsername ( $this->data ['User'] ['account'] );
						if ($results && $results ['Teacher'] ['password'] == /*md5*/ ( $this->data ['User'] ['password'] )) {
							$this->Session->write ( 'user_id', $results['Teacher']['id']);
							$this->Session->write ( 'user_name', $results['Teacher']['name']);
							$this->Session->write ( 'user_role', '教师');
							$this->redirect(array('controller'=>'Teachers','action'=>'index'));
						} else {
							$this->Session->setFlash ( '登录失败！' );
							$this->set ( 'error', true );
						}
					}
		
					else if($this->data['User']['role']=='管理员'){
						$results = $this->Admin->findByName ( $this->data ['User'] ['account'] );
						if ($results && $results ['Admin'] ['password'] == /*md5*/ ( $this->data ['User'] ['password'] )) {
							$this->Session->write ( 'user_id', $results['Admin']['id']);
							$this->Session->write ( 'user_name', $results['Admin']['name']);
							$this->Session->write ( 'user_role', '管理员');
							$this->redirect('/admins/index/1/1');
						} else {
							$this->Session->setFlash ( '登录失败！' );
							$this->set ( 'error', true );
						}
					}
		      }
		     /*     else {
	        		$this->Session->destroy();
		           	$this->Session->setFlash("加密锁不正确，请插入正确的加密锁");
					$this->redirect('/users/login');
					exit();
		        }
	        }
		} */
	}

	public function logout(){
			$this->layout='front';
		$this->Session->destroy();
		$this->redirect(array('controller' =>'users','action'=>'login'));
	}
}
