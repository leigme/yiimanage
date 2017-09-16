<?php

class FollowUpDao extends BaseDao {
	/**
	 * 添加用户信息
	 *
	 * @param FollowUp $followUp
	 * @return string
	 */
	public function addFollowUp(FollowUp $followUp) {
	
		// 参数验证
		if (!isset($followUp) || empty($followUp) || null == $followUp) {
			return STATUS_NG;
		}
	
		if (!isset($followUp->userId) || 0 >= $followUp->userId) {
			return STATUS_NG;
		}
	
		// 参数初始化设置
		$followUp->createtime = date('Y-m-d H:i:s', time());
		$followUp->updatetime = date('Y-m-d H:i:s', time());
	
		$followUp->deleteflag = DELFLAG_NORMAL;
	
		// 插入操作
		$followUp = $followUp->save();
	
		if($followUp){
			$Id = Yii::app()->db->getLastInsertID();
			return $Id;
		}
	
		return STATUS_NG;
	}
	
	/**
	 * 通过跟进id获取跟进详情
	 * 
	 * @param unknown $id
	 * @return string|CActiveRecord[]
	 */
	public function selectFollowInfo($id) {
		// 参数判断
		if (!isset($id) || empty($id) || 0 >= $id) {
			return STATUS_NG;
		}
		
		$sql = "t1.id,
				t1.userId,
				t1.followtime,
				t1.context,
				t1.remark,
				t1.createtime,
				t1.updatetime,
				t1.deletetime ";
		
		$followUp = FollowUp::model();
		$criteria = new CDbCriteria();
	
		$criteria->select = $sql;
		$criteria->alias = 't1';
		
		$criteria->addCondition('t1.deleteflag = :p1');
		$conditionParams[':p1'] = DELFLAG_NORMAL;
		
		$criteria->addCondition('t1.id = :p2');
		$conditionParams[':p2'] = $id;
		
		$criteria->params = $conditionParams;
		
		// 检索数据
		$resModelData =  $followUp->find($criteria);
		
		if (!isset($resModelData) || empty($resModelData) || null === $resModelData) {
			return STATUS_NG;
		}
		
		$resultData = array();
		
		foreach ($resModelData as $key=>$value) {
			$resultData[$key]=$value;
		}
		
		return $resultData;
	}
	
	/**
	 * 通过分页条件获取记录集合
	 *
	 * @param unknown $pageNum
	 * @param unknown $pageSize
	 * @return string[]|number[]|unknown[][][]|string
	 */
	public function getFollowUpList($pageNum, $pageSize) {
	
		$sql = "t1.id,
				t1.userId,
				t1.followtime,
				t1.context,
				t1.remark,
				t1.createtime,
				t1.updatetime,
				t1.deletetime ";
	
		$followUp = FollowUp::model();
		$criteria = new CDbCriteria();
	
		$criteria->select = $sql;
		$criteria->alias = 't1';
	
		//         $joinSQL=' INNER JOIN {{user}} t2 ON t1.UserId=t2.Id ';
		//         $joinSQL=$joinSQL.' LEFT JOIN {{question}} t5 ON t1.QuestionId=t5.Id ';
	
		//         $criteria->join=$joinSQL;
	
		$criteria->addCondition('t1.deleteflag = :p1');
		$conditionParams[':p1'] = DELFLAG_NORMAL;
	
		$criteria->params = $conditionParams;
	
		// 排序
		$criteria->order = "t1.updatetime DESC ";
	
		$followUpCount = $followUp->count($criteria);
		$followUpCount = intval($followUpCount);
	
		//设置分页信息
		$pages = new CPaginationPost($followUpCount);
	
		// 分页信息设置
		$pageInfo['count'] = $followUpCount;
		// 一页几条
		$pages->pageSize = $pageSize;
		$pageInfo['pages'] = $pages;
	
		// 设置当前是第几页
		$pages->setCurrentPage($pageNum - 1);
			
		// 限制当前页面条数
		$pages->applyLimit($criteria);
	
		// 检索数据
		$resAllModelData =  $followUp->findAll($criteria);
	
		// 查询成功;返回结果
		if (isset($resAllModelData) && 0 < count($resAllModelData)) {
			// 查询结果
			$resArray = array();
	
			// 返回数据
			$resData = array();
	
			foreach ($resAllModelData as $itemData) {
	
				$oneData = array();
	
				foreach ($itemData as $key=>$value) {
					$oneData[$key]=$value;
				}
				$resArray[] = $oneData;
			}
	
			$resData['resStatus'] = STATUS_OK;
			//数据
			$resData['resArray'] = $resArray;
	
			$resData['pageInfo'] = $pageInfo;
	
			return $resData;
		}
	
		// 查询失败;返回数据
		$resData = array();
	
		$resData['resStatus'] = STATUS_NG;
	
		return $resData;
	}
	
	
	public function upFollowUp(FollowUp $followUp) {
		// 参数验证
		if (!isset($followUp) || count($followUp)) {
			return STATUS_NG;
		}
	
		if (!isset($followUp->id) || false === $followUp->id) {
			return STATUS_NG;
		}
	
		$followUpModel = FollowUp::model()->find('Id=:p', array(':p'=>$followUp->id));

		if(isset($followUp->followtime) && '' !== $followUp->followtime) {
			$followUpModel->followtime = $followUp->followtime;
		}
	
		if(isset($followUp->context) && '' !== $followUp->context) {
			$followUpModel->context = $followUp->context;
		}
	
		if(isset($followUp->remark) && '' !== $followUp->remark) {
			$followUpModel->remark = $followUp->remark;
		}
	
		if(isset($followUp->updatetime) && '' !== $followUp->updatetime) {
			$followUpModel->updatetime = $followUp->updatetime;
		} else {
			$followUpModel->UpdateTime = date('Y-m-d H:i:s', time());
		}
	
		if(isset($followUp->deleteflag) && '' !== $followUp->deleteflag) {
			$followUpModel->deleteflag = $followUp->deleteflag;
		}
	
		if(isset($followUp->deletetime) && '' !== $followUp->deletetime) {
			$followUpModel->deletetime = $followUp->deletetime;
		}
	
		// 更新操作
		$followUpModel = $followUpModel->update();
	
		if ($followUpModel) {
			return STATUS_OK;
		}
		return STATUS_NG;
	}
	
	/**
	 * 删除操作
	 *
	 * @param unknown $Id
	 * @return string
	 */
	public function delFollowUp($Id) {
	
		$followUp = FollowUp::model();
	
		$followUp->id = $Id;
		$followUp->deleteflag = DELFLAG_DELETE;
		$followUp->deletetime = date('Y-m-d H:i:s', time());
		$result = $this->upFollowUp($followUp);
	
		return $result;
	
	}
}