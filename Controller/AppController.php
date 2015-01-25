<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public function checkRole ($role=null){
		if (!$this->Session->check('user_id'))
		{
			$this->Session->setFlash('您还未登录，请先登录！');
			$this->redirect('/users/login');
			exit();
		}
		else if($this->Session->read('user_role')!=$role)
		{
			$this->Session->setFlash('您无权访问，自动跳转到首页！');
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
		else if ($this->Session->read('user_role')=='管理员'||$this->Session->read('user_role')=='教师') {
			//以下用于创建我们的加密锁控件
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
	        	$outstring="";
	        	$mylen = 13;
            	$outstring = $s_simnew1->YReadString(0, $mylen, "ExamSyst", "emWrite1", $DevicePath);
	        	if ($outstring!="ExamSystem001") {
	        		$this->Session->destroy();
		           	$this->Session->setFlash("加密锁不正确，请插入正确的加密锁");
	        		$this->redirect('/users/login');
	        	}
	        }
		} 
	}
	
	
}
