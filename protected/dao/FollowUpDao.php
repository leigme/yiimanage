<?php

class FollowUpDao extends BaseDao {
	/**
	 * 添加用户信息
	 *
	 * @param FollowUp $FollowUp
	 * @return string
	 */
	public function addFollowUp(FollowUp $FollowUp) {
	
		// 参数验证
		if (!isset($FollowUp) || 0 >= count($FollowUp)) {
			return STATUS_NG;
		}
	
		if (isset($FollowUp->Id) && 0 < $FollowUp->Id) {
			return STATUS_NG;
		}
	
		if (!isset($FollowUp->userId) || 0 >= $FollowUp->userId) {
			return STATUS_NG;
		}
	
		// 参数初始化设置
		$FollowUp->CreateTime = date('Y-m-d H:i:s', time());
		$FollowUp->UpdateTime = date('Y-m-d H:i:s', time());
	
		$FollowUp->deleteflag = DELFLAG_NORMAL;
	
		// 插入操作
		$FollowUp = $FollowUp->save();
	
		if($FollowUp){
			$Id = Yii::app()->db->getLastInsertID();
			return $Id;
		}
	
		return STATUS_NG;
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
	
		$FollowUp = FollowUp::model();
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
		$criteria->order = "t1.updatetime ASC ";
	
		$FollowUpCount = $FollowUp->count($criteria);
		$FollowUpCount = intval($FollowUpCount);
	
		//设置分页信息
		$pages = new CPaginationPost($FollowUpCount);
	
		// 分页信息设置
		$pageInfo['count'] = $FollowUpCount;
		// 一页几条
		$pages->pageSize = $pageSize;
		$pageInfo['pages'] = $pages;
	
		// 设置当前是第几页
		$pages->setCurrentPage($pageNum);
			
		// 限制当前页面条数
		$pages->applyLimit($criteria);
	
		// 检索数据
		$resAllModelData =  $FollowUp->findAll($criteria);
	
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
	
	
	public function upFollowUp(FollowUp $FollowUp) {
		// 参数验证
		if (!isset($FollowUp) || count($FollowUp)) {
			return STATUS_NG;
		}
	
		if (!isset($FollowUp->id) || false === $FollowUp->id) {
			return STATUS_NG;
		}
	
		$FollowUpModel = FollowUp::model()->find('Id=:p', array(':p'=>$FollowUp->id));

		if(isset($FollowUp->followtime) && '' !== $FollowUp->followtime) {
			$FollowUpModel->followtime = $FollowUp->followtime;
		}
	
		if(isset($FollowUp->context) && '' !== $FollowUp->context) {
			$FollowUpModel->context = $FollowUp->context;
		}
	
		if(isset($FollowUp->remark) && '' !== $FollowUp->remark) {
			$FollowUpModel->remark = $FollowUp->remark;
		}
	
		if(isset($FollowUp->updatetime) && '' !== $FollowUp->updatetime) {
			$FollowUpModel->updatetime = $FollowUp->updatetime;
		} else {
			$FollowUpModel->UpdateTime = date('Y-m-d H:i:s', time());
		}
	
		if(isset($FollowUp->deleteflag) && '' !== $FollowUp->deleteflag) {
			$FollowUpModel->deleteflag = $FollowUp->deleteflag;
		}
	
		if(isset($FollowUp->deletetime) && '' !== $FollowUp->deletetime) {
			$FollowUpModel->deletetime = $FollowUp->deletetime;
		}
	
		// 更新操作
		$FollowUpModel = $FollowUpModel->update();
	
		if ($FollowUpModel) {
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
	
		$FollowUp = FollowUp::model();
	
		$FollowUp->id = $Id;
		$FollowUp->deleteflag = DELFLAG_DELETE;
		$FollowUp->deletetime = date('Y-m-d H:i:s', time());
		$result = $this->upFollowUp($FollowUp);
	
		return $result;
	
	}
}