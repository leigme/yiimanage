<?php

class DefaultController extends WebBaseController {
	
	public function actionLogin() {
		$this->setCSS('signin.css');
		
		$this->setPageTitle('登录');
		
		$title = Yii::app()->name.'|会员管理系统';
		
		$this->render('login', array('title'=>$title, 'path'=>$this->getPath('web/default/signin'), ));
	}
	
	public function actionSignin() {
		// 获取参数
		$username = $this->getValue('username');
		$password = $this->getValue('password');
		
		// 参数验证
		if (!isset($username) || null === $username || '' === $username 
				|| empty($username) || false === $username || !isset($password)
				|| null === $password || '' === $password || empty($password) || false === $password) {
				$result['errorFlag'] = true;
				$result['errorMsg'] = '用户名或密码不能为空';
				$result['errorCode'] = 'actionSignin-001';
				return $result;
		}
		
		var_dump($username);
		var_dump($password);

		$this->redirect($this->getPath('web/default/index'));
	}
	
	/**
	 * 管理首页
	 */
	public function actionIndex() {
	
		$this->setCSS('dashboard.css');
	
		$this->setPageTitle('管理');
	
		$this->active = 'index';
		
		$this->page = '会员列表';
		
		$this->render('index', array('url'=>$this->getPath('web/default/adduser'), ));
	}
	
	public function actionAdduser() {
		
		$this->setCSS('dashboard.css');
		
		$this->active = 'add';
		
		$this->page = '会员添加';
		
		$this->render('adduser');
	}
}