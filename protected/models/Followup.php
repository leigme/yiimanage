<?php

/**
 * This is the model class for table "followup".
 *
 * The followings are the available columns in table 'followup':
 * @property integer $id
 * @property integer $userId
 * @property string $followtime
 * @property string $context
 * @property string $remark
 * @property string $createtime
 * @property string $updatetime
 * @property string $deletetime
 * @property integer $deleteflag
 */
class Followup extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Followup the static model class
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
		return 'followup';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userId, deleteflag', 'numerical', 'integerOnly'=>true),
			array('followtime, context, remark, createtime, updatetime, deletetime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, userId, followtime, context, remark, createtime, updatetime, deletetime, deleteflag', 'safe', 'on'=>'search'),
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
			'userId' => 'User',
			'followtime' => 'Followtime',
			'context' => 'Context',
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
		$criteria->compare('userId',$this->userId);
		$criteria->compare('followtime',$this->followtime,true);
		$criteria->compare('context',$this->context,true);
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