<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $user_id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $current_predicament
 * @property string $registered
 * @property string $last_login
 *
 * The followings are the available model relations:
 * @property Predicament $currentPredicament
 * @property UserItem[] $userItems
 */
class User extends CActiveRecord {
	public $username;
	public $current_predicament;
	
	public $password;
	
	public static function model($className=__CLASS__) { return parent::model($className); }


	public function tableName() { return 'user'; }


	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username', 'length', 'max'=>32),
			array('email', 'length', 'max'=>150),
			array('password', 'length', 'max'=>128),
			array('current_predicament', 'length', 'max'=>10),
			array('registered, last_login', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, username, email, password, current_predicament, registered, last_login', 'safe', 'on'=>'search'),
		);
	}


	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'currentPredicament' => array(self::BELONGS_TO, 'Predicament', 'current_predicament'),
			'userItems' => array(self::HAS_MANY, 'UserItem', 'user_id'),
		);
	}


	public function attributeLabels() {
		return array(
			'user_id' => 'User',
			'username' => 'Username',
			'email' => 'Email',
			'password' => 'Password',
			'current_predicament' => 'Current Predicament',
			'registered' => 'Registered',
			'last_login' => 'Last Login',
		);
	}


	public function search() {
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('current_predicament',$this->current_predicament,true);
		$criteria->compare('registered',$this->registered,true);
		$criteria->compare('last_login',$this->last_login,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/* Custom functions. */
	public function validate_password($password) {
		return UserSecurity::confirm_user_password($password, $this->password);
	}
}