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
	
	public function setBootstrap() {
		
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.BOOTSTRAP_CSS.'bootstrap.min.css');
		
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.BOOTSTRAP_JS.'jquery.min.js', CClientScript::POS_HEAD);
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.BOOTSTRAP_JS.'bootstrap.min.js', CClientScript::POS_HEAD);
		
	}
	
	public function setTheme() {
		
		$this->layout = "//default/index";
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
				'homePage'=>$this->mCreateUrl('web/admin/index'),
				'findRecord'=>$this->mCreateUrl('web/admin/finduser'),
				'addUserPage'=>$this->mCreateUrl('web/userinfo/index'),
		        'addChildPage'=>$this->mCreateUrl('web/userinfo/child'),
				'addUser'=>$this->mCreateUrl('web/userinfo/adduser'),
				'detailPage'=>$this->mCreateUrl('web/admin/detail'),
		);
		
		return true;
	}
}