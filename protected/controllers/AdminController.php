<?php
class AdminController extends Controller {
	/********************************************/
	/* Behavioral and administrative functions. */
	/********************************************/
	// Apply filters
	public function filters() {
		$filters = array();
		// Restrict access to administrators.
		$filters[] = array('application.filters.AdminAuthFilter');
		return $filters;
	}
	
	// Control access.
	public function accessRules() {
		return array(
			//Deny access to anonymous ('?') users
			array('deny',
				'users' => array('?'),
			),
			
			//Allow access to authenticated ('?') users
			array('allow',
				'actions' => array(
					'edit',
					'list',
				),
				'users' => array('@'),
			),
			
			//Restrict all access not otherwise specified
			array('deny',
				'users' => array('*'),
			),
		);

	}
	
	/**************************/
	/* Actions, at long last. */
	/**************************/
	
	public function actionIndex() {
		// Landing page.
		$this->layout = 'admin_default';
		$this->render('index');
	}
	
	public function actionEdit() {
		// What are we editing?
		if ( !isset($_GET['what']) ) {
			Yii::app()->request->redirect( Yii::app()->createUrl('site/admin') );
		} else {
			$what = $_GET['what'];
			switch ($what) {
				case 'predicament':
					if (Yii::app()->request->isPostRequest) {
						// Handle the edit request.
						$predicament = Predicament::model()->findByPk( $_POST['Predicament']['predicament_id'] );
						$predicament->attributes = $_POST['Predicament'];
						$predicament->save();
						$this->layout = 'admin_default';
						new dBug('Here!!');
						$this->render('predicament_edit', array('predicament'=>$predicament, 'message'=>'Predicament saved.', ) );
					} else {
						// What predicament are we editing?
						if ( !isset($_GET['predicament_id']) ) { $predicament_id = 0; }
						else { $predicament_id = $_GET['predicament_id']; }
						// Get the record.
						$predicament = Predicament::model()->findByPk($predicament_id);
						// Load the page.
						$this->layout = 'admin_default';
						$this->render('predicament_edit', array('predicament'=>$predicament,) );
					}
				break;
			}
		}
	}
	
	public function actionList() {
		// What are we listing?
		if ( !isset($_GET['what']) ) {
			
		} else {
			$what = $_GET['what'];
			switch ($what) {
				case 'predicaments':
					$predicaments = Predicament::model()->findAll();
					$this->layout = 'admin_default';
					$this->render('predicament_list', array('predicaments'=>$predicaments) );
				break;
			}
		}
	}
	
	public function actionDebug() {
		$this->layout = 'admin_default';
		$this->render('debug');
	}
	
}
?>