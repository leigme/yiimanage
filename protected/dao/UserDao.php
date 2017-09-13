<?php

class UserDao extends BaseDao {
	
	/**
	 * 添加用户信息
	 *
	 * @param User $User
	 * @return string
	 */
	public function addUser(User $User) {
	
		// 参数验证
		if (!isset($User) || 0 >= count($User)) {
			return STATUS_NG;
		}
	
		if (isset($User->Id) && 0 < $User->Id) {
			return STATUS_NG;
		}
	
		if (!isset($User->username) || '' === $User->username 
				|| !isset($User->password) || '' === $User->password) {
			return STATUS_NG;
		}
	
		// 参数初始化设置
		$User->CreateTime = date('Y-m-d H:i:s', time());
		$User->UpdateTime = date('Y-m-d H:i:s', time());
	
		$User->deleteflag = DELFLAG_NORMAL;
	
		// 插入操作
		$User = $User->save();
	
		if($User){
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
	public function getUserList($pageNum, $pageSize) {
	
		$sql = "t1.id,
				t1.username,
				t1.email,
				t1.telephonenum,
				t1.weixinnum,
				t1.qqnum,
				t1.sinanum,
				t1.createtime,
				t1.updatetime,
				t1.deletetime ";
	
		$User = User::model();
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
	
		$UserCount = $User->count($criteria);
		$UserCount = intval($UserCount);
	
		//设置分页信息
		$pages = new CPaginationPost($UserCount);
	
		// 分页信息设置
		$pageInfo['count'] = $UserCount;
		// 一页几条
		$pages->pageSize = $pageSize;
		$pageInfo['pages'] = $pages;
	
		// 设置当前是第几页
		$pages->setCurrentPage($pageNum);
			
		// 限制当前页面条数
		$pages->applyLimit($criteria);
	
		// 检索数据
		$resAllModelData =  $User->findAll($criteria);
	
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
	
	
	public function upUser(User $User) {
		// 参数验证
		if (!isset($User) || count($User)) {
			return STATUS_NG;
		}
	
		if (!isset($User->id) || false === $User->id) {
			return STATUS_NG;
		}
	
		$UserModel = User::model()->find('Id=:p', array(':p'=>$User->id));
	
		if(isset($User->realname) && '' !== $User->realname) {
			$UserModel->realname = $User->realname;
		}
	
		if(isset($User->birthday) && '' !== $User->birthday) {
			$UserModel->birthday = $User->birthday;
		}
	
		if(isset($User->sex) && '' !== $User->sex) {
			$UserModel->sex = $User->sex;
		}
	
		if(isset($User->remark) && '' !== $User->remark) {
			$UserModel->remark = $User->remark;
		}
	
		if(isset($User->updatetime) && '' !== $User->updatetime) {
			$UserModel->updatetime = $User->updatetime;
		} else {
			$UserModel->UpdateTime = date('Y-m-d H:i:s', time());
		}
	
		if(isset($User->deleteflag) && '' !== $User->deleteflag) {
			$UserModel->deleteflag = $User->deleteflag;
		}
	
		if(isset($User->deletetime) && '' !== $User->deletetime) {
			$UserModel->deletetime = $User->deletetime;
		}
	
		// 更新操作
		$UserModel = $UserModel->update();
	
		if ($UserModel) {
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
	public function delUser($Id) {
	
		$User = User::model();
	
		$User->id = $Id;
		$User->deleteflag = DELFLAG_DELETE;
		$User->deletetime = date('Y-m-d H:i:s', time());
		$result = $this->upUser($User);
	
		return $result;
	
	}
	
}