<?php

/**
 * This is the model class for table "puzzle_state_solution".
 *
 * The followings are the available columns in table 'puzzle_state_solution':
 * @property string $puzzle_state_solution_id
 * @property string $puzzle_id
 * @property string $puzzle_state_id
 * @property string $item_require
 * @property string $item_consume
 * @property string $pass_word
 * @property string $visibility
 * @property string $next_state
 *
 * The followings are the available model relations:
 * @property PuzzleState $puzzleState
 * @property Puzzle $puzzle
 */
class PuzzleStateS extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PuzzleStateS the static model class
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
		return 'puzzle_state_solution';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('puzzle_id, puzzle_state_id, next_state', 'required'),
			array('puzzle_id, puzzle_state_id, item_require, item_consume, next_state', 'length', 'max'=>10),
			array('pass_word', 'length', 'max'=>75),
			array('visibility', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('puzzle_state_solution_id, puzzle_id, puzzle_state_id, item_require, item_consume, pass_word, visibility, next_state', 'safe', 'on'=>'search'),
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
			'puzzleState' => array(self::BELONGS_TO, 'PuzzleState', 'puzzle_state_id'),
			'puzzle' => array(self::BELONGS_TO, 'Puzzle', 'puzzle_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'puzzle_state_solution_id' => 'Puzzle State Solution',
			'puzzle_id' => 'Puzzle',
			'puzzle_state_id' => 'Puzzle State',
			'item_require' => 'Item Require',
			'item_consume' => 'Item Consume',
			'pass_word' => 'Pass Word',
			'visibility' => 'Visibility',
			'next_state' => 'Next State',
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

		$criteria->compare('puzzle_state_solution_id',$this->puzzle_state_solution_id,true);
		$criteria->compare('puzzle_id',$this->puzzle_id,true);
		$criteria->compare('puzzle_state_id',$this->puzzle_state_id,true);
		$criteria->compare('item_require',$this->item_require,true);
		$criteria->compare('item_consume',$this->item_consume,true);
		$criteria->compare('pass_word',$this->pass_word,true);
		$criteria->compare('visibility',$this->visibility,true);
		$criteria->compare('next_state',$this->next_state,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}