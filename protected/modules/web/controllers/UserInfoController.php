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
	    $this->setCSS('bootstrap-datetimepicker.min.css');
	    
	    $this->setJS('bootstrap-datetimepicker.min.js');
	    $this->setJS('locales/bootstrap-datetimepicker.zh-CN.js');
	    
	    $this->setPageTitle('添加孩子');
	    
	    $parentId = $this->getValue('id');
	    
	    $this->render('addchild', array('parentId'=>$parentId, ));
	}
	
	/**
	 * 添加用户操作
	 */
	public function actionAddUser() {
		// 参数验证
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
    	// 参数验证
    	$parentId = $this->getValue('parentId');
    	$realname = $this->getValue('realname');
    	
    	if (!isset($parentId) || empty($parentId) || 0 >= $parentId 
    			||!isset($realname) || empty($realname) 
    			|| null === $realname || '' === $realname) {
    		return;
    	}
    	
    	$birthday = $this->getValue('birthday');
    	$sex = $this->getValue('sex');
    	$remark = $this->getValue('remark');
    	
    	$childId = $this->getValue('childId');
    	
    	if (isset($childId) && !empty($childId) && 0 < $childId) {
    		$childInfo = Childinfo::model();
    		$childInfo->id = $childId;
    	} else {
    		$childInfo = new Childinfo();
    	}
    	
    	$childInfo->userinfoId = $parentId;
    	$childInfo->realname = $realname;
    	$childInfo->birthday = $birthday;
    	$childInfo->sex = $sex;
    	$childInfo->remark = $remark;
    	
    	$childInfoDao = new ChildInfoDao();
    	
    	$resultData = $childInfoDao->addChildInfo($childInfo);
    	
    	if (STATUS_NG == $resultData) {
    		return;
    	}
    	
    	$this->redirect(array(
    			'/web/admin/detail',
    			'id'=>$parentId, 
    	));
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