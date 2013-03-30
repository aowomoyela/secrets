<?php
class SiteController extends Controller {
	/* Housekeeping and configuration. */
	public function actions() {
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/************/
	/* Actions. */
	/************/
	
	// General site homepage.
	public function actionIndex() {
		if ( Yii::app()->user->isGuest ) {
			$this->layout = 'enter_blankface';
			$this->render('index');
		} else {
			Yii::app()->request->redirect( Yii::app()->createUrl('game/predicament') );
		}
	}

	// Error action.
	public function actionError() {
		$this->layout = 'secret_default';
		$this->render('error', $error);
	}

	// Login action.
	public function actionLogin() {
		// If the user is logged in, send them on their way.
		if (!Yii::app()->user->isGuest) {
			Yii::app()->request->redirect( Yii::app()->createUrl('game/predicament') );
		}
		
		// If this is a POST request, assume it's a login attempt.
		if(Yii::app()->request->isPostRequest) {
			// Handle the login.
			$loginhandler = new UserIdentity($_POST['username'], $_POST['password']);
			$auth = $loginhandler->authenticate();
			if ($auth === true) {
				// Log in the user.
				Yii::app()->user->login($loginhandler,0);
				Yii::app()->request->redirect( Yii::app()->createUrl('game/predicament') );
			} else {
				// Display the login form.
				$this->layout = 'enter_blankface';
				$this->render('login');
			}
		} else {
			// Display the login form.
			$this->layout = 'enter_blankface';
			$this->render('login');
		}
	}

	//Logout action.
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}