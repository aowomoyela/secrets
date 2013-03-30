<?php

/**
 * This is the model class for table "puzzle_state".
 *
 * The followings are the available columns in table 'puzzle_state':
 * @property string $puzzle_state_id
 * @property string $puzzle_id
 * @property string $puzzle_state_name
 * @property string $image
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Puzzle $puzzle
 * @property PuzzleStateSolution[] $puzzleStateSolutions
 */
class PuzzleState extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PuzzleState the static model class
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
		return 'puzzle_state';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('puzzle_id', 'required'),
			array('puzzle_id', 'length', 'max'=>10),
			array('puzzle_state_name, image', 'length', 'max'=>150),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('puzzle_state_id, puzzle_id, puzzle_state_name, image, description', 'safe', 'on'=>'search'),
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
			'puzzle' => array(self::BELONGS_TO, 'Puzzle', 'puzzle_id'),
			'puzzleStateSolutions' => array(self::HAS_MANY, 'PuzzleStateSolution', 'puzzle_state_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'puzzle_state_id' => 'Puzzle State',
			'puzzle_id' => 'Puzzle',
			'puzzle_state_name' => 'Puzzle State Name',
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

		$criteria->compare('puzzle_state_id',$this->puzzle_state_id,true);
		$criteria->compare('puzzle_id',$this->puzzle_id,true);
		$criteria->compare('puzzle_state_name',$this->puzzle_state_name,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}