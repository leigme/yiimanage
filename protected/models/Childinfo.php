<?php

/**
 * This is the model class for table "childinfo".
 *
 * The followings are the available columns in table 'childinfo':
 * @property integer $id
 * @property integer $userinfoId
 * @property string $realname
 * @property integer $sex
 * @property string $birthday
 * @property string $remark
 * @property string $createtime
 * @property string $updatetime
 * @property string $deletetime
 * @property integer $deleteflag
 */
class Childinfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Childinfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'childinfo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userinfoId, sex, deleteflag', 'numerical', 'integerOnly'=>true),
			array('realname, birthday, remark, createtime, updatetime, deletetime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, userinfoId, realname, sex, birthday, remark, createtime, updatetime, deletetime, deleteflag', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'userinfoId' => 'Userinfo',
			'realname' => 'Realname',
			'sex' => 'Sex',
			'birthday' => 'Birthday',
			'remark' => 'Remark',
			'createtime' => 'Createtime',
			'updatetime' => 'Updatetime',
			'deletetime' => 'Deletetime',
			'deleteflag' => 'Deleteflag',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('userinfoId',$this->userinfoId);
		$criteria->compare('realname',$this->realname,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('createtime',$this->createtime,true);
		$criteria->compare('updatetime',$this->updatetime,true);
		$criteria->compare('deletetime',$this->deletetime,true);
		$criteria->compare('deleteflag',$this->deleteflag);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}