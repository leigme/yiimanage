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
		
		$realname = $this->getValue('realname');
		if (!isset($realname) || empty($realname) || null === $realname || '' === $realname) {
			$this->redirect($this->urls['homePage']);
			return;
		}
		$weixin = $this->getValue('weixin');
		$telephone = $this->getValue('telephone');
		$email = $this->getValue('email');
		$come = $this->getValue('come');
		$remark = $this->getValue('remark');
		$sex = $this->getValue('sex');
		$price = $this->getValue('price');
		$age = $this->getValue('age');
		$career = $this->getValue('career');
		
		$userInfo = new Userinfo();

		$userInfo->realname = $realname;
		$userInfo->weixinnum = $weixin;
		$userInfo->telephonenum = $telephone;
		$userInfo->email = $email;
		$userInfo->come = $come;
		$userInfo->remark = $remark;
		$userInfo->sex = (int)$sex;
		$userInfo->pricelevel = (int)$price;
		$userInfo->age = $age;
		$userInfo->career = $career;

		$userInfoDao = new UserInfoDao();

		$result = $userInfoDao->addUserInfo($userInfo);
		
		$this->redirect($this->urls['homePage']);
		
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