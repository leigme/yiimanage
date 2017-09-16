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
	
		$this->render('login', array('title'=>$title, ));
	}
	
	/**
	 * 后台管理首页
	 */
	function actionIndex() {
		
		$this->setCSS('dashboard.css');
		
		$this->setPageTitle('客户列表');
		
		$pageNum = $this->getValue('page');

		if (!isset($pageNum) || empty($pageNum) || 0 >= $pageNum ) {
			$pageNum = 0;
		}
		
		$pageSize = PAGE_SIZE;
		
		$userInfoDao = new UserinfoDao();
		
		$result = $userInfoDao->getUserInfoList($pageNum, $pageSize);
		
		if (isset($result) && !empty($result) && STATUS_OK === $result['resStatus']) {
			
			for ($i = 0; $i < count($result['resArray']); $i++ ) {
				switch ($result['resArray'][$i]['sex']) {
					case SEX_KEY_MALE:
						$result['resArray'][$i]['sex'] = '男';
						break;
					case SEX__KEY_FEMALE:
						$result['resArray'][$i]['sex'] = '女';
						break;
					default:
						$result['resArray'][$i]['sex'] = '无';
						break;
				}
			}
		}
		
		$this->render('index', array('resultData'=>$result, ));
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
					echo json_encode($result);
					return;
				}
	
				$userDao = new UserDao();
				
				$result = $userDao->verifyUser($username, $password);
				
				if (STATUS_OK === $result) {
					$this->redirect($this->urls['homePage']);
					return;
				}
	
				$this->redirect($this->urls['loginPage']);
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