<?php

class ChildInfoDao extends BaseDao {
	
	/**
	 * 添加用户信息
	 *
	 * @param ChildInfo $ChildInfo
	 * @return string
	 */
	public function addChildInfo(ChildInfo $ChildInfo) {
	
		// 参数验证
		if (!isset($ChildInfo) || 0 >= count($ChildInfo)) {
			return STATUS_NG;
		}
	
		if (isset($ChildInfo->Id) && 0 < $ChildInfo->Id) {
			return STATUS_NG;
		}
		
		if (!isset($ChildInfo->userinfoId) || 0 >= $ChildInfo->userinfoId) {
			return STATUS_NG;
		}
		
		if(!isset($ChildInfo->realname) || '' == $ChildInfo->realname || -1 == $ChildInfo->realname){
			return STATUS_NG;
		}
	
		// 参数初始化设置
		$ChildInfo->CreateTime = date('Y-m-d H:i:s', time());
		$ChildInfo->UpdateTime = date('Y-m-d H:i:s', time());
	
		$ChildInfo->deleteflag = DELFLAG_NORMAL;
	
		// 插入操作
		$ChildInfo = $ChildInfo->save();
	
		if($ChildInfo){
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
	public function getChildInfoList($pageNum, $pageSize) {
	
		$sql = "t1.id,
				t1.userinfoId,
				t1.realname,
				t1.birthday,
				t1.sex,
				t1.remark,
				t1.createtime,
				t1.updatetime,
				t1.deletetime ";
	
		$ChildInfo = ChildInfo::model();
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
	
		$ChildInfoCount = $ChildInfo->count($criteria);
		$ChildInfoCount = intval($ChildInfoCount);
	
		//设置分页信息
		$pages = new CPaginationPost($ChildInfoCount);
	
		// 分页信息设置
		$pageInfo['count'] = $ChildInfoCount;
		// 一页几条
		$pages->pageSize = $pageSize;
		$pageInfo['pages'] = $pages;
	
		// 设置当前是第几页
		$pages->setCurrentPage($pageNum);
			
		// 限制当前页面条数
		$pages->applyLimit($criteria);
	
		// 检索数据
		$resAllModelData =  $ChildInfo->findAll($criteria);
	
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
	
	
	public function upChildInfo(ChildInfo $ChildInfo) {
		// 参数验证
		if (!isset($ChildInfo) || count($ChildInfo)) {
			return STATUS_NG;
		}
	
		if (!isset($ChildInfo->id) || false === $ChildInfo->id) {
			return STATUS_NG;
		}
	
		$ChildInfoModel = ChildInfo::model()->find('Id=:p', array(':p'=>$ChildInfo->id));
	
		if(isset($ChildInfo->realname) && '' !== $ChildInfo->realname) {
			$ChildInfoModel->realname = $ChildInfo->realname;
		}
		
		if(isset($ChildInfo->birthday) && '' !== $ChildInfo->birthday) {
			$ChildInfoModel->birthday = $ChildInfo->birthday;
		}
	
		if(isset($ChildInfo->sex) && '' !== $ChildInfo->sex) {
			$ChildInfoModel->sex = $ChildInfo->sex;
		}
	
		if(isset($ChildInfo->remark) && '' !== $ChildInfo->remark) {
			$ChildInfoModel->remark = $ChildInfo->remark;
		}
	
		if(isset($ChildInfo->updatetime) && '' !== $ChildInfo->updatetime) {
			$ChildInfoModel->updatetime = $ChildInfo->updatetime;
		} else {
			$ChildInfoModel->UpdateTime = date('Y-m-d H:i:s', time());
		}
	
		if(isset($ChildInfo->deleteflag) && '' !== $ChildInfo->deleteflag) {
			$ChildInfoModel->deleteflag = $ChildInfo->deleteflag;
		}
	
		if(isset($ChildInfo->deletetime) && '' !== $ChildInfo->deletetime) {
			$ChildInfoModel->deletetime = $ChildInfo->deletetime;
		}
	
		// 更新操作
		$ChildInfoModel = $ChildInfoModel->update();
	
		if ($ChildInfoModel) {
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
	public function delChildInfo($Id) {
	
		$ChildInfo = ChildInfo::model();
	
		$ChildInfo->id = $Id;
		$ChildInfo->deleteflag = DELFLAG_DELETE;
		$ChildInfo->deletetime = date('Y-m-d H:i:s', time());
		$result = $this->upChildInfo($ChildInfo);
	
		return $result;
	
	}
	
}