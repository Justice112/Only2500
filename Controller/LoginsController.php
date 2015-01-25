<?php
App::uses('AppController', 'Controller');
class LoginsController extends AppController {
	
function login()
  {
 //$this->layout=NULL;
 
    if($this->data)
    {
    	 //根据login.ctp页面上用户输入的用户名查找Students表看是否有对应的用户：
        $results = $this->Student->findBynumber($this->data['Student']['number']);
        if($results&&$results['Student']['name'] == $this->data['Student']['name'])
        {
            //用户名以及密码都正确，此时把学生姓名保存到session中，如果下次需要调用只需用$this->Session->read('Student')
            $this->Session->write('Student',$this->data['Student']['name']);
            $this->redirect(array('action'=>'index'));
        }
        else
        {
            $this->Session->setFlash("学号或姓名错误，请重试");
            
            $this->redirect(array('action'=>'login'));
        }
    }
  }	
	public function logout() {
			$this->Session->setFlash('再见！');
			$this->redirect($this->Auth->logout());
}
	
}
