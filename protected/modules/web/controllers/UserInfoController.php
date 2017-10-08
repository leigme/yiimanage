<?php

class UserInfoController extends WebBaseController {
	
	/**
	 * 添加用户页面
	 */
	public function actionIndex() {
	
		$this->setCSS('dashboard.css');
	
		$this->setPageTitle('添加客户');
	
		$userId = $this->getValue('id');

		if (!isset($userId) || empty($userId) || null == $userId) {
		    $userInfo = STATUS_NG;
		} else {
		    $userInfoDao = new UserInfoDao();
		    $userInfo = $userInfoDao->selectUserInfo($userId);
		    
		    switch ($userInfo['sex']) {
		        case SEX_KEY_MALE:
		            $userInfo['sexTitle'] = '男';
		            break;
		        case SEX__KEY_FEMALE:
		            $userInfo['sexTitle'] = '女';
		            break;
		        default:
		            $userInfo['sexTitle'] = '无';
		            break;
		    }
		    
		    switch ($userInfo['pricelevel']) {
		        case PRICE_HIGH:
		            $userInfo['pricelevelTitle'] = '高';
		            break;
		        case PRICE_MID:
		            $userInfo['pricelevelTitle'] = '中';
		            break;
		        case PRICE_LOW:
		            $userInfo['pricelevelTitle'] = '低';
		            break;
		        default:
		            $userInfo['pricelevelTitle'] = '无';
		            break;
		    }
		    
		}
		
		$this->render('adduser', array('userInfo'=>$userInfo, ));
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
		
		$userId = (int)$this->getValue('id');
		
		if (isset($userId) && 0 < $userId) {
		     $userInfo = Userinfo::model();
		     $userInfo->id = (int)$userId;
		} else {
		    $userInfo = new Userinfo();
		}

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
	
	/**
	 * 添加孩子页面
	 */
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
	 * 添加孩子操作
	 */
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
	 * 修改用户页面
	 */
	public function actionUpUserInfo() {
	    
	    $userId = $this->getValue('id');
	    
	    // 参数验证
	    if (!isset($userId) || empty($userId) || null == $userId || '' == $userId) {
	        return;
	    }
	    
	    $this->redirect(array('index', 'id'=>$userId, ));
	}
	
	public function actionUpChild() {}
	
	/**
	 * 删除用户操作
	 */
	public function actionDelUser() {
	    
	    $userId = $this->getValue('id');
	    
	    $userInfoDao = new UserInfoDao();
	    
	    $result = $userInfoDao->delUserInfo($userId);
	    
		$this->redirect($this->urls['homePage']);
		
	}
	
	// 参数孩子
	public function actionDelChild() {
		// 获取参数
		$childId = $this->getValue('childId');
		$parentId = $this->getValue('parentId');
		
		// 参数验证
		if (!isset($childId) || empty($childId) || 0 >= $childId) {
			return;
		}		
		
		$childInfoDao = new ChildInfoDao();
		
		$result = $childInfoDao->delChildInfo($childId);
		
		if (!isset($result) || STATUS_NG == $result) {
			return;
		}
		
		$this->redirect(array(
				'/web/admin/detail',
				'id'=>$parentId,
		));
	}
}