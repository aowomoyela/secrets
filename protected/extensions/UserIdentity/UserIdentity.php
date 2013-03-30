<?php
class UserIdentity extends CUserIdentity {
	private $_id;
	private $_username;

	/********************************/
	/* General getters and setters. */
	/********************************/

	public function getId() {
		return $this->_id;
	}

	public function getUsername() {
		return $this->_username;
	}

 	/*******************************************************/
 	/* Actions for user authentication & authorization.    */
 	/* authenticate() must be implemented or CUserIdentity */
 	/* will throw an exception.                            */
 	/*******************************************************/

	// Authentication verifies that the user is who they say they are.
	public function authenticate() {
		$username = $this->username;
        	$password = $this->password;
		$user = User::model()->findByAttributes( array('username'=>$username) );
		// The user was found, and the password matched. Continue with login.
		
        	if( is_null($user) ) {
        		// If the user can't be found, generate an error.
        		$this->errorCode=self::ERROR_USERNAME_INVALID;
			$this->errorMessage = "You don't exist.";
			return false;
        	} elseif ( !$user->validate_password($password) ) {
	       		// If the password doesn't match, generate an error.
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
			$this->errorMessage = "You've said something wrong...";
			return false;
        	} else {
			// The user was found, and the password matched. Continue with login.
			
			// Store some information in persistent (session) storage.
			$this->setState('model', $user);
			$this->setState('mode', new GameMode() );
			
			// Set up the ID and username.
			$this->_id = $user->get('user_id');
			$this->_username = $user->get('username');

			// Return with no errors and a confirmation.
	        	$this->errorCode==self::ERROR_NONE;
			return true;
		}

    	}

}
?>
