<?php

class BaseController extends Controller {
	
    /**
     * 控制器地址
     * 
     * @param unknown $path
     */
	public function mCreateUrl($url) {
		return Yii::app()->createUrl($url);
	}
	
	/**
	 * 链接地址
	 * 
	 * @param unknown $url
	 */
	public function mBaseUrl($url) {
	    return Yii::app()->baseUrl.'/'.$url;
	}
	
	/**
	 * 获取参数
	 *
	 * @param 参数名称 $name
	 * @return mixed|unknown|string
	 */
	public function getValue($name) {
		$result = Yii::app()->request->getParam($name, false);
		return $result;
	}
	
	/**
	 * 设置CSS样式
	 *
	 * @param CSS样式文件名  $css
	 */
	public function setCSS($css) {
	
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.STATIC_PATH.'css/'.$css);
	
	}
	
	/**
	 * 设置JS文件
	 *
	 * @param JS文件名  $js
	 */
	public function setJS($js) {
	
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.STATIC_PATH.'js/'.$js, CClientScript::POS_HEAD);
	
	}
	
	/**
	 * 初始化方法
	 * 
	 * {@inheritDoc}
	 * @see CController::beforeAction()
	 */
	protected function beforeAction($action) {
		
		return true;
	}
}