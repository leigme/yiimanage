<?php

class FollowController extends WebBaseController {
	
    public function actionIndex() {
        // 获取参数
        $followId = $this->getValue('followId');
        
        // 参数验证
        if (!isset($followId) || empty($followId) || 0 >= $followId) {
            return;
        }
           
        $followDao = new FollowUpDao();
        $result = $followDao->selectFollowInfo($followId);
        
        if (!isset($result) || STATUS_NG == $result) {
            return;
        }
        
        $this->setCSS('dashboard.css');
        $this->setPageTitle('跟进详情');
        
        $this->render('index', array('followInfo'=>$result, ));
    }
    
    /**
     * 添加跟进页面
     */
    public function actionAddFollow() {
        $this->setCSS('dashboard.css');
        $this->setCSS('bootstrap-datetimepicker.min.css');
        
        $this->setJS('bootstrap-datetimepicker.min.js');
        $this->setJS('locales/bootstrap-datetimepicker.zh-CN.js');
        
        $this->setPageTitle('添加跟进');
        
        $userId = $this->getValue('id');
        
        $this->render('add', array('userId'=>$userId, ));
    }
    
    /**
     * 更新跟进页面
     */
    public function actionUpFollow() {
        
        $this->setCSS('dashboard.css');
        $this->setCSS('bootstrap-datetimepicker.min.css');
        
        $this->setJS('bootstrap-datetimepicker.min.js');
        $this->setJS('locales/bootstrap-datetimepicker.zh-CN.js');
        
        $this->setPageTitle('修改跟进');
        
        $userId = $this->getValue('id');
        $followId = $this->getValue('followId');
        
        $followDao = new FollowUpDao();
        
        $result = $followDao->selectFollowInfo($followId);
        
        if (!isset($result) || STATUS_NG == $result) {
            return;
        }
        
        $this->render('up', array('userId'=>$userId, 'followInfo'=>$result, ));
        
    }
    
	/**
	 * 添加跟进
	 */
	public function actionAdd() {
	    // 获取参数
	    $userId = $this->getValue('userId');
	    $followDate = $this->getValue('followDate');
	    $content = $this->getValue('content');
	    $remark = $this->getValue('remark');
	    
	    // 参数验证
	    if (!isset($userId) || empty($userId) || 0 >= $userId
	        || !isset($followDate) || empty($followDate) 
	        || !isset($content) || empty($content)
	        || null === $content || '' === $content) {
	            return;
	    }
	    
	    $followUp = new Followup();
	    $followUp->userId = $userId;
	    $followUp->followtime = $followDate;
	    $followUp->context = $content;
	    $followUp->remark = $remark;
	    
	    $followDao = new FollowUpDao();
	    $result = $followDao->addFollowUp($followUp);
	    
	    if (!isset($result) || STATUS_NG == $result) {
	        return;
	    }
	    
		$this->redirect(array(
		    '/web/admin/detail', 
		    'id'=>$userId, 
    	));
	}
	
	/**
	 * 更新跟进
	 */
	public function actionUp() {
	    // 获取参数
	    $userId = $this->getValue('userId');
	    $followId = $this->getValue('followId');
	    $followDate = $this->getValue('followDate');
	    $content = $this->getValue('content');
	    $remark = $this->getValue('remark');
	    
	    // 参数验证
	    if (!isset($followId) || empty($followId) || 0 >= $followId
	        || !isset($content) || empty($content) || null == $content || '' == $content) {
	            return;
	        }
	    
	        $followUp = Followup::model();
	        $followUp->id = $followId;
	        if (isset($followDate) && '' != $followDate) {
	            $followUp->followtime = $followDate;
	        }
	        if (isset($content) && '' != $content) {
	            $followUp->context = $content;
	        }
	        if (isset($remark) && '' != $remark) {
	            $followUp->remark = $remark;
	        }
	    
	        $followDao = new FollowUpDao();
	    
	        $result = $followDao->upFollowUp($followUp);
	    
	        if (!isset($result) || STATUS_NG == $result) {
	            return;
	        }
	    
	        $this->redirect(array(
	            '/web/admin/detail',
	            'id'=>$userId,
	        ));
	}
	
	/**
	 * 删除跟进
	 */
	public function actionDel() {
	    // 获取参数
	    $userId = $this->getValue('id');
	    $followId = $this->getValue('followId');
	    
	    // 参数验证
	    if (!isset($userId) || empty($userId) || 0 >= $userId 
	        || !isset($followId) || empty($followId) || 0 >= $followId) {
	        return;
	    }
	    
	    $followDao = new FollowUpDao();
	    $result = $followDao->delFollowUp($followId);
	    
	    if (!isset($result) || STATUS_NG == $result) {
	        return;
	    }
	    
	    $this->redirect(array(
	        '/web/admin/detail',
	        'id'=>$userId,
	    ));
	    
	}

}