<?php

/**
 * 登录页面
 * 
 * @author leig
 *
 */
class AdminController extends WebBaseController {
	
	/**
	 * 登录页面
	 */
	public function actionLogin() {
		
		$this->setCSS('signin.css');
	
		$this->setPageTitle('登录');
	
		$title = Yii::app()->name.'|客户管理系统';
	
		$this->render('login', array('title'=>$title, 'path'=>$this->mCreateUrl('web/default/signin'), ));
	}
	
	/**
	 * 后台管理首页
	 */
	function actionIndex() {
		
		$this->setCSS('dashboard.css');
		
		$this->setPageTitle('客户列表');
		
		
		
		$this->render('index');
	}
	
	function actionFindUser() {
		
	}
	
	/**
	 * 登录操作
	 */
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
	
				$this->redirect($this->mCreateUrl('web/default/index'));
	}
	
	/**
	 * 显示详情信息
	 */
	public function actionDetail() {
	    
	    // 获取参数
	    $id = $this->getValue('id');
	    
	    // 参数验证
	    if (!isset($id) || null === $id || '' === $id || empty($id)) {
	        $result['errorFlag'] = true;
	        $result['errorMsg'] = '记录编号不能为空';
	        $result['errorCode'] = 'actionDetail-001';
	        
	        echo json_encode($result);
	        return;
	    }
	    
	    $this->setPageTitle('客户详情');
	    
	    $this->render('details');
	}
}