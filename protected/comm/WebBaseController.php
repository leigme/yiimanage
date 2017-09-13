<?php

class WebBaseController extends BaseController {
	
	public $urls = array();
	
	public $active = 'index';
	
	public $page;
	
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
	
	public function setSideBar() {
		$arr = array('index'=>$this->mCreateUrl('web/default/index'), 
				'add'=>$this->mCreateUrl('web/default/adduser'), );
		$this->urls = $arr;
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
		$this->setSideBar();
		
		$this->urls = array(
				'homePage'=>$this->mCreateUrl('web/admin/index'),
				'findRecord'=>$this->mCreateUrl('web/admin/finduser'), 
				'addUser'=>$this->mCreateUrl('web/userinfo/index'),
		        'addChild'=>$this->mCreateUrl('web/userinfo/child'),
				
		);
		
		return true;
	}
}