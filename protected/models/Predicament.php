<?php

/**
 * This is the model class for table "predicament".
 *
 * The followings are the available columns in table 'predicament':
 * @property string $predicament_id
 * @property string $predicament_name
 * @property string $image
 * @property string $description
 *
 * The followings are the available model relations:
 * @property PredicamentPrerequisites[] $predicamentPrerequisites
 */
class Predicament extends CActiveRecord {
	public $predicament_name;
	public $image;
	public $description;
	
	public function get($request) {
		$allowed = array('predicament_id', 'predicament_name', 'image', 'description');
		if ( in_array($request, $allowed) ) { return $this->$request; }
		else { return null; }
		
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Predicament the static model class
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
		return 'predicament';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('predicament_name, image', 'length', 'max'=>150),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('predicament_id, predicament_name, image, description', 'safe', 'on'=>'search'),
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
			'predicamentPrerequisites' => array(self::HAS_MANY, 'PredicamentPrerequisites', 'predicament_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'predicament_id' => 'Predicament',
			'predicament_name' => 'Predicament Name',
			'image' => 'Image',
			'description' => 'Description',
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
		$criteria->compare('predicament_name',$this->predicament_name,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}