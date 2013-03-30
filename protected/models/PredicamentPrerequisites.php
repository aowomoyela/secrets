<?php

/**
 * This is the model class for table "predicament_prerequisites".
 *
 * The followings are the available columns in table 'predicament_prerequisites':
 * @property string $predicament_id
 * @property string $item_include
 * @property string $item_exclude
 *
 * The followings are the available model relations:
 * @property Item $itemExclude
 * @property Predicament $predicament
 * @property Item $itemInclude
 */
class PredicamentPrerequisites extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PredicamentPrerequisites the static model class
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
		return 'predicament_prerequisites';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('predicament_id, item_include, item_exclude', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('predicament_id, item_include, item_exclude', 'safe', 'on'=>'search'),
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
			'itemExclude' => array(self::BELONGS_TO, 'Item', 'item_exclude'),
			'predicament' => array(self::BELONGS_TO, 'Predicament', 'predicament_id'),
			'itemInclude' => array(self::BELONGS_TO, 'Item', 'item_include'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'predicament_id' => 'Predicament',
			'item_include' => 'Item Include',
			'item_exclude' => 'Item Exclude',
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

		$criteria->compare('predicament_id',$this->predicament_id,true);
		$criteria->compare('item_include',$this->item_include,true);
		$criteria->compare('item_exclude',$this->item_exclude,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}