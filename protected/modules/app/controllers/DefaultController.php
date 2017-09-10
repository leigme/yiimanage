<?php

class DefaultController extends AppBaseController {
	public function actionIndex() {
		$this->render('index');
	}
}