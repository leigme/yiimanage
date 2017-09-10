<?php

/**
 * This is the model class for table "userinfo".
 *
 * The followings are the available columns in table 'userinfo':
 * @property integer $id
 * @property integer $createby
 * @property string $realname
 * @property string $birthday
 * @property integer $sex
 * @property integer $age
 * @property string $career
 * @property string $remark
 * @property integer $come
 * @property integer $pricelevel
 * @property string $email
 * @property string $telephonenum
 * @property string $weixinnum
 * @property string $qqnum
 * @property string $sinanum
 * @property string $createtime
 * @property string $updatetime
 * @property string $deletetime
 * @property integer $deleteflag
 */
class Userinfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Userinfo the static model class
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
		return 'userinfo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('createby, sex, age, come, pricelevel, deleteflag', 'numerical', 'integerOnly'=>true),
			array('realname, birthday, career, remark, email, telephonenum, weixinnum, qqnum, sinanum, createtime, updatetime, deletetime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, createby, realname, birthday, sex, age, career, remark, come, pricelevel, email, telephonenum, weixinnum, qqnum, sinanum, createtime, updatetime, deletetime, deleteflag', 'safe', 'on'=>'search'),
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
			'createby' => 'Createby',
			'realname' => 'Realname',
			'birthday' => 'Birthday',
			'sex' => 'Sex',
			'age' => 'Age',
			'career' => 'Career',
			'remark' => 'Remark',
			'come' => 'Come',
			'pricelevel' => 'Pricelevel',
			'email' => 'Email',
			'telephonenum' => 'Telephonenum',
			'weixinnum' => 'Weixinnum',
			'qqnum' => 'Qqnum',
			'sinanum' => 'Sinanum',
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
		$criteria->compare('createby',$this->createby);
		$criteria->compare('realname',$this->realname,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('age',$this->age);
		$criteria->compare('career',$this->career,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('come',$this->come);
		$criteria->compare('pricelevel',$this->pricelevel);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('telephonenum',$this->telephonenum,true);
		$criteria->compare('weixinnum',$this->weixinnum,true);
		$criteria->compare('qqnum',$this->qqnum,true);
		$criteria->compare('sinanum',$this->sinanum,true);
		$criteria->compare('createtime',$this->createtime,true);
		$criteria->compare('updatetime',$this->updatetime,true);
		$criteria->compare('deletetime',$this->deletetime,true);
		$criteria->compare('deleteflag',$this->deleteflag);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}