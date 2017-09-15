<?php

class DefaultController extends WebBaseController {
	
	/**
	 * 管理首页
	 */
	public function actionIndex() {
		$this->redirect($this->urls['homePage']);
	}
	
}