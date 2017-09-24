<?php
/**
 * 用户信息操作DAO
 * 
 * @author leig
 *
 */
class UserInfoDao extends BaseDao {
	
	/**
	 * 添加用户信息
	 * 
	 * @param Userinfo $userInfo
	 * @return string
	 */
	public function addUserInfo(Userinfo $userInfo) {
		
		// 参数验证
		if (!isset($userInfo) || empty($userInfo) || null == $userInfo) {
			return STATUS_NG;
		}
		
		if(!isset($userInfo->realname) || '' == $userInfo->realname || -1 == $userInfo->realname){
			return STATUS_NG;
		}
		
		// 参数初始化设置
		if (!isset($userInfo->id)) {
		    $userInfo->createtime = date('Y-m-d H:i:s', time());
		}
		
		$userInfo->updatetime = date('Y-m-d H:i:s', time());

		$userInfo->deleteflag = DELFLAG_NORMAL;
		
		// 插入操作
		$result = $userInfo->save();
		
		if($result){
			$id = Yii::app()->db->getLastInsertID();
			return $id;
		}

		return STATUS_NG;
	}
	
	
	public function selectUserInfo($id) {
		// 参数判断
		if (!isset($id) || empty($id) || 0 >= $id) {
			return STATUS_NG;
		}
	
		$sql = 't1.id,
				t1.createby,
				t1.realname,
				t1.birthday,
				t1.sex,
				t1.age,
				t1.career,
				t1.remark,
				t1.come,
				t1.pricelevel,
				t1.email,
				t1.telephonenum,
				t1.weixinnum,
				t1.qqnum,
				t1.sinanum,
				t1.createtime,
				t1.updatetime,
				t1.deletetime ';
	
		$userInfo = Userinfo::model();
		$criteria = new CDbCriteria();
	
		$criteria->select = $sql;
		$criteria->alias = 't1';
	
		$criteria->addCondition('t1.deleteflag = :p1');
		$conditionParams[':p1'] = DELFLAG_NORMAL;
	
		$criteria->addCondition('t1.id = :p2');
		$conditionParams[':p2'] = $id;
	
		$criteria->params = $conditionParams;
	
		// 检索数据
		$resModelData =  $userInfo->find($criteria);
	
		if (!isset($resModelData) || empty($resModelData) || null === $resModelData) {
			return STATUS_NG;
		}
	
		$resultData = array();
	
		foreach ($resModelData as $key=>$value) {
			$resultData[$key]=$value;
		}
	
		return $resultData;
	}
	
	public function getUserInfoListByConditions(Userinfo $user, $pageNum) {
		
		$sql = "t1.id,
				t1.createby,
				t1.realname,
				t1.birthday,
				t1.sex,
				t1.age,
				t1.career,
				t1.remark,
				t1.come,
				t1.pricelevel,
				t1.email,
				t1.telephonenum,
				t1.weixinnum,
				t1.qqnum,
				t1.sinanum,
				t1.createtime,
				t1.updatetime,
				t1.deletetime ";
		
		$userInfo = Userinfo::model();
		$criteria = new CDbCriteria();
		
		$criteria->select = $sql;
		$criteria->alias = 't1';
		
		//         $joinSQL=' INNER JOIN {{user}} t2 ON t1.UserId=t2.Id ';
		//         $joinSQL=$joinSQL.' LEFT JOIN {{question}} t5 ON t1.QuestionId=t5.Id ';
		
		//         $criteria->join=$joinSQL;
		
		$criteria->addCondition('t1.deleteflag = :p1');
		$conditionParams[':p1'] = DELFLAG_NORMAL;
		
		if (isset($user->realname) && "" != $user->realname) {
			$criteria->addCondition('t1.realname like :p2');
			$conditionParams[':p2'] = $user->realname;
		}
		
		$criteria->params = $conditionParams;
		
		// 排序
		$criteria->order = ORDER_TYPE." DESC ";
		
		$userInfoCount = $userInfo->count($criteria);
		$userInfoCount = intval($userInfoCount);
		
		//设置分页信息
		$pages = new CPaginationPost($userInfoCount);
		
		// 分页信息设置
		$pageInfo['count'] = $userInfoCount;
		// 一页几条
		$pages->pageSize = PAGE_SIZE;
		$pageInfo['pages'] = $pages;
		
		// 设置当前是第几页
		$pages->setCurrentPage($pageNum - 1);
			
		// 限制当前页面条数
		$pages->applyLimit($criteria);
		
		// 检索数据
		$resAllModelData =  $userInfo->findAll($criteria);
		
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
	
	/**
	 * 通过分页条件获取记录集合
	 * 
	 * @param unknown $pageNum
	 * @param unknown $pageSize
	 * @return string[]|number[]|unknown[][][]|string
	 */
	public function getUserInfoList($pageNum, $pageSize) {
		
		$sql = "t1.id,
				t1.createby,
				t1.realname,
				t1.birthday,
				t1.sex,
				t1.age,
				t1.career,
				t1.remark,
				t1.come,
				t1.pricelevel,
				t1.email,
				t1.telephonenum,
				t1.weixinnum,
				t1.qqnum,
				t1.sinanum,
				t1.createtime,
				t1.updatetime,
				t1.deletetime ";
		
		$userInfo = Userinfo::model();
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
		$criteria->order = ORDER_TYPE." DESC ";
		
		$userInfoCount = $userInfo->count($criteria);
		$userInfoCount = intval($userInfoCount);
		
		//设置分页信息
		$pages = new CPaginationPost($userInfoCount);
		
		// 分页信息设置
		$pageInfo['count'] = $userInfoCount;
		// 一页几条
		$pages->pageSize = $pageSize;
		$pageInfo['pages'] = $pages;
		
		// 设置当前是第几页
		$pages->setCurrentPage($pageNum - 1);
		 
		// 限制当前页面条数
		$pages->applyLimit($criteria);
		
		// 检索数据
		$resAllModelData =  $userInfo->findAll($criteria);
		
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
	
	
	public function upUserInfo(Userinfo $userInfo) {
		// 参数验证
		if (!isset($userInfo) || count($userInfo)) {
			return STATUS_NG;
		}
		
		if (!isset($userInfo->id) || false === $userInfo->id) {
			return STATUS_NG;
		}
		
		$userInfoModel = Userinfo::model()->find('Id=:p', array(':p'=>$userInfo->id));
		
		if(isset($userInfo->realname) && '' !== $userInfo->realname) {
			$userInfoModel->realname = $userInfo->realname;
		}
		
		if(isset($userInfo->createby) && '' !== $userInfo->createby) {
			$userInfoModel->createby = $userInfo->createby;
		}
		
		if(isset($userInfo->birthday) && '' !== $userInfo->birthday) {
			$userInfoModel->birthday = $userInfo->birthday;
		}

		if(isset($userInfo->sex) && '' !== $userInfo->sex) {
			$userInfoModel->sex = $userInfo->sex;
		}

		if(isset($userInfo->age) && '' !== $userInfo->age) {
			$userInfoModel->age = $userInfo->age;
		}

		if(isset($userInfo->career) && '' !== $userInfo->career) {
			$userInfoModel->career = $userInfo->career;
		}

		if(isset($userInfo->remark) && '' !== $userInfo->remark) {
			$userInfoModel->remark = $userInfo->remark;
		}
		
		if(isset($userInfo->come) && '' !== $userInfo->come) {
			$userInfoModel->come = $userInfo->come;
		}
		
		if(isset($userInfo->pricelevel) && '' !== $userInfo->pricelevel) {
			$userInfoModel->pricelevel = $userInfo->pricelevel;
		}
		
		if(isset($userInfo->email) && '' !== $userInfo->email) {
			$userInfoModel->email = $userInfo->email;
		}
		
		if(isset($userInfo->telephonenum) && '' !== $userInfo->telephonenum) {
			$userInfoModel->telephonenum = $userInfo->telephonenum;
		}
		
		if(isset($userInfo->weixinnum) && '' !== $userInfo->weixinnum) {
			$userInfoModel->weixinnum = $userInfo->weixinnum;
		}
		
		if(isset($userInfo->qqnum) && '' !== $userInfo->qqnum) {
			$userInfoModel->qqnum = $userInfo->qqnum;
		}
		
		if(isset($userInfo->sinanum) && '' !== $userInfo->sinanum) {
			$userInfoModel->sinanum = $userInfo->sinanum;
		}
		
		if(isset($userInfo->updatetime) && '' !== $userInfo->updatetime) {
			$userInfoModel->updatetime = $userInfo->updatetime;
		} else {
			$userInfoModel->updatetime = date('Y-m-d H:i:s', time());
		}
		
		if(isset($userInfo->deleteflag) && '' !== $userInfo->deleteflag) {
			$userInfoModel->deleteflag = $userInfo->deleteflag;
		}
		
		if(isset($userInfo->deletetime) && '' !== $userInfo->deletetime) {
			$userInfoModel->deletetime = $userInfo->deletetime;
		}
		
		// 更新操作
		$userInfoModel = $userInfoModel->update();
		
		if ($userInfoModel) {
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
	public function delUserInfo($Id) {
		
		$userInfo = Userinfo::model();
		
		$userInfo->id = $Id;
		$userInfo->deleteflag = DELFLAG_DELETE;
		$userInfo->deletetime = date('Y-m-d H:i:s', time());
		$result = $this->upUserInfo($userInfo);
		
		return $result;
		
	}
	
}