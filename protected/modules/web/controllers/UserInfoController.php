<?php

class UserInfoController extends WebBaseController {
	
	/**
	 * 添加用户页面
	 */
	public function actionIndex() {
	
		$this->setCSS('dashboard.css');
	
		$this->setPageTitle('添加客户');
	
		$this->render('adduser');
	}
	
	public function actionChild() {
	    
	    $this->setCSS('dashboard.css');
	    
	    $this->setPageTitle('添加孩子');
	    
	    $this->render('addchild');
	}
	
	/**
	 * 添加用户操作
	 */
	public function actionAddUser() {

		$this->redirect($this->urls['addUser']);
		
	}
	
    public function actionAddChild() {
        
    }
	
	/**
	 * 修改用户操作
	 */
	public function actionUpUser() {}
	
	public function actionUpChild() {}
	
	/**
	 * 删除用户操作
	 */
	public function actionDelUser() {
		
		$this->redirect($this->urls['homePage']);
		
	}
	
	public function actionDelChild() {
		
	}
}