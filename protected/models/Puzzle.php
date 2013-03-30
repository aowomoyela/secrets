<?php

/**
 * This is the model class for table "puzzle".
 *
 * The followings are the available columns in table 'puzzle':
 * @property string $puzzle_id
 * @property string $puzzle_name
 * @property string $default_state
 *
 * The followings are the available model relations:
 * @property PuzzleState[] $puzzleStates
 * @property PuzzleStateSolution[] $puzzleStateSolutions
 */
class Puzzle extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Puzzle the static model class
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
		return 'puzzle';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('default_state', 'required'),
			array('puzzle_name', 'length', 'max'=>75),
			array('default_state', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('puzzle_id, puzzle_name, default_state', 'safe', 'on'=>'search'),
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
			'puzzleStates' => array(self::HAS_MANY, 'PuzzleState', 'puzzle_id'),
			'puzzleStateSolutions' => array(self::HAS_MANY, 'PuzzleStateSolution', 'puzzle_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'puzzle_id' => 'Puzzle',
			'puzzle_name' => 'Puzzle Name',
			'default_state' => 'Default State',
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

		$criteria->compare('puzzle_id',$this->puzzle_id,true);
		$criteria->compare('puzzle_name',$this->puzzle_name,true);
		$criteria->compare('default_state',$this->default_state,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}