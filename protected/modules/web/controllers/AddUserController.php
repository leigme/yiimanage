<?php

class AddUserController extends WebBaseController {
	
	/**
	 * 添加用户页面
	 */
	public function actionIndex() {
	
		$this->setCSS('dashboard.css');
	
		$this->active = 'add';
	
		$this->setPageTitle('添加会员');
	
		$this->render('adduser');
	}
	
	/**
	 * 添加用户操作
	 */
	public function actionAdd() {
		
	}
	
	/**
	 * 修改用户操作
	 */
	public function actionUp() {}
	
	/**
	 * 删除用户操作
	 */
	public function actionDel() {}
}