<?php

class WebBaseController extends BaseController {
	
	public $urls = array();
	
	/**
	 * 设置页面标题
	 *
	 * {@inheritDoc}
	 * @see CController::setPageTitle()
	 */
	public function setPageTitle($value) {
		
		$name = Yii::app()->name ." | ". $value;
		
		$this->pageTitle = '';

		$this->pageTitle = $name;
	}
	
	/**
	 * 设置基础样式
	 */
	public function setBootstrap() {
		
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.BOOTSTRAP_CSS.'bootstrap.min.css');
		
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.BOOTSTRAP_JS.'jquery.min.js', CClientScript::POS_HEAD);
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.BOOTSTRAP_JS.'bootstrap.min.js', CClientScript::POS_HEAD);
		
	}
	
	/**
	 * 设置主题
	 */
	public function setTheme() {
		
		$this->layout = "//default/index";
	}
	
	/**
	 * 登录验证
	 */
	public function verifyLogin() {
	    
	    if (!isset($_SESSION['isLogin'])) {
	        $this->redirect($this->urls['loginPage']);
	        return;
	    } else {
	        if (!isset($_SESSION['username'])) {
	            $this->redirect($this->urls['loginPage']);
	            return;
	        }
	    }
	}
	
	/**
	 * 初始化方法
	 *
	 * {@inheritDoc}
	 * @see CController::beforeAction()
	 */
	protected function beforeAction($action) {
		
		$this->setBootstrap();
		$this->setTheme();
		
		$this->urls = array(
				'loginPage'=>$this->mCreateUrl('web/admin/login'),
				'login'=>$this->mCreateUrl('web/admin/signin'),
		        'signOut'=>$this->mCreateUrl('web/admin/signout'),
				'homePage'=>$this->mCreateUrl('web/admin/index'),
				'findRecord'=>$this->mCreateUrl('web/admin/finduser'),
				'addUserPage'=>$this->mCreateUrl('web/userinfo/index'),
				'addUser'=>$this->mCreateUrl('web/userinfo/adduser'),
    		    'detailPage'=>$this->mCreateUrl('web/admin/detail'),
    		    'upUserPage'=>$this->mCreateUrl('web/userinfo/upuserinfo'),
		        'upUser'=>$this->mCreateUrl('web/userinfo/up'),
		        'delUser'=>$this->mCreateUrl('web/userinfo/deluser'),
		        'addChildPage'=>$this->mCreateUrl('web/userinfo/child'),
				'addChild'=>$this->mCreateUrl('web/userinfo/addchild'),
		        'upChildPage'=>$this->mCreateUrl('web/userinfo/upchildinfo'),
		        'upChild'=>$this->mCreateUrl('web/userinfo/upchild'),
    		    'delChild'=>$this->mCreateUrl('web/userinfo/delchild'),
				'addFollowPage'=>$this->mCreateUrl('web/follow/addfollow'),
				'addFollow'=>$this->mCreateUrl('web/follow/add'),
				'upFollowPage'=>$this->mCreateUrl('web/follow/upfollow'),
				'upFollow'=>$this->mCreateUrl('web/follow/up'),
    		    'delFollow'=>$this->mCreateUrl('web/follow/del'),
		);
		
		return true;
	}
}